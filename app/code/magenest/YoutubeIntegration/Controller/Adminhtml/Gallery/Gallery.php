<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Gallery
 * @package Magenest\ProductSchedule\Controller\Adminhtml\Gallery
 */
abstract class Gallery extends Action
{
    protected $_resultPageFactory;

    public function __construct(
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        $this->_resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_YoutubeIntegration::gallery')
            ->addBreadcrumb(__('Price Rule'), __('Price Rule'));
        $resultPage->getConfig()->getTitle()->set(__('Price Rule'));
        return $resultPage;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_YoutubeIntegration::gallery');
    }
}
