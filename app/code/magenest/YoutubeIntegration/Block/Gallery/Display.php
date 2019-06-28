<?php
namespace Magenest\YoutubeIntegration\Block\Gallery;

use Magento\Framework\View\Element\Template;

class Display extends Template
{
    public function __construct(
        Template\Context $context,
//        PhotoFactory $photoFactory,
//        TaggedPhotoFactory $taggedPhotoFactory,
//        Client $client,
        array $data = []
    ) {
//        $this->_client = $client;
//        $this->_photoFactory = $photoFactory;
//        $this->_taggedPhotoFactory = $taggedPhotoFactory;
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        /** @var \Magento\Theme\Block\Html\Pager */
        $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'youtube.gallery.list.pager'
        );
        $pager->setUseContainer(false)
            ->setShowPerPage(false)
            ->setShowAmounts(false)
            ->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )
            ->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            );
        $this->setChild('pager', $pager);

        return $this;
    }
    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    /**
     * @return string
     */
    public function getViewParam()
    {
        return $this->getRequest()->getParam('view');
    }

    /**
     * @return int
     */
    public function getPageParam()
    {
        return $this->getRequest()->getParam('page');
    }
}
