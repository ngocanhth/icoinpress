<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class Gallery extends Generic implements TabInterface
{

    /**
     * Anchor is product video
     */
    const PATH_ANCHOR_PRODUCT_VIDEO = 'catalog_product_video-link';

    /**
     * @var \Magento\ProductVideo\Helper\Media
     */
    protected $mediaHelper;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    protected $jsonEncoder;

    /**
     * @var string
     */
    protected $videoSelector = '#media_gallery_content';

    public $_gaValue;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\ProductVideo\Helper\Media $mediaHelper
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\ProductVideo\Helper\Media $mediaHelper,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->mediaHelper = $mediaHelper;
        $this->urlBuilder = $context->getUrlBuilder();
        $this->jsonEncoder = $jsonEncoder;
        $this->setUseContainer(true);
    }

    /**
     * Form preparation
     *
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $gallery = $this->_coreRegistry->registry("youtube_integration_gallery");
        $galleryGroup = $this->_coreRegistry->registry("youtube_integration_gallery_group");
        $galleryList = $this->_coreRegistry->registry("youtube_integration_gallery_group_list");
//        $galleryGrValue = $galleryGroup->getData();
//        var_dump($gallery->getData());die();
        $form = $this->_formFactory->create();
        $form->addField('new_video_messages', 'note', []);
        $fieldset = $form->addFieldset('new_video_form_fieldset', []);


        if ($gallery->getId()!=null || $gallery->getId()!="") {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'gallery_name',
            'text',
            [
                'name' => 'gallery_name',
                'label' => __('Gallery Name'),
                'title' => __('Gallery Name'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => ['1' => __('Active'), '0' => __('Disable')]
            ]
        );
        $fieldset->addField(
            'gallery_channel_url',
            'text',
            [
                'class' => 'edited-data',
                'label' => __('Url'),
                'title' => __('Url'),
                'required' => true,
                'name' => 'gallery_channel_url',
                'value' => 'https://www.youtube.com/channel/UCK6S9V2nriNNL17czCeo-iQ'
            ]
        );
        $fieldset->addType('video', '\Magenest\YoutubeIntegration\Block\Adminhtml\Template\Youtube');
        $fieldset->addField(
            'youtube',
            'video',
            [
                'label' => __('Preview'),
                'title' => __('Preview'),
                'name' => 'youtube',
            ]
        );
        $fieldset->addType('playlist', '\Magenest\YoutubeIntegration\Block\Adminhtml\Template\PlayList');
        $fieldset->addField(
            'list',
            'playlist',
            [

                'label' => __('PlayList'),
                'title' => __('PlayList'),
                'name' => 'playlist',

            ]
        );

        $galleryValue = $gallery->getData();

         if ($galleryValue != null ) {
            $form->setValues($galleryValue);
          }

        $this->setForm($form);
        return parent::_prepareForm();
    }

    /**
     * Retrieve currently viewed product object
     *
     * @return \Magento\Catalog\Model\Product
     */
    protected function getProduct()
    {
        if (!$this->hasData('product')) {
            $this->setData('product', $this->_coreRegistry->registry('product'));
        }
        return $this->getData('product');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Gallery');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Gallery');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }
}
