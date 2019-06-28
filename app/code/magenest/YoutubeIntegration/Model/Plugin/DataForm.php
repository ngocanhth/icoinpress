<?php
namespace Magenest\YoutubeIntegration\Model\Plugin;

use Magento\Backend\Block\Widget\Form;

/**
 * Class RenderPlugin
 * @package Magenest\YoutubeIntegration\Model\Plugin\View\Layout
 */
class DataForm
{
    public function aroundSetForm(Form $subject, \Closure $proceed, $form)
    {
        $proceed($form);
        $data = $subject->getData();

        if (isset($data['module_name']) && isset($data['dest_element_id']) && $data['module_name'] == 'Magento_User') {
            $subject->getForm()->addCustomAttribute('enctype', 'multipart/form-data');
        }
        return $subject;
    }
}
