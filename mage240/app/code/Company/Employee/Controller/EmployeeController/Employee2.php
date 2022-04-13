<?php
namespace Company\Employee\Controller\EmployeeController;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
class Employee2 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $emp;
    protected $_messageManager;
	protected $filesystem;
	protected $fileUploader;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \Company\Employee\Model\Employee1 $employee1,
        \Magento\Framework\Message\ManagerInterface $messageManager,
		Filesystem $filesystem,
        UploaderFactory $fileUploader)
	{
        $this->emp = $employee1;
        $this->_messageManager = $messageManager;
		$this->filesystem = $filesystem;
        $this->fileUploader = $fileUploader;
		// $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
		return parent::__construct($context);
	}
	public function execute()
	{
		$postValue = $this->getRequest()->getPostValue();
		$name  = $postValue['name']; 	
        $email = $postValue['email'];
        $city  = $postValue['city']; 	
        $mobile = $postValue['mobile'];
        $image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$this->emp->setName($name);
		$this->emp->setEmail($email);
        $this->emp->setCity($city);
		$this->emp->setMobile($mobile);
           $file=uniqid().$image;
		   $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		   $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
		   $mediaPath = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
		   $media = $mediaPath.'tmp/image/';   // location of file 
		//    echo($media);die;
		//    $file_name = $_FILES['image']['name'];
		//    $file_size = $_FILES['image']['size'];
		//    $file_tmp = $_FILES['image']['tmp_name'];
		//    $file_type = $_FILES['image']['type'];
		   if (move_uploaded_file($image_tmp, $media . $file)) // file name+ new location:move uploaded file to new destination
		   {
			$this->emp->setImage($file);
      		$this->emp->save();
		   }
        $this->_messageManager->addSuccess('Record Inserted Successfully');
		return $this->_redirect('employee/employeecontroller/employee1');
	}


	

}






	