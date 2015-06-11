<?php


class Yli_ColorImage_Block_Catalog_Attribute_Renderer_Image
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $image = $row->getImage();
        if($image){
        $path = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
        $image = '<img src="'.$path.$image.'"/>';
        }
        return $image;
    }
}
