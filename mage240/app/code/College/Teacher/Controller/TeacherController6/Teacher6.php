<?php
namespace College\Teacher\Controller\TeacherController6;

class Teacher6 extends \Magento\Framework\App\Action\Action
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
		$postValue = $this->getRequest()->getPostValue();
        $id = $this->_request->getParam('id');
        $this->teacher->load($id);
        
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
        $this->_messageManager->addSuccess('Record Updated Successfully');
		return $this->_redirect('teacher/teachercontroller3/teacher3');
	}
}