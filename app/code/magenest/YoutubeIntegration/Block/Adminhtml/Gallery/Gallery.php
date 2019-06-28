<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery;

/**
 * Class Gallery
 * @package Magenest\YoutubeIntegration\Block\Adminhtml\Gallery
 */
class Gallery extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_YoutubeIntegration';

        parent::_construct();
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        $this->setChild(
            'grid',
            $this->getLayout()->createBlock(
                'Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Grid',
                'youtubeintegration.gallery.grid'
            )
        );
        return parent::_prepareLayout();
    }
}
