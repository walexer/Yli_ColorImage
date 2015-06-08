<?php

class Yli_ColorImage_Model_Resource_Image extends Mage_Core_Model_Resource_Db_Abstract
{
   	    protected function _construct() 
  	    { 
  	        $this->_isPkAutoIncrement = false;
  	        $this->_init('colorimage/image', 'color'); 
  	    } 
        

}