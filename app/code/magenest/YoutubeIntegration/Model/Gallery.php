<?php
namespace Magenest\YoutubeIntegration\Model;

use Magenest\YoutubeIntegration\Model\ResourceModel\Gallery as ResourceGallery;
use Magenest\YoutubeIntegration\Model\ResourceModel\Gallery\Collection as Collection;

/**
 * Class Gallery
 * @package Magenest\YoutubeIntegration\Model
 */
class Gallery extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'gallery';

    /**
     * Gallery constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceGallery $resource
     * @param Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceGallery $resource,
        Collection $resourceCollection,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
}
