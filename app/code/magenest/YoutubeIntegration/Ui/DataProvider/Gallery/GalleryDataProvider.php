<?php
namespace Magenest\YoutubeIntegration\Ui\DataProvider\Gallery;

use Magenest\YoutubeIntegration\Model\ResourceModel\Gallery\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class GalleryDataProvider extends AbstractDataProvider
{
    protected $collection;

    protected $addFieldStrategies;

    protected $addFilterStrategies;

    public function __construct(
        CollectionFactory $galleryFactory,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta,
        array $data
    ) {
        $this->collection = $galleryFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->toArray();
        return [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }
}
