<?php 

class Yli_ColorImage_Block_Adminhtml_Image_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('colorimageGrid');
        $this->setDefaultSort('color');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
    
     protected function _prepareCollection()
    {
        $collection = Mage::getModel('eav/entity_attribute_option')->getCollection()
                      ->addFieldToFilter('attribute_id',92);
        $collection->getSelect()->joinLeft(array('colors' => $collection->getTable('colorimage/image')),"main_table.option_id = colors.color");
        $this->setCollection($collection);
        return parent::_prepareCollection();
    } 
    
    protected function _prepareColumns()
    {
         $this->addColumn('option_id', array(
            'header' => Mage::helper('colorimage')->__('Color'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'option_id',
            'renderer'  =>  'colorimage/catalog_attribute_renderer_color'
        ));
        
        $this->addColumn('image', array(
            'header' => Mage::helper('colorimage')->__('Image Path'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'image',
            'renderer'  =>  'colorimage/catalog_attribute_renderer_image'
        )); 
        return parent::_prepareColumns();
    }
    
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('color' => $row->getOptionId()));
    }
    
    
}