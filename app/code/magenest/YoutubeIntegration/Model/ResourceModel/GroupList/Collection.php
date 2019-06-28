<?php
namespace Magenest\YoutubeIntegration\Model\ResourceModel\GroupList;

/**
 * Class Collection
 * @package Magenest\YoutubeIntegration\Model\ResourceModel\Gallery
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'list_id';

    protected function _construct()
    {
        $this->_init('Magenest\YoutubeIntegration\Model\GroupList', 'Magenest\YoutubeIntegration\Model\ResourceModel\GroupList');
    }
}
