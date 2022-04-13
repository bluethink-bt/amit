<?php
namespace Company\Employee\Model\ResourceModel\Employee1;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'company_employee_employee1_collection';
	protected $_eventObject = 'employee1_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Company\Employee\Model\Employee1', 'Company\Employee\Model\ResourceModel\Employee1');
	}

}