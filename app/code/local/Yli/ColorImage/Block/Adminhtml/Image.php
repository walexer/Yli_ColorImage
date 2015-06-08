<?php

class Yli_ColorImage_Block_Adminhtml_Image extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_image';
        $this->_blockGroup = 'colorimage';
        $this->_headerText = Mage::helper('colorimage')->__('Color Image Manager');
        parent::__construct();
        $this->_removeButton('add');
    }
}