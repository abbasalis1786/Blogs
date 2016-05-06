<?php 
namespace DCKAP\Testmodule\Model;

use Magento\Framework\DataObject\IdentityInterface;

class Question extends \Magento\Framework\Model\AbstractModel implements IdentityInterface
{    
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'Testmodule_cache_id';

    /**
     * @var string
     */
    protected $_cacheTag = 'Testmodule_cache_id';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'Testmodule_event';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('DCKAP\Testmodule\Model\ResourceModel\Question');
    }

    
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }  
}