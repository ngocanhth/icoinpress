<?php

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\YoutubeIntegration\Helper;

use Magento\Framework\App\Area;
use Magento\Framework\App\Helper\Context;

/**
 * Helper to get attributes for video
 */
class Media extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Catalog Module
     */
    const MODULE_NAME = 'Magenest_YoutubeIntegration';

    /**
     * Configuration path
     */
    const XML_PATH_YOUTUBE_API_KEY = 'youtube/gallery/youtube_api_key';

    /**
     * Configuration path for video play
     */
    const XML_PATH_PLAY_IF_BASE = 'youtube/gallery/play_if_base';

    /**
     * Configuration path for show related
     */
    const XML_PATH_SHOW_RELATED = 'youtube/gallery/show_related';
    /**
     * Configuration path for video auto restart
     */
    const XML_PATH_VIDEO_AUTO_RESTART = 'youtube/gallery/video_auto_restart';

    /**
     * Media config node
     */
    const MEDIA_TYPE_CONFIG_NODE = 'videos';

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Get play if base video attribute
     *
     * @return mixed
     */
    public function getPlayIfBaseAttribute()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_PLAY_IF_BASE);
    }

    /**
     * Get show related youtube attribute
     *
     * @return mixed
     */
    public function getShowRelatedAttribute()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SHOW_RELATED);
    }

    /**
     * Get video auto restart attribute
     *
     * @return mixed
     */
    public function getVideoAutoRestartAttribute()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_VIDEO_AUTO_RESTART);
    }

    /**
     * Retrieve YouTube API key
     *
     * @return string
     */
    public function getYouTubeApiKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_YOUTUBE_API_KEY);
    }
}
