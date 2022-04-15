<?php

namespace Company\Employee\Observer;

class MyEventObserver implements \Magento\Framework\Event\ObserverInterface
{
    protected $request;
    protected $employee;
   
    public function __construct(
        // ... Inject Your custom model where your want to save the data
        \Company\Employee\Model\Employee1Factory $employee,
        \Magento\Framework\App\RequestInterface $request
        
    ) {
        
        $this->employee = $employee;
        $this->request = $request;
        
    }

	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		// $displayText = $observer->getData('mp_text');
		// echo $displayText->getText() . " - Event </br>";
		// $displayText->setText('Execute event successfully.');

		// return $this;

        $displayText = $observer->getData();
        // echo("<pre>");
        // print_r($displayText);

        $firstname = $displayText['mp_text']['firstname'];
        $lastname = $displayText['mp_text']['lastname'];
        $model = $this->employee->create();
        $model->setFirstname($firstname);
        $model->setLastname($lastname);
        $model->save();

	}
}