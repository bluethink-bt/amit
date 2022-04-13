<?php
namespace Company\Employee\Block;
class Show extends \Magento\Framework\View\Element\Template
{
    protected $employeeCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Company\Employee\Model\ResourceModel\Employee1\Collection $employeeCollection
    )
    {
        $this->employeeCollection = $employeeCollection;
        parent::__construct($context);
    }


    public function loadEmployeeCollection()
    {
          return $this->employeeCollection->getData();  
    }
}

?>