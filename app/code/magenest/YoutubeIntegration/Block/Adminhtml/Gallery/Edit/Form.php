<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit;

/**
 * Class Form
 * @package Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        $form = $this->_formFactory->create(
            ['data' =>
                [
                    'id' => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
