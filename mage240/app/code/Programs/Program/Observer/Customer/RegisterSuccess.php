<?php       

 namespace Programs\Program\Observer\Customer;       

 class RegisterSuccess implements \Magento\Framework\Event\ObserverInterface                                
 {

// public function __construct(
//     ......
//     ......
//     )
// {
//     ......
// }
public function execute(
    \Magento\Framework\Event\Observer $observer
) {
    $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/templog.log');
$logger = new \Zend\Log\Logger();
$logger->addWriter($writer);
$logger->info("preorder qty ");

    $customer = $observer->getEvent()->getData('customer');

    echo "<pre>"; print_r($customer); die(" fghfgsdfgshdghjsg");

}}