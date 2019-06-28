<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Template;

class PlayList extends \Magento\Framework\Data\Form\Element\AbstractElement
{
    protected $_elements;

    public function getElementHtml()
    {
        $html = '
            
        <div class="playlist-demo-items" id ="playlist-demo-items">
            <div class="playlist-demo-item" id="playlist-demo-item">
                <div class="playlist-toggle-active">
                    <div class="playlist-toggle-trigger" id="playlist-toggle-trigger">
                        <div class="playlist-name" id="playlist-name">Playlist Name</div>
    
                        <div class="playlist-toggle-name" id ="playlist-toggle-name"></div>    
                    </div>
    
                    <div class="playlist-toggle-content" id="playlist-toggle-content">
                        <div class="i">
                            <div class="playlist-field-name">
                                Group name
                                <span class="playlist-tooltip">
                                    <span id= "playlist-tooltip-trigger" class="playlist-tooltip-trigger">?</span>
    
                                    <span id = "playlist-tooltip-content" class="playlist-tooltip-content">
                                        <span class="playlist-tooltip-content-inner">
                                            Give a name to your custom video group. It will be displayed in tabs. If you leave it empty, "Untitled" name will be set.                                                        </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
    
                            <div class = "playlist-input-value-names" >
                                <input class = "playlist-input-value-name" id ="playlist-input-value-name" name="group_name[]" type="text">
                            </div>
                        </div>
    
                        <div class="playlist-field" id="playlist-field">
                            <div class="playlist-field-name">
                                Sources (playlists, videos)                                           
                            </div>
                            <div class="playlist-item-sources-parent">
                                <div class="playlist-item-sources">
                                    <div class="playlist-item-sources-item" id="playlist-item-sources-item">
                                        <input  id = "playlist-input-value" class = "playlist-input-value" name="list_url[0][]" value="" placeholder="Add a YouTube source URL" autocomplete="off" type="text">
        
                                        <div class="playlist-item-sources-item-remove-icon" id="playlist-item-sources-item-remove-icon" title="Remove this source">
                                            x
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class ="playlist-item-sources-item-add-icon" id ="playlist-item-sources-item-add-icon">+</div>
                        </div>
    
                        <div class="playlist-item-remove">
                            <span class="playlist-item-remove-icon"></span>
                            <span class="playlist-item-remove-label">Delete group</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--button add-->
        <div class="playlist-add">
            <span class="yottie-demo-icon-plus-white-medium yottie-demo-icon"></span>
            <span class="playlist-add-label" id="playlist-add-label">Add group</span>
        </div>
        ';

        return $html;
    }
}
