<?php

class Mf_EmailQueue_Block_Adminhtml_Email_View_Tab_Info extends Mage_Adminhtml_Block_Widget
implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    private $senderData = array();

    /**
     * @return Mage_Core_Model_Email_Queue
     */
    public function getEmail()
    {
        return Mage::registry('email_message');
    }

    /**
     * @return Varien_Object
     */
    public function getEmailParams()
    {
        return new Varien_Object($this->getEmail()->getMessageParameters());
    }

    /**
     * Return list of to recipients addresses in the message
     * @return array
     */
    public function getToEmails()
    {
        $this->_getEmails();
        return (array_key_exists(Mage_Core_Model_Email_Queue::EMAIL_TYPE_TO,$this->senderData)?$this->senderData[Mage_Core_Model_Email_Queue::EMAIL_TYPE_TO]:array());
    }

    /**
     * Return list of cc recipients addresses in the message
     * @return array
     */
    public function getCCEmails()
    {
        $this->_getEmails();
        return (array_key_exists(Mage_Core_Model_Email_Queue::EMAIL_TYPE_CC,$this->senderData)?$this->senderData[Mage_Core_Model_Email_Queue::EMAIL_TYPE_CC]:array());
    }

    /**
     * Return list of bcc recipients addresses in the message
     * @return array
     */
    public function getBCCEmails()
    {
        $this->_getEmails();
        return (array_key_exists(Mage_Core_Model_Email_Queue::EMAIL_TYPE_BCC,$this->senderData)?$this->senderData[Mage_Core_Model_Email_Queue::EMAIL_TYPE_BCC]:array());
    }

    /**
     * Rteurn any other emails
     * @return array
     */
    public function getOtherEmails()
    {
        $this->_getEmails();
        return (array_key_exists('OTHER',$this->senderData)?$this->senderData['OTHER']:array());
    }

    /**
     * Private method to parse the messages recipients
     * @return bool
     */
    private function _getEmails()
    {
        if(!empty($this->senderData)){
            return TRUE;
        }

        $email = $this->getEmail();

        foreach($email->getRecipients() as $recipient) {
            list($email, $name, $type) = $recipient;

            switch ($type) {
                case Mage_Core_Model_Email_Queue::EMAIL_TYPE_BCC:
                case Mage_Core_Model_Email_Queue::EMAIL_TYPE_TO:
                case Mage_Core_Model_Email_Queue::EMAIL_TYPE_CC:
                    $this->senderData[$type][] = array('email'=>$email,'name'=>$name);
                    break;
                default:
                    $this->senderData['OTHER'][] = array('email'=>$email,'name'=>$name);
                    break;
            }

        }

        return TRUE;

    }

    /**
     * ######################## TAB settings #################################
     */
    public function getTabLabel()
    {
        return Mage::helper('mf_emailqueue')->__('Information');
    }

    public function getTabTitle()
    {
        return Mage::helper('mf_emailqueue')->__('Email Information');
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