<?php
 
namespace Programs\Program\Model\Api;

use Magento\Catalog\Model\ProductFactory;
 
use Psr\Log\LoggerInterface;
 
class Custom
{
    protected $logger;
     
    
    public function __construct(
        LoggerInterface $logger
        
    )
    {
 
        $this->logger = $logger;
    }
 
    /**
     * @inheritdoc
     */
 
    public function getPost($value)
    {
        $response = ['success' => false];
 
        try {
            // Your Code here

            echo("Hello Magento Developers");
                              
            // $appState = $objectManager->get('Magento\Framework\App\State');
           
            // $product = $objectManager->create('Magento\Catalog\Model\Product');
            // $sku = 'your_sku';  // set your sku
            // $product->setSku($sku);
            // $product->setName('Simple Product Name'); // set your Product Name of Product
            // $product->setAttributeSetId(4); // set attribute id
            // $product->setStatus(1); // status enabled/disabled 1/0
            // $product->setWeight(1); // set weight of product
            // $product->setVisibility(4); // visibility of product (Not Visible Individually (1) / Catalog (2)/ Search (3)/ Catalog, Search(4))
            // $product->setWebsiteIds(array(1));
            // $product->setTaxClassId(0); // Tax class ID
            // $product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
            // $product->setPrice(100); // set price of product
            // $product->setStockData(
            //       array(
            //       'use_config_manage_stock' => 0,
            //       'manage_stock' => 1,
            //       'is_in_stock' => 1,
            //       'qty' => 100
            //       )
            //     );
             
            // $product->save();


            // $productId = $product->getId();
            // if($productId)
            // {
            //     echo("Product Created Successfully");
            // }
            // else{
            //     echo("Product not Created");
            // }
            // // $categoryIds = array('2','3'); // assign your product to category using Category Id
            // // $category = $objectManager->get('Magento\Catalog\Api\CategoryLinkManagementInterface');
            // // $category->assignProductToCategories($sku, $categoryIds);
            // // echo "$sku  ";
             
            
            
            $response = ['success' => true, 'message' => $value];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
}