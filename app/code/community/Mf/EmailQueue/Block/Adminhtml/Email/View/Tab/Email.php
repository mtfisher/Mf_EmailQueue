<?php

class Mf_EmailQueue_Block_Adminhtml_Email_View_Tab_Email extends Mage_Adminhtml_Block_Widget
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    /**
     * @return string
     */
    public function getIframeUrl()
    {
        return $this->getUrl('*/*/iframe', array('id' => $this->getEmail()->getId()));
    }

    /**
     * @return Mage_Core_Model_Email_Queue
     */
    public function getEmail()
    {
        return Mage::registry('email_message');
    }

    /**
     * ######################## TAB settings #################################
     */
    public function getTabLabel()
    {
        return Mage::helper('mf_emailqueue')->__('Email');
    }

    public function getTabTitle()
    {
        return Mage::helper('mf_emailqueue')->__('Email Content');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

}