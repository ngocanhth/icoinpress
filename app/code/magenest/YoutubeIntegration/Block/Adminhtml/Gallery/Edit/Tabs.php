<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit;

/**
 * Class Tabs
 * @package Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('template_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Gallery Configuration'));
    }
}
