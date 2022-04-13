<?php
namespace Company\Employee\Controller\EmployeeController;

class Amit extends \Magento\Framework\App\Action\Action
{
	// protected $_pageFactory;
    // protected $authSession;
    // protected $_objectManager;

	public function __construct(
		\Magento\Framework\App\Action\Context $context
		// \Magento\Framework\View\Result\PageFactory $pageFactory
        // \Magento\Backend\Model\Auth\Session $authSession
        // \Magento\Framework\ObjectManagerInterface $objectManager
        )
	{
		// $this->_pageFactory = $pageFactory;
        // $this->authSession = $authSession;
        // $this->_objectManager = $objectManager;
		return parent::__construct($context);
	}

	public function execute()
	{
        // $post = $this->getRequest()->getPostValue();
        // $model = $this->_objectManager->create('Chirag\Mygrid\Model\Question');
        // $model->setData('question_title', $post['question_title']);
        // $model->setData('question', $post['question']);
        // $model->save();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $extensionUser = $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getUsername();
        echo $extensionUser;
        die;

        // $post = $this->getRequest()->getPostValue();
    //  $model = $objectManager->create('Mageprince\Faq\Model\Faq');
    //  $model->setData('addedbyadmin', $extensionUser);
    //  $model->save();


        // return $this->_pageFactory->create();

        // $data = $this->authSession->getUser()->getUsername();
        // echo($data);
        // die;
        // return $this->_redirect('employee/employeecontroller/employee1');



	}
}
