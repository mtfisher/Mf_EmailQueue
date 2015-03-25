<?php

class Mf_EmailQueue_Block_Adminhtml_Email_View_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('email_queue_view_tabs');
        $this->setDestElementId('email_queue_view');
        $this->setTitle(Mage::helper('mf_emailqueue')->__('Email'));
    }

}