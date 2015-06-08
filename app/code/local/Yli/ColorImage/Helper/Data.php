<?php
class Yli_ColorImage_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getAllColors()
    {
        $attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'color');
        $options = $attribute->getSource()->getAllOptions(false);
        return $options;
    }
}