<?php
/**
 * Created by PhpStorm.
 * User: michael-home
 * Date: 21/03/2015
 * Time: 12:34
 */

class Mf_EmailQueue_Block_Adminhtml_Email extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'mf_emailqueue';
        $this->_controller = 'adminhtml_email';
        $this->_headerText = $this->__('Email Queue');

        parent::__construct();

        $this->_removeButton('add');

    }

}