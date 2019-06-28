<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery;

use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container as FormContainer;
use Magento\Framework\Registry;

/**
 * Class Edit
 * @package Magenest\YoutubeIntegration\Block\Adminhtml\Gallery
 */
class Edit extends FormContainer
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Edit constructor.
     * @param Registry $registry
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Registry $registry,
        Context $context,
        array $data
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Magenest_YoutubeIntegration';
        $this->_controller = 'adminhtml_gallery';
        $this->_mode       = 'edit';
        parent::_construct();
        $this->buttonList->remove('delete');
        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->add(
            'save-and-continue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        $templates = $this->_coreRegistry->registry('youtube_integration_gallery');
        if ($templates->getId()) {
            return __("Edit Rule '%1'", $this->escapeHtml($templates->getTitle()));
        }
        return __('New Rule');
    }

    /**
     * @return string
     */
    public function _getSaveAndContinueUrl()
    {
        return $this->getUrl('youtube/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '{{tab_id}}']);
    }
}
