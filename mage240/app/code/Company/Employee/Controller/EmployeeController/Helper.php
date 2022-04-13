<?php
// namespace YourNamespace\YourModule\Controller;

// use Magento\Framework\App\Action\Context;
// use Magento\Framework\Message\ManagerInterface;
// use Magento\Framework\Filesystem;
// use Magento\MediaStorage\Model\File\UploaderFactory;
 
// class YourController extends \Magento\Framework\App\Action\Action
// {
//     /**
//      * @var \Magento\Framework\Message\ManagerInterface
//      */
//     protected $messageManager;

//     /**
//      * @var \Magento\Framework\Filesystem $filesystem
//      */
//     protected $filesystem;

//     /**
//      * @var \Magento\MediaStorage\Model\File\UploaderFactory $fileUploader
//      */
//     protected $fileUploader;

//     public function __construct(
//         Context $context,
//         ManagerInterface $messageManager,
//         // ... 
//         Filesystem $filesystem,
//         UploaderFactory $fileUploader
//     )
//     {
//         $this->messageManager       = $messageManager;
//         // ...
//         $this->filesystem           = $filesystem;
//         $this->fileUploader         = $fileUploader;

//         $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    
//         parent::__construct($context);
//     }

//     public function execute()
//     {
//         // your code

//         $uploadedFile = $this->uploadFile();

//         // your code
//     }

//     public function uploadFile()
//     {
//         // this folder will be created inside "pub/media" folder
//         $yourFolderName = 'your-custom-folder/';

//         // "my_custom_file" is the HTML input file name
//         $yourInputFileName = 'my_custom_file';

//         try{
//             $file = $this->getRequest()->getFiles($yourInputFileName);
//             $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;

//             if ($file && $fileName) {
//                 $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);        
                
//                 /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
//                 $uploader = $this->fileUploader->create(['fileId' => $yourInputFileName]);
                
//                 // set allowed file extensions
//                 $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
                
//                 // allow folder creation
//                 $uploader->setAllowCreateFolders(true);

//                 // rename file name if already exists 
//                 $uploader->setAllowRenameFiles(true);
                
//                 // rename the file name into lowercase
//                 // but this one is not working
//                 // we can simply use strtolower() function to rename filename to lowercase
//                 // $uploader->setFilenamesCaseSensitivity(true);
                
//                 // enabling file dispersion will 
//                 // rename the file name into lowercase
//                 // and create nested folders inside the upload directory based on the file name
//                 // for example, if uploaded file name is IMG_123.jpg then file will be uploaded in
//                 // pub/media/your-upload-directory/i/m/img_123.jpg
//                 // $uploader->setFilesDispersion(true);         

//                 // upload file in the specified folder
//                 $result = $uploader->save($target);

//                 //echo '<pre>'; print_r($result); exit;

//                 if ($result['file']) {
//                     $this->messageManager->addSuccess(__('File has been successfully uploaded.')); 
//                 }
                
//                 return $target . $uploader->getUploadedFileName();
//             }
//         } catch (\Exception $e) {
//             $this->messageManager->addError($e->getMessage());
//         }
//         return false;
//     }
// }
?>

<?php
// use Magento\Framework\App\Filesystem\DirectoryList;
// use Magento\Backend\App\Action;

// protected $_fileUploaderFactory;

// public function __construct(
//     \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
//     Action\Context $context
     
// ) {

//     $this->_fileUploaderFactory = $fileUploaderFactory;
//     parent::__construct($context);
// }

// public function execute(){

//     $uploader = $this->_fileUploaderFactory->create(['fileId' => 'image']);
     
//     $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
     
//     $uploader->setAllowRenameFiles(false);
     
//     $uploader->setFilesDispersion(false);

//     $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
     
//     ->getAbsolutePath('images/');
     
//     $uploader->save($path);

// }

?>



<?php
// namespace YourNamespace\YourModule\Controller;

// use Magento\Framework\App\Action\Context;
// use Magento\Framework\Message\ManagerInterface;
// use Magento\Framework\Filesystem;
// use Magento\MediaStorage\Model\File\UploaderFactory;
 
// class YourController extends \Magento\Framework\App\Action\Action
// {
//     /**
//      * @var \Magento\Framework\Message\ManagerInterface
//      */
//     protected $messageManager;

//     /**
//      * @var \Magento\Framework\Filesystem $filesystem
//      */
//     protected $filesystem;

//     /**
//      * @var \Magento\MediaStorage\Model\File\UploaderFactory $fileUploader
//      */
//     protected $fileUploader;

//     public function __construct(
//         Context $context,
//         ManagerInterface $messageManager,
//         // ... 
//         Filesystem $filesystem,
//         UploaderFactory $fileUploader
//     )
//     {
//         $this->messageManager       = $messageManager;
//         // ...
//         $this->filesystem           = $filesystem;
//         $this->fileUploader         = $fileUploader;

//         $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    
//         parent::__construct($context);
//     }

//     public function execute()
//     {
//         // your code

//         $uploadedFile = $this->uploadFile();

//         // your code
//     }

//     public function uploadFile()
//     {
//         $yourFolderName = 'your-custom-folder/';
//         $yourInputFileName = 'my_custom_file';

//         try{
//             $file = $this->getRequest()->getFiles($yourInputFileName);
//             $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;

//             if ($file && $fileName) {
//                 $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);        
//                 $uploader = $this->fileUploader->create(['fileId' => $yourInputFileName]);
//                 $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
//                 $uploader->setAllowCreateFolders(true);
//                 $uploader->setAllowRenameFiles(true);
//                 $result = $uploader->save($target);
//                 if ($result['file']) {
//                     $this->messageManager->addSuccess(__('File has been successfully uploaded.')); 
//                 }
//                 return $target . $uploader->getUploadedFileName();
//             }
//         } catch (\Exception $e) {
//             $this->messageManager->addError($e->getMessage());
//         }
//         return false;
//     }
// }
?>



<?php


 
/**
* Save action
*
* @return \Magento\Framework\Controller\ResultInterface
*/
public function execute()
{
// …............
//start block upload image
if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {
/*
* Save image upload
*/
try {
$base_media_path = 'ibnab/owlsliders/images';
$uploader = $this->uploader->create(
['fileId' => 'image']
);
$uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
$imageAdapter = $this->adapterFactory->create();
$uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
$uploader->setAllowRenameFiles(true);
$uploader->setFilesDispersion(true);
$mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
$result = $uploader->save(
$mediaDirectory->getAbsolutePath(base_media_path)
);
$data['image'] = base_media_path.$result['file'];
} catch (\Exception $e) {
if ($e->getCode() == 0) {
$this->messageManager->addError($e->getMessage());
}
}
} else {
if (isset($data['image']) && isset($data['image']['value'])) {
if (isset($data['image']['delete'])) {
$data['image'] = null;
$data['delete_image'] = true;
} elseif (isset($data['image']['value'])) {
$data['image'] = $data['image']['value'];
} else {
$data['image'] = null;
}
}
}
//end block upload image
…................
}

?>


<?php

public function execute(Observer $observer)
    {
     // $data = $observer->getRequest()->getPostValue();
      $request = $observer->getEvent()->getRequest();
       $img_name = $request->getPostValue('promo_image');

       if(!empty( $img_name ))
       {
         if(!is_array($img_name ))
         {
            $img = $img_name;  
         }
         else
         {
           $img = $img_name[0]['name']; 
         }
        // $this->imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get('Bg\SpecialPromotion\ImageUpload');
        // $this->imageUploader->moveFileFromTmp($img);
       }
       else  
       {
           $img =  NULL;
       }   
      $request->setPostValue('promo_image',$img);
    }  


    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
          $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
          $mediaPath = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
          $media = $mediaPath.'tmp/image/';   // location of file 

          $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
          $mediaRootDir = $mediaDirectory->getAbsolutePath();
          
          if ($this->_file->isExists($mediaRootDir . $fileName))  {
          
              $this->_file->deleteFile($mediaRootDir . $fileName);
          }

?>