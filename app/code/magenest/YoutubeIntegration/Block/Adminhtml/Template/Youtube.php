<?php
/**
 * Created by PhpStorm.
 * User: hiennq
 * Date: 9/23/16
 * Time: 15:13
 */

namespace Magenest\YoutubeIntegration\Block\Adminhtml\Template;

class Youtube extends \Magento\Framework\Data\Form\Element\AbstractElement
{
    protected $_elements;

    public function getElementHtml()
    {
        $html = '
        
        <div id="banner" style="display: block; background-size: auto 100% ">
            
            <a id="link_video" class = "link_video" href="" style ="left: 15px;position: relative; display: inline-block">
                <img id="img-profile-channel" style ="display: block" src=""/>
            </a>
        </div>
        <div>
            <a id="link_video" class = "link_video" href="">
                <h1 id="title_h1"></h1>
            </a>
        </div>
        <div id="description" style=" overflow: hidden; text-overflow: ellipsis; line-height: 1.6; max-height: 41.6px">
             
        </div>
        <div style="margin-top: 15px">
            <span id = "video_span" title="Videos">
                <span>Videos: </span> 
                <span id ="video_count"></span>
            </span>  
            <span class="subscriber_span" title="Subscribers">
                <span> |Subscribers: </span> 
                <span id ="subscriber_count"></span>
            </span>  
            <span class="view_span" title="Views">
                <span> |Views: </span> 
                <span id = "view_count"></span>
            </span> 
        </div>
        <!--subcriber-->
        <div style="margin-top: 15px">
            <div style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 114px; height: 24px;">
                <iframe  data-gapiattached="true" id="sub_button" src="" name="I0_1476170822347"  vspace="0" tabindex="0" style="position: static; top: 0px; width: 114px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" scrolling="no" marginwidth="0" marginheight="0" hspace="0" frameborder="0" width="100%">
                </iframe>
            </div>
        </div>
        <!--playlist-->
        <div class="playlist-content">
            <div class="nav-playlist-div" style ="height: 58px;"  >
                <ul id = "nav-playlist" class ="nav-playlist" style="">
                </ul>
            </div>
            <div class = "pre-page" id="pre-page"><</div>
            <div class = "video-playlist" id="video-playlist" style =" height: 163px;">
                
            </div>
            <div class ="nex-page" id="nex-page">></div>
        </div>
        <div class ="modal" id="popup-page"> 
            <span class="close">×</span>
            <!--popup video-->
            <div class = "video-content">
                <iframe id ="one-video-id-iframe" src="" title="YouTube video player" allowfullscreen="1" frameborder="0" width="100%" height="100%"></iframe>
            </div>
            <!--popup content-->
            <div class ="popup-content" >
                <div class ="watch-headline">
                    <h1 id="watch-title" class="watch-title"></h1>
                </div>             
                <div class ="watch-video-info-meta">
                    <div class="watch-video-channel">
                        <div class="watch-thumbnail-channel">
                            <a id="watch-thumbnail-channel-url" class ="watch-thumbnail-channel-url" href="">
                                <img id="watch-thumbnail-channel-img" src="">
                                </img>
                            </a>
                        </div>
                        <div class="watch-video-channel-info">
                            <a id = "watch-video-channel-info-name" class ="watch-video-channel-info-name" href="">name channel</a>
                            <div class ="watch-sub-channel" style="margin-top: 15px">
                                <div style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 114px; height: 24px;">
                                    <iframe data-gapiattached="true" id="sub_button" src="https://www.youtube.com/subscribe_embed?usegapi=1&amp;channelid=UCmKurapML4BF9Bjtj4RbvXw" name="I0_1476170822347" id="I0_1476170822347" vspace="0" tabindex="0" style="position: static; top: 0px; width: 114px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" scrolling="no" marginwidth="0" marginheight="0" hspace="0" frameborder="0" width="100%">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="watch-video-properties">
                        <div id= "watch-video-views" class = "watch-video-views"></div>
                        <div class = "watch-video-rating">
                            <div class="watch-video-rating-ratio">
                                <span style="width: 98%">
                                </span>
                            </div>
                            <div class = "watch-video-rating-count">        
                                <div class = "watch-video-like">
                                    <span  class="watch-video-icon-like">Likes: </span>
                                    <span class="watch-video-likes"></span>
                                </div>
                                <div class = "watch-video-dislike">
                                    <span class="watch-video-icon-dislike">Dislikes: </span>
                                    <span class="watch-video-dislikes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class ="watch-video-info-main">
                    <div id ="watch-video-publish-date" class="watch-video-publish-date">Published at ...</div>
                    <div id = "watch-video-description" class="watch-video-description">
                    this is description
                    </div>
                    <div class="watch-video-description-more">
                        Show more/Show less
                    </div>
                </div>
                
                <div class ="watch-video-cmts" id="watch-video-cmts">
                </div>
            </div>          
        </div>
        ';

        return $html;
    }
}
