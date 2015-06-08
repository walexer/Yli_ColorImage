<?php




class Yli_ColorImage_Adminhtml_ImageController extends Mage_Adminhtml_Controller_Action
{
      public function indexAction()
      {
          $this->loadLayout();
      		$this->_setActiveMenu('catalog/attributes');
          $this->_title('Manage Color Image');
          $this->_addContent($this->getLayout()->createBlock('colorimage/adminhtml_image'));
          $this->renderLayout();
      }
      
     	public function editAction()
    	{
        	$this->_title($this->__('Color Image'));
            
            $id = $this->getRequest()->getParam('color');
            $colorimageModel = Mage::getModel('colorimage/image')->load($id);
            
            if(!$colorimageModel->getColor()){
                
                $colorimageModel->setData('color',$id);
            }
            
            if ($id != 0) {
                $this->_title($id);
                
                Mage::register('field_data', $colorimageModel);
                
                $this->loadLayout();
                $this->_setActiveMenu('catalog/attributes');
                
                $this->_addContent($this->getLayout()->createBlock('colorimage/adminhtml_image_edit'));
                
                $this->renderLayout();
            }else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('colorimage')->__('The field does not exist.'));
                $this->_redirect('*/*/');
            }
    	}
      
      public function saveAction()
      {

        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('image');
					// Any extention would work
	                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					$uploader->setFilesDispersion(false);
					// We set media as the upload dir
					$path = Mage::getBaseDir('media') . DS . ('color') . DS;
					$uploader->save($path, $_FILES['image']['name'] );
					
				} catch (Exception $e) {
    	            $this->_getSession()->addException($e, Mage::helper('profile')->__('Error uploading image. Please try again later.'));
		    }
		$color = $this->getRequest()->getParam('color');
		$model = Mage::getModel('colorimage/image')->load($color);
		if (!$model->getColor()){
		    $model->setData('color',$color);
		}
		$model->setData('image','color/'.$_FILES['image']['name']);

		try {
		    $model->save();
		
		    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('colorimage')->__('The Image has been saved.'));
		
		    Mage::getSingleton('adminhtml/session')->setFormData(false);
		
		    if ($this->getRequest()->getParam('back')) {
		        $this->_redirect('*/*/edit', array('color' => $model->getColor(), '_current'=>true));
		        return;
		    }
		
		    $this->_redirect('*/*/');
		    return;
		} catch (Exception $e) {
		    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		    $this->_redirect('*/*/edit', array('color' => $this->getRequest()->getParam('color')));
		    return;
		}
        }
        $this->_redirect('*/*/');

      }

}