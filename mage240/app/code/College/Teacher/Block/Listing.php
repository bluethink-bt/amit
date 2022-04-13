<?php
namespace College\Teacher\Block;
class Listing extends \Magento\Framework\View\Element\Template
{
    protected $teacherCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \College\Teacher\Model\ResourceModel\Teacher\Collection $teacherCollection
    )
    {
        $this->teacherCollection = $teacherCollection;
        parent::__construct($context);
    }


    public function loadTeacherCollection(){

          return $this->teacherCollection->getData();  
    }
}

?>

