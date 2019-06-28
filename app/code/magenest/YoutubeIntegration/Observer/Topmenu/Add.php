<?php

namespace Magenest\YoutubeIntegration\Observer\Topmenu;

use Magento\Framework\Data\Tree\Node;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\UrlInterface;

class Add implements ObserverInterface
{
    protected $_urlInterface;

    public function __construct(
        UrlInterface $urlInterface
    ) {
        $this->_urlInterface = $urlInterface;
    }

    public function execute(Observer $observer)
    {
        /** @var \Magento\Framework\Data\Tree\Node $menu */
        $menu = $observer->getMenu();
        $tree = $menu->getTree();
        $url = $this->_urlInterface->getUrl('youtube/gallery');

        $data = [
            'name' => __('Youtube Integration'),
            'id' => 'youtube_topmenu',
            'url' => $url,
            'is_active' => 0
        ];

        $node = new Node($data, 'id', $tree, $menu);
        $menu->addChild($node);

        return $this;
    }
}
