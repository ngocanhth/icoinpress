<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery\Gallery as GalleryController;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class NewAction
 * @package Magenest\Youtubeintegration\Controller\Adminhtml\Gallery
 */
class NewAction extends GalleryController
{
    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $_resultForwardFactory;

    /**
     * NewAction constructor.
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param PageFactory $pageFactory
     * @param Action\Context $context
     */
    public function __construct(
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        $this->_resultForwardFactory = $resultForwardFactory;
        parent::__construct($pageFactory, $context);
    }

    /**
     * @return $this
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
