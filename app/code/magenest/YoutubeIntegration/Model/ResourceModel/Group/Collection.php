<?php
namespace Magenest\YoutubeIntegration\Model\ResourceModel\Group;

/**
 * Class Collection
 * @package Magenest\YoutubeIntegration\Model\ResourceModel\Gallery
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'group_id';

    protected function _construct()
    {
        $this->_init('Magenest\YoutubeIntegration\Model\Group', 'Magenest\YoutubeIntegration\Model\ResourceModel\Group');
    }
}
