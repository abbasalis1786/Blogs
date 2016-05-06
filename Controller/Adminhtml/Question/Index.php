<?php
namespace DCKAP\Testmodule\Controller\Adminhtml\Question;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $_scopeConfig;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct( Context $context, 
                                PageFactory $resultPageFactory,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DCKAP_Testmodule::questions_list');
        return $resultPage;       
    }

    /**
     * Is the user allowed to view the question list grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DCKAP_Testmodule::questions_list');
    }
}