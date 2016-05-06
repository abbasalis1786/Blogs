<?php
namespace DCKAP\Testmodule\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class QuestionActions extends Column
{
    /** Url path */
    const QUESTION_URL_PATH_DELETE = 'testadmin/question/delete';
    
    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $_deleteUrl;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $deleteUrl = self::QUESTION_URL_PATH_DELETE
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->_deleteUrl = $deleteUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {                 
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::QUESTION_URL_PATH_DELETE, ['id' => $item['id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete this record'),
                            'message' => __('Are you sure you wan\'t to delete this record?')
                        ]
                    ];                    
                }
            }
        }
        return $dataSource;
    }
}