<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;
use Magenest\YoutubeIntegration\Model\GalleryFactory;
use Magenest\YoutubeIntegration\Model\GroupFactory;
use Magenest\YoutubeIntegration\Model\GroupListFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class MassDelete
 * @package Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery
 */
class MassDelete extends Gallery
{
    protected $_filter;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        GalleryFactory $galleryFactory,
        GroupFactory $groupFactory,
        GroupListFactory $groupListFactory,
        Registry $registry,
        Filter $filter
    ) {
        $this->_filter = $filter;
        parent::__construct($context, $pageFactory, $galleryFactory, $groupFactory, $groupListFactory, $registry);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_galleryFactory->create()->getCollection());
        $collection2 = $this->_groupFactory->create()->getCollection();
        $collection3 =$this->_groupListFactory->create()->getCollection();
        $deletedGallery = 0;

        /** @var \Magenest\YoutubeIntegration\Model\Gallery $item */
        if ($collection) {
            foreach ($collection->getItems() as $item) {
                $item->delete();
                $deletedGallery++;
            }
        }
        if ($collection2) {
            foreach ($collection2->getItems() as $item) {
                $item->delete();
            }
        }
        if ($collection3) {
            foreach ($collection3->getItems() as $item) {
                $item->delete();
            }
        }
        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been deleted.', $deletedGallery)
        );
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('youtube/*/index');
    }
}
