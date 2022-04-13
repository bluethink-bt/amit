<?php
namespace Programs\Program\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class AddCustomerData implements ObserverInterface
{
    protected $request;
    protected $employee;

    public function __construct(
        // ... Inject Your custom model where your want to save the data
        \Programs\Program\Model\EmployeeFactory $employee,
        \Magento\Framework\App\RequestInterface $request
        
    ) {
        
        $this->employee = $employee;
        $this->request = $request;
        
    }

    public function execute(Observer $observer)
    {
        $values = $this->request->getParams(); 
        $firstname = $values['firstname'];
        $lastname = $values['lastname'];
        $email = $values['email'];
        $name = $firstname . $lastname ;

        // $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/amit.log');
        // $logger = new \Zend\Log\Logger();
        // $logger->addWriter($writer);

        // $logger->info(print_r($values['firstname'])); 
      
        $model = $this->employee->create();
        $model->setFirstname($firstname);
        $model->setLastname($lastname);
        $model->setEmail($email);
        $model->setName($name);
        $model->save();
        // echo($custom);die;
        // $postValue = $this->getRequest()->getPostValue();       
        // $id = $this->_request->getParam('id');
        // $this->employee->load($custom);
        // $firstname  = $postValue['firstname']; 
     
        // $this->employee->setFirstname($firstname);
        // $this->employee->save();
        // Now load your model and save the data, you will get the custom data in $custom field.
    }   
}