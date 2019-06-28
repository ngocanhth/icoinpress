<?php

namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit;

use Magento\Backend\Block\Template\Context;

class PlayList extends \Magento\Backend\Block\Template
{
    public function __construct(
        Context $context,
        array $data = []
    ) {
        $this->_scopeConfig = $context->getScopeConfig();
        parent::__construct($context, $data);
    }
}
