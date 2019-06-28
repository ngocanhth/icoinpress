<?php
namespace Magenest\YoutubeIntegration\Model;

use Magenest\YoutubeIntegration\Model\ResourceModel\Group as ResourceGroup;
use Magenest\YoutubeIntegration\Model\ResourceModel\Group\Collection as Collection;

/**
 * Class Group
 * @package Magenest\YoutubeIntegration\Model
 */
class Group extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'group';

    /**
     * Gallery constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceGroup $resource
     * @param Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceGroup $resource,
        Collection $resourceCollection,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
}
