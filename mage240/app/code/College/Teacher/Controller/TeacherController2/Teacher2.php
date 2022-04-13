<?php
namespace College\Teacher\Controller\TeacherController2;

class Teacher2 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $teacher;
	protected $_messageManager;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\College\Teacher\Model\Teacher $teacher,
		\Magento\Framework\Message\ManagerInterface $messageManager
        // \Magento\Framework\View\Result\PageFactory $pageFactory
		)
	{
		$this->teacher = $teacher;
		$this->_messageManager = $messageManager;
		return parent::__construct($context);
	}

	public function execute()
	{
		// echo("<pre>");
		$postValue = $this->getRequest()->getPostValue();
        // print_r($postValue);die;
	
		$name  = $postValue['name']; 
		$email = $postValue['email'];
		$qualification  = $postValue['qualification']; 
		$department = $postValue['department'];
		$phone = $postValue['phone'];
		
		$this->teacher->setName($name);
		$this->teacher->setEmail($email);
		$this->teacher->setQualification($qualification);
		$this->teacher->setDepartment($department);
		$this->teacher->setPhone($phone);
		$this->teacher->save();
		$this->_messageManager->addSuccess('Record Inserted Successfully');
		return $this->_redirect('teacher/teachercontroller1/teacher1');
	}
}


		
