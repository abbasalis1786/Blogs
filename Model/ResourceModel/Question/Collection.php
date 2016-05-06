<?php 
namespace DCKAP\Testmodule\Model\ResourceModel\Question;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    
	protected $_idFieldName = 'id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()     {
        $this->_init('DCKAP\Testmodule\Model\Question', 'DCKAP\Testmodule\Model\ResourceModel\Question');
    }
}