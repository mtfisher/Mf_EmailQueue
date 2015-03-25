<?php

class Mf_EmailQueue_Block_Adminhtml_Email_View_Form extends Mage_Adminhtml_Block_Template
{

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('mf/emailqueue/form.phtml');
    }

}