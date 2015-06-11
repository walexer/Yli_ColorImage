<?php


class Yli_ColorImage_Block_Catalog_Attribute_Renderer_Color
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $option_id = $row->getOptionId();
        $attr = Mage::getSingleton("eav/config")->getAttribute("catalog_product", 'color');
        $value = $attr->getSource()->getOptionText($option_id);
        return $value;
    }
}
