<?php

namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit;

use Magento\Backend\Block\Template\Context;

class Js extends \Magento\Backend\Block\Template
{
    public function __construct(
        Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_scopeConfig = $context->getScopeConfig();
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    public function getGalleryData()
    {
        $galleryGroup = $this->_coreRegistry->registry("youtube_integration_gallery_group");
        return $galleryGroup->getData();
    }

    public function getGroupListData()
    {
        $galleryGroup = $this->_coreRegistry->registry("youtube_integration_gallery_group_list");
        return $galleryGroup;
    }
}
