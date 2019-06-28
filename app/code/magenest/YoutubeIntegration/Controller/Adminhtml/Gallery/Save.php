<?php
namespace Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery;

use Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery\Gallery as GalleryController;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Save
 * @package Magenest\YoutubeIntegration\Controller\Adminhtml\Gallery
 */
class Save extends GalleryController
{
    protected $_galleryFactory;

    protected $_groupFactory;

    protected $_groupListFactory;

    public function __construct(
        \Magenest\YoutubeIntegration\Model\GalleryFactory $galleryFactory,
        \Magenest\YoutubeIntegration\Model\GroupFactory $groupFactory,
        \Magenest\YoutubeIntegration\Model\GroupListFactory $groupListFactory,
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        $this->_galleryFactory = $galleryFactory;
        $this->_groupFactory = $groupFactory;
        $this->_groupListFactory = $groupListFactory;
        parent::__construct($pageFactory, $context);
    }

    public function execute()
    {
        $requestData = $this->getRequest()->getPostValue();
        $requestDataGr = $this->getRequest()->getPostValue('group_name');
        $requestDataLi = $this->getRequest()->getPostValue('list_url');
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($requestData) {
            /** @var \Magenest\YoutubeIntegration\Model\Gallery $model */
            $model = $this->_galleryFactory->create();
            $model2 = $this->_groupFactory->create();
            $model3 = $this->_groupListFactory->create();
            $data = $requestData;
            if (isset($data['id'])) {
                $model->load($data['id']);
                if ($data['id'] != $model->getId()) {
                    throw new \Magento\Framework\Exception\LocalizedException(__('Unable to save.'));
                }
            }
            $model->addData($data);
            $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($model->getData());
            $model2->addData($requestDataGr);
            $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($model2->getData());
            try {
                $model->save();
                try {
                    $galleryId = $model->getId();

                    //Aiden L add
                    //delete all group
//                    $oldGroups = $this->_groupFactory->create()->getCollection()->addFieldToFilter('g' ,$galleryId );
//
//                    if ($oldGroups->getSize() > 0) {
//                        foreach ($oldGroups as $oldGroup ) {
//                            $oldGroup->delete();
//                        }
//                    }

                    //delete all list
                    //end of Aiden L add
                    if (!empty($requestDataGr)) {
                        $i = 0;
                        $oldGroups = $this->_groupFactory->create()->getCollection()->addFieldToFilter('gallery_id' ,$galleryId );

                        if ($oldGroups->getSize() > 0) {
                            foreach ($oldGroups as $oldGroup ) {
                                $oldGroupLists = $this->_groupListFactory->create()->getCollection()->addFieldToFilter('group_id' ,$oldGroup['group_id']);

                                if ($oldGroupLists->getSize() > 0) {
                                    foreach ($oldGroupLists as $oldGroupList ) {
                                        $oldGroupList->delete();
                                    }
                                }
                                $oldGroup->delete();
                            }
                        }

                        foreach ($requestDataGr as $key => $groupName) {
                            $model2 = $this->_groupFactory->create();
                            $model2->setData([
                                'group_name' =>$groupName,
                                'gallery_id' =>$galleryId
                            ]);
                            $model2->save();

                            try {
                                $groupId = $model2->getId();
                                if (!empty($requestDataLi)) {
                                    foreach ($requestDataLi[$i] as $keyy=>$liUrl) {
                                        $model3 = $this->_groupListFactory->create();
                                        $model3->setData([
                                            'list_url' =>$liUrl,
                                            'group_id' =>$groupId
                                        ]);
                                        $model3->save();
                                    }
                                }
                            }

                            catch (\Exception $e) {
                                $this->messageManager->addError($e->getMessage());
                            }

                            $i++;
                        }
                    }
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                }

                $this->messageManager->addSuccessMessage(__('Gallery has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __('Something went wrong while saving rule.'));
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}
