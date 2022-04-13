<?php


namespace Company\Employee\Model;
class Employee1 extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'company_employee_employee1';

	protected $_cacheTag = 'company_employee_employee1';

	protected $_eventPrefix = 'company_employee_employee1';

	protected function _construct()
	{
		$this->_init('Company\Employee\Model\ResourceModel\Employee1');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}