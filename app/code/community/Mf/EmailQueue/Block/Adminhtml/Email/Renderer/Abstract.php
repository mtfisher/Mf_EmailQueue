<?php
/**
 * Created by PhpStorm.
 * User: michael-home
 * Date: 22/03/2015
 * Time: 13:09
 */

abstract class Mf_EmailQueue_Block_Adminhtml_Email_Renderer_Abstract extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    const FIELD_NAME = '';

    /**
     * @param Varien_Object $row
     * @return String
     */
    public function render(Varien_Object $row)
    {

        $value =  $row->getData($this->getColumn()->getIndex());

        if(array_key_exists(static::FIELD_NAME, $value)) {
            return $value[static::FIELD_NAME];
        }else{
            return Mage::helper('mf_emailqueue')->__('N/A');
        }

    }
}