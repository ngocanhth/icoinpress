<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml;

use Magenest\YoutubeIntegration\Model\GalleryFactory;
use Magenest\YoutubeIntegration\Model\GroupFactory;
use Magenest\YoutubeIntegration\Model\GroupListFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Gallery
 * @package Magenest\YoutubeIntegration\Controller\Adminhtml
 */
abstract class Gallery extends Action
{
    protected $_galleryFactory;

    protected $_groupFactory;

    protected $_groupListFactory;

    protected $_pageFactory;

    protected $_coreRegistry;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        GalleryFactory $galleryFactory,
        GroupFactory $groupFactory,
        GroupListFactory $groupListFactory,
        Registry $registry
    ) {
        $this->_galleryFactory = $galleryFactory;
        $this->_groupFactory = $groupFactory;
        $this->_groupListFactory = $groupListFactory;
        $this->_coreRegistry = $registry;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Magenest_YoutubeIntegration::gallery')
            ->addBreadcrumb(__('YoutubeIntegration Gallery Date'), __('YoutubeIntegration Gallery Date'));

        $resultPage->getConfig()->getTitle()->set(__('YoutubeIntegration Gallery Date'));
        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_YoutubeIntegration::gallery');
    }
}
