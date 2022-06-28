<?php
namespace Sparsh\HelloSparsh\Block;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $_productCollectionFactory;

    protected $_imageHelper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }
    /**
     * Get product collection
     */
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
    public function getImageUrl($product)
    {
        $image_url = $this->_imageHelper->init($product, 'product_page_image_small')->setImageFile($product->getFile())->resize(200, 200)->getUrl();
        return $image_url;
    }
}
