<?php


class Mf_EmailQueue_Block_Adminhtml_Email_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('message_id');
        $this->setId('mf_emailqueue_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * prepare the collection for grid
     */
    protected function _prepareCollection()
    {

        $collection = Mage::getModel('core/email_queue')->getCollection();
        $this->setCollection($collection);

        $collection->getSelect()->join(Mage::getConfig()->getTablePrefix().'core_email_queue_recipients',
            'main_table.message_id ='.Mage::getConfig()->getTablePrefix().'core_email_queue_recipients.message_id',
            array('recipient_email','recipient_name'));

        //for this view lets just show primary recipient
        $collection->addFieldToFilter('email_type', Mage_Core_Model_Email_Queue::EMAIL_TYPE_TO);

        parent::_prepareCollection();
    }

    /**
     * Prepare colunms for the table
     */
    protected function _prepareColumns()
    {

        $this->addColumn('message_id', array(
            'header' => $this->_getHelper()->__('ID'),
            'type' => 'number',
            'index' => 'message_id',
        ));

        $this->addColumn('created_at', array(
            'header' => $this->_getHelper()->__('Created'),
            'type' => 'datetime',
            'index' => 'created_at',
        ));

        $this->addColumn('entity_type', array(
            'header' => $this->_getHelper()->__('Entity Type'),
            'type' => 'text',
            'index' => 'entity_type',
        ));

        $this->addColumn('event_type', array(
            'header' => $this->_getHelper()->__('Event Type'),
            'type' => 'text',
            'index' => 'event_type',
        ));

        $this->addColumn('from_address', array(
            'header'=> $this->_getHelper()->__('From Address'),
            'index' => 'message_parameters',
            'renderer'  => 'Mf_EmailQueue_Block_Adminhtml_Email_Renderer_From_Address',
            'filter' => false,
        ));

        $this->addColumn('from_name', array(
            'header'=> $this->_getHelper()->__('From Name'),
            'index' => 'message_parameters',
            'renderer'  => 'Mf_EmailQueue_Block_Adminhtml_Email_Renderer_From_Name',
            'filter' => false,
        ));

        $this->addColumn('to_address', array(
            'header'=> $this->_getHelper()->__('To Address'),
            'index' => 'recipient_email',
        ));

        $this->addColumn('to_name', array(
            'header'=> $this->_getHelper()->__('To Name'),
            'index' => 'recipient_name',
        ));

    }

    /**
     * get url for the view page
     *
     * @param Varien_Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/view', array('id' => $row->getId()));
    }

    /**
     * Get helper
     *
     * @return Mf_EmailQueue_Helper_Data
     */
    private function _getHelper()
    {
        return Mage::helper('mf_emailqueue');
    }

}