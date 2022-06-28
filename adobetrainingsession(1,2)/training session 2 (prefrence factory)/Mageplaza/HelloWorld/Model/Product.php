<?php
namespace Mageplaza\HelloWorld\Model;

class Product extends \Magento\Catalog\Model\Product
{
    /**
     * Get product name
     *
     * @return string
     */
    public function getName()
    {
        $changeNamebyPreference = $this->_getData('name') . 'Custom test';
        return $changeNamebyPreference;
    }
 
}
