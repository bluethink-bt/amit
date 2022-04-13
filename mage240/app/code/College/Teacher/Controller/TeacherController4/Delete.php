<?php
namespace College\Teacher\Controller\TeacherController4;
 
class Delete extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_request;
     protected $_teacher;
     protected $_messageManager;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \College\Teacher\Model\TeacherFactory $teacher,
          \Magento\Framework\Message\ManagerInterface $messageManager
     ){
          $this->_pageFactory = $pageFactory;
          $this->_request = $request;
          $this->_teacher = $teacher;
          $this->_messageManager = $messageManager;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          $id = $this->_request->getParam('id');
          $postData = $this->_teacher->create();
          $result = $postData->setId($id);
          $result = $result->delete();
          $this->_messageManager->addSuccess('Record Deleted Successfully');
          return $this->_redirect('teacher/teachercontroller3/teacher3');
     }
}
