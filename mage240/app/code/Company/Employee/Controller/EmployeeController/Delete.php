<?php
namespace Company\Employee\Controller\EmployeeController;
 
class Delete extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
    
     protected $_request;
    
     protected $employee;
    
     protected $_messageManager;
    
     protected $_file;

     protected $_filesystem;

     protected $imageHelper;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\App\Request\Http $request,
          \Company\Employee\Model\Employee1Factory $employee,
          \Magento\Framework\Message\ManagerInterface $messageManager,
          \Magento\Framework\Filesystem $filesystem,
          \Magento\Framework\Filesystem\Driver\File $file,
          \Magento\Catalog\Helper\Image $imageHelper
     ){
     
          $this->_request = $request;
          $this->employee = $employee;
          $this->_file = $file;
          $this->_filesystem = $filesystem;
          $this->imageHelper = $imageHelper;
          $this->_messageManager = $messageManager;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          $id = $this->_request->getParam('id');
          $model = $this->employee->create()->load($id);
          $data  = $model->getImage();  
          $fileName = $data;
          // $fileName = "624ae69359196download.png";// replace this with some codes to get the $fileName
          // echo($fileName);die;
          $mediaPath = $this->_filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
          $newPath =$mediaPath.'tmp/image';
         
          $fileNName =  $newPath . "/" .$fileName ; 
          if (file_exists($fileNName))
          {
               unlink($newPath . "/" . $fileName);
          }

          $result = $model->setId($id);
          $result = $result->delete();
          $this->_messageManager->addSuccess('Record Deleted Successfully');
          return $this->_redirect('employee/employeecontroller/employee3');    
     }
}
