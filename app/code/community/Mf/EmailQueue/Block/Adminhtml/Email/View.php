<?php

class Mf_EmailQueue_Block_Adminhtml_Email_View extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        $this->_objectId = 'message_id';
        $this->_blockGroup = 'mf_emailqueue';
        $this->_controller = 'adminhtml_email';
        $this->_mode = 'view';

        parent::__construct();

        $this->_removeButton('delete');
        $this->_removeButton('reset');
        $this->_removeButton('save');
        $this->setId('email_queue_view');

    }

    public function getHeaderText()
    {
        return Mage::helper('mf_emailqueue')->__('Email');
    }

    public function getEmail()
    {
        return Mage::registry('email_message');
    }
}