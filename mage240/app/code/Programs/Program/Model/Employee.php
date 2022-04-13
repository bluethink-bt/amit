<?php


namespace Programs\Program\Model;
class Employee extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'programs_program_employee';

	protected $_cacheTag = 'programs_program_employee';

	protected $_eventPrefix = 'programs_program_employee';


	protected function _construct()
	{
		$this->_init('Programs\Program\Model\ResourceModel\Employee');
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