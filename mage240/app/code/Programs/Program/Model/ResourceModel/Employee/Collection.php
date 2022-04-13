<?php
namespace Programs\Program\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'programs_program_employee_collection';
	protected $_eventObject = 'employee_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Programs\Program\Model\Employee', 'Programs\Program\Model\ResourceModel\Employee');
	}

}