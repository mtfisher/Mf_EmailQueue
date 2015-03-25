<?php


class Mf_EmailQueue_Adminhtml_EmailController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function viewAction()
    {
        $id = intval($this->getRequest()->getParam('id'));
        $message = Mage::getModel('core/email_queue')->load($id);

        Mage::register('email_message', $message);
        $this->loadLayout()->renderLayout();
    }

    public function iframeAction()
    {
        $id = $this->getRequest()->getParam('id');
        $message = Mage::getModel('core/email_queue')->load($id);

        echo $message->getMessageBody();
        exit;

    }

}