<?php
namespace College\Teacher\Model\ResourceModel\Teacher;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'college_teacher_teacher_collection';
	protected $_eventObject = 'teacher_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('College\Teacher\Model\Teacher', 'College\Teacher\Model\ResourceModel\Teacher');
	}
}