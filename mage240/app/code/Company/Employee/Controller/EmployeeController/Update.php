<?php
namespace Company\Employee\Controller\EmployeeController;

class Update extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $employee;
    protected $_messageManager;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Company\Employee\Model\Employee1 $employee,
        \Magento\Framework\Message\ManagerInterface $messageManager
        // \Magento\Framework\View\Result\PageFactory $pageFactory
		)
	{
		$this->employee = $employee;
        $this->_messageManager = $messageManager;
		return parent::__construct($context);
	}

	public function execute()
	{
		$postValue = $this->getRequest()->getPostValue();       
        $id = $this->_request->getParam('id');
        $this->employee->load($id);
      
		$name  = $postValue['name']; 
		$email = $postValue['email'];
		$city  = $postValue['city']; 
		$mobile = $postValue['mobile'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

		$this->employee->setName($name);
		$this->employee->setEmail($email);
		$this->employee->setCity($city);
		$this->employee->setMobile($mobile);

		if (!empty( $_FILES['image']['name'] )) {
			$this->employee->setImage($image);
        	$file=uniqid().$image;
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
			$mediaPath = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
			$media = $mediaPath.'tmp/image/';   // location of file 
        	if (move_uploaded_file($image_tmp, $media . $file)) // file name+ new location:move uploaded file to new destination
			{
				$this->employee->setImage($file);
      			$this->employee->save();
			}
        }
		$this->employee->save();
        $this->_messageManager->addSuccess('Record Updated Successfully');
		return $this->_redirect('employee/employeecontroller/employee3');
	}
}