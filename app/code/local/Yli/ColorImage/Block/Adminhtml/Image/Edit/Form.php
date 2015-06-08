<?php

class Yli_ColorImage_Block_Adminhtml_Image_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('field_data');
    
        $form = new Varien_Data_Form(
            array(
                 'id'     => 'edit_form',
                 'action' => $this->getUrl('*/*/save'),
                 'method' => 'post',
                 'enctype'   => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
    
        $fieldset = $form->addFieldset('field_form', array('legend'=>Mage::helper('colorimage')->__('Color information')));
           
        $fieldset->addField(
            'color', 'select',
            array(
                'name'   => 'color',
                'label'  => Mage::helper('colorimage')->__('Color'),
                'values' => Mage::helper('colorimage')->getAllColors()
            )
        );

        $fieldset->addField('image','image',array(
            'label'     => Mage::helper('colorimage')->__('Image'),
            'required'  => true,
            'name'      => 'image',
        ));

    

    
        $form->setValues($model->getData());
        $this->setForm($form);
    
        return parent::_prepareForm();
    }
}