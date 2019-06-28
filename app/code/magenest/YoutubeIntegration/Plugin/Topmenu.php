<?php
namespace Magenest\YoutubeIntegration\Plugin;

use Magento\Framework\View\Element\Template;

class Topmenu extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $subject, $result)
    {
        $result .= '<li class="level0 nav-10 level-top parent ui-menu-item"><a href="'.$this->getUrl('youtube/gallery').'" class="level-top ui-corner-all" role="presentation">Youtube Gallery</a></li>';

        return $result;
    }
}
