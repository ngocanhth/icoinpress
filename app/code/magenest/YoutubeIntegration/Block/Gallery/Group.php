<?php

namespace Magenest\YoutubeIntegration\Block\Gallery;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Element\Template;

/**
 * Class Cancel
 * @package Magenest\Reservation\Controller\Customer
 */
class Group extends Template
{
    protected $_resultPageFactory;

    protected $_groupFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\YoutubeIntegration\Model\GroupFactory $groupFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_groupFactory = $groupFactory;
        parent::__construct($context);
    }

    public function getC()
    {
        $newsModel = $this->_groupFactory->create();
        $item = $newsModel->load(1);

        return $item['group_id'];
    }
}
