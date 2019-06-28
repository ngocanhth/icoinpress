<?php
namespace Magenest\YoutubeIntegration\Controller\Index;

use Magento\Framework\App\Action\Context;

class Gallery extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    protected $_logger;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
