<?php
namespace Magenest\YoutubeIntegration\Model\ResourceModel\Gallery;

/**
 * Class Collection
 * @package Magenest\YoutubeIntegration\Model\ResourceModel\Gallery
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Magenest\YoutubeIntegration\Model\Gallery', 'Magenest\YoutubeIntegration\Model\ResourceModel\Gallery');
    }
}
