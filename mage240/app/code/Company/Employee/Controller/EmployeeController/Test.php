<?php

namespace Company\Employee\Controller\EmployeeController;

class Test extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('firstname' => 'Amit','lastname' => 'Gupta'));
		$this->_eventManager->dispatch('company_employee_my_event', ['mp_text' => $textDisplay]);
		// echo $textDisplay->getText();
		// exit;
	}
}