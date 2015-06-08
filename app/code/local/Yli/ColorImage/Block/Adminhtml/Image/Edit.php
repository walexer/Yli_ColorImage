<?php

class Yli_ColorImage_Block_Adminhtml_Image_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'color';
        $this->_blockGroup = 'colorimage';
        $this->_controller = 'adminhtml_image';
    
        parent::__construct();
        $this->_removeButton('delete');
    }
    
    public function getHeaderText()
    {
        return Mage::helper('colorimage')->__("Edit Color '%s'", $this->htmlEscape(Mage::registry('field_data')->getColor())); 
    }
}