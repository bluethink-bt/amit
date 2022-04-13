<?php


namespace College\Teacher\Model;
class Teacher extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'college_teacher_teacher';

	protected $_cacheTag = 'college_teacher_teacher';

	protected $_eventPrefix = 'college_teacher_teacher';

	protected function _construct()
	{
		$this->_init('College\Teacher\Model\ResourceModel\Teacher');
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