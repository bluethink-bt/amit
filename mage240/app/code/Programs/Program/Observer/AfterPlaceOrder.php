<?php
namespace Programs\Program\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class AfterPlaceOrder implements ObserverInterface
{
    protected $request;
    protected $employee;
    protected $_order;

    public function __construct(
        // ... Inject Your custom model where your want to save the data
        \Programs\Program\Model\EmployeeFactory $employee,
        \Magento\Sales\Api\Data\OrderInterface $order,
        \Magento\Framework\App\RequestInterface $request
        
    ) {
        $this->employee = $employee;
        $this->request = $request;
        $this->_order = $order;    
        
    }
    public function execute(Observer $observer)
    {
        // $values = $this->request->getParams(); 
        $orderids = $observer->getEvent()->getOrderIds();
        // print_r($orderids);
        foreach($orderids as $orderid){
            $model = $this->employee->create();
            $model->setOrderId($orderid);
            $model->save();
        }

        // $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/amit2.log');
        // $logger = new \Zend\Log\Logger();
        // $logger->addWriter($writer);
        // $logger->info(print_r($orderids)); 
    }   
}