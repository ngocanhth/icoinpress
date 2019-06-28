<?php

namespace Magenest\YoutubeIntegration\Block\Gallery;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Element\Template;

/**
 * Class Cancel
 * @package Magenest\Reservation\Controller\Customer
 */
class Gallery extends Template
{
    protected $_resultPageFactory;

    protected $_galleryFactory;

    protected $_groupFactory;

    protected $_groupListFactory;

    protected $_logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\YoutubeIntegration\Model\GalleryFactory $galleryFactory,
        \Magenest\YoutubeIntegration\Model\GroupFactory $groupFactory,
        \Magenest\YoutubeIntegration\Model\GroupListFactory $groupListFactory
    ) {
        $this->_logger = $logger;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_galleryFactory = $galleryFactory;
        $this->_groupFactory = $groupFactory;
        $this->_groupListFactory = $groupListFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public  function getChannelActive()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('magenest_youtubeintegration_gallery'); // the table name in this example is 'mytest'

        $id = 1;
        $sql = $connection->select()
            ->from($tableName)
            ->where('is_active = ?', $id)
        ->order('Id DESC')//->setLimit(1);
            ->limit(1);
        $result = $connection->fetchAll($sql);
        return $result;
    }

    public function getGroupActive($gallery_id)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('magenest_youtubeintegration_gallery_group');
        $sql = $connection->select()
            ->from(
               ['gr' => $tableName ]
            ) // to select all fields
            ->join(
                ['ga' => 'magenest_youtubeintegration_gallery'],
                'gr.gallery_id = ga.id'
            )
            ->where('gallery_id = ?', $gallery_id);

        $result = $connection->fetchAll($sql);
        return $result;
    }

    public function getGroupListActive($group_id){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('magenest_youtubeintegration_gallery_group_list');
        $sql = $connection->select()
            ->from(
                 $tableName
            ) // to select all fields

            ->where('group_id = ?', $group_id);
        $result = $connection->fetchAll($sql);
        return $result;
    }
}
