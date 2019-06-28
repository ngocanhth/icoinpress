<?php
namespace Magenest\YoutubeIntegration\Block\Adminhtml\Gallery\Edit\Renderer;

/**
* CustomFormField Customformfield field renderer
*/
class CustomRenderer extends \Magento\Framework\Data\Form\Element\AbstractElement
{
/**
* Get the after element html.
*
* @return mixed
*/
    public function getAfterElementHtml()
    {
        $customDiv = '
        <div style="width:600px;height:200px;margin:10px 0;border:2px solid #000" id="customdiv">
            <div class="" id="">
                <div class="">
                    <table class="">
                        <thead>
                            <tr>
                                <th>Customer Group</th>
                                <th>Minimum Qty</th>
                                <th class="col-actions" colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="col-actions-add">
                                <button id="button" class="action-add" title="Add" type="button">
                                    <span>Add</span>
                                </button>
                            </td>
                        </tr>
                        </tfoot>
                        <tbody id="">
                        <tr id="">
                            <td>
                                <select name="" id="" class="" title="">
                                    <option value="32000">ALL GROUPS</option>
                                    <option value="0">NOT LOGGED IN</option>
                                    <option value="1">General</option>
                                    <option value="2">Wholesale</option>
                                    <option value="3">Retailer</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" id="" name="" value="" class="input-text">
                            </td>
                            <td class="col-actions">
                                <button onclick="arrayRow_57e5df3cab2fc.del(\'_1474682793109_109\')" class="action-delete" type="button">
                                <span>Delete</span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>';
        return $customDiv;
    }
}
