<?php
namespace Sparsh\HelloSparsh\Controller\Index;

class Index extends \Magento\Framework\App\Action
{
    protected $_pageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute(): \Magento\Framework\View\Result\Page
    {
        return $this->_pageFactory->create();
    }
}
