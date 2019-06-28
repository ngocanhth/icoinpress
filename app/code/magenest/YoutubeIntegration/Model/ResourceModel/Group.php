<?php
namespace Magenest\YoutubeIntegration\Model\ResourceModel;

/**
 * Class Special
 * @package Magenest\YoutubeIntegration\Model\ResourceModel
 */
class Group extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_youtubeintegration_gallery_group', 'group_id');
    }
}
