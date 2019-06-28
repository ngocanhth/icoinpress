<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery\Gallery as GalleryController;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery
 */
class Index extends GalleryController
{
    public function __construct(
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        parent::__construct($pageFactory, $context);
    }

    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('Gallery'));
        return $resultPage;
    }
}
