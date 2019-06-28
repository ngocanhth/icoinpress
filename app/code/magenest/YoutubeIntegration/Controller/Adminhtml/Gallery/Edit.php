<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery\Gallery as GalleryController;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery
 */
class Edit extends GalleryController
{
    /**
     * @var \Magenest\YoutubeIntegration\Model\GalleryFactory
     */
    protected $_galleryFactory;

    protected $_groupFactory;

    protected $_groupListFactory;

    protected $_logger;

    protected $_coreRegistry;

    public function __construct(
        \Magenest\YoutubeIntegration\Model\GalleryFactory $galleryFactory,
        \Magenest\YoutubeIntegration\Model\GroupFactory $groupFactory,
        \Magenest\YoutubeIntegration\Model\GroupListFactory $groupListFactory,
        PageFactory $pageFactory,
        Registry $registry,
        Action\Context $context,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_coreRegistry = $registry;
        $this->_galleryFactory = $galleryFactory;
        $this->_groupFactory = $groupFactory;
        $this->_groupListFactory = $groupListFactory;
        parent::__construct($pageFactory, $context);
        $this->_logger = $logger;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magenest\YoutubeIntegration\Model\Gallery $model */
        $model = $this->_galleryFactory->create();

        $model2 =$this->_groupFactory->create();
        $model3 = $this->_groupListFactory->create();
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This gallery date no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $group = $model2->getCollection()->addFieldToFilter('gallery_id', $id);
        $this->_coreRegistry->register('youtube_integration_gallery', $model);
        $this->_coreRegistry->register('youtube_integration_gallery_group', $group);
        $k = 0;
        $xxx =[];

        foreach ($group as $item) {
            $xxx[$k] = $model3->getCollection()->addFieldToFilter('group_id', $item['group_id'])->getData();
            $k ++;
        }
        $this->_coreRegistry->register('youtube_integration_gallery_group_list', $xxx);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? __('Edit Gallery') : __('New Gallery'));

        return $resultPage;
    }
}
