<?php
namespace Programs\Program\Controller\SampleController2;

class Samp2 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $employee;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Programs\Program\Model\Employee $employee
		)
	{
		$this->employee = $employee;
		return parent::__construct($context);
	}

	public function execute()
	{

		$postValue = $this->getRequest()->getPostValue();
		$email = $postValue['email'];
		$name  = $postValue['name']; 	
		// $fistname = $postValue['firstname']; 	
		// $lastname = $postValue['lastname']; 	
		// $textDisplay = new \Magento\Framework\DataObject(array('firstname' => $firstname, 'lastname' =>$lastname));
		// $this->_eventManager->dispatch('programs_program_add_text', ['mp_text' => $textDisplay]);
		// echo $textDisplay->getText();
		// exit;

		$this->employee->setName($name);
		$this->employee->setEmail($email);
		$this->employee->save();
		return $this->_redirect('programs/samplecontroller3/samp3');
	}




}
