<?php
namespace Programs\Program\Controller\SampleController;

class Samp extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// echo("Hello Sample Controller");
        // exit;
		return $this->_pageFactory->create();
	}
}
