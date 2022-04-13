<?php
namespace Programs\Program\Block;
class View extends \Magento\Framework\View\Element\Template
{
    protected $employeeCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Programs\Program\Model\ResourceModel\Employee\Collection $employeeCollection
    )
    {
        $this->employeeCollection = $employeeCollection;
        parent::__construct($context);
    }


    public function loadEmployeeCollection(){

          return $this->employeeCollection->getData();  
    }
}

?>