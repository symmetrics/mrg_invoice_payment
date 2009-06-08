<?php
/**
 * Symmetrics_Invoice_Model_Method_Invoice
 *
 * @category Symmetrics
 * @package Symmetrics_Invoice
 * @author symmetrics gmbh <info@symmetrics.de>, Eugen Gitin <eg@symmetrics.de>
 * @copyright symmetrics gmbh
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Symmetrics_Invoice_Model_Method_Invoice extends Mage_Payment_Model_Method_Abstract
{
    protected $_code  = 'invoice';
    protected $_formBlockType = 'symmetrics_invoice_block_form_invoice';
    protected $_infoBlockType = 'symmetrics_invoice_block_info_invoice';

	public function getCode()
	{
		return $this->_code;
	}

    public function validate()
    {
         return $this;
    }

    public function canUseForCountry($country)
    {
    	$groupId = Mage::getSingleton('customer/session')->getCustomer()->getGroupId();
    	$allowedGroup = $this->getConfigData('specificgroup');

        if (!strstr($allowedGroup, ','.$groupId)
            and !strstr($allowedGroup, $groupId.',')
            and !strstr($allowedGroup, ','.$groupId.',')
            and ($allowedGroup!=$groupId) ) {
			return false;
        }

        return true;
    }

    /**
     * Return true if the method can be used at this time
     *
     * @return bool
     */
    public function isAvailable($quote=null)
    {
    	//run the license check here
        return true;
    }

    /**
     * Assign data to info model instance
     *
     * @param mixed $data
     * @return Symmetrics_Invoice_Model_Method_Invoice
     */
    public function assignData($data)
    {
        $details = array();
        if ($this->getBankname()) {
            $details['bankname'] = $this->getBankname();
        }
        if ($this->getBsb()) {
            $details['bsb'] = $this->getBsb();
        }
        if ($this->getAccountnumber()) {
            $details['accountnumber'] = $this->getAccountnumber();
        }
        if ($this->getAccountname()) {
            $details['accountname'] = $this->getAccountname();
        }
        if (!empty($details)) {
            $this->getInfoInstance()->setAdditionalData(serialize($details));
        }
        return $this;
    }

    public function getBankname()
    {
        return $this->getConfigData('bankname');
    }

    public function getBsb()
    {
        return $this->getConfigData('bsb_number');
    }

    public function getAccountnumber()
    {
        return $this->getConfigData('account_number');
    }
 
    public function getAccountname()
    {
        return $this->getConfigData('account_name');
    }
}