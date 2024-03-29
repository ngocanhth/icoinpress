<?php
namespace Magently\Ajax\Controller\Query;

class Custom extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        //get data
        $data = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        $resultJson->setData($data);
        return $resultJson;
    }
}

