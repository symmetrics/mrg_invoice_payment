<?php
/**
 * Symmetrics_Invoice_Block_Info_Invoice
 *
 * @category Symmetrics
 * @package Symmetrics_Invoice
 * @author symmetrics gmbh <info@symmetrics.de>, Eugen Gitin <eg@symmetrics.de>
 * @copyright symmetrics gmbh
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Symmetrics_Invoice_Block_Info_Invoice extends Mage_Payment_Block_Info
{
    protected $_bankName;
    protected $_bsb;
    protected $_accountNumber;
    protected $_accountName;

    protected function _construct()
    {
        parent::_construct();
		$this->setTemplate('symmetrics/invoice/info/invoice.phtml');
    }

    /**
     * Enter description here...
     *
     * @return string
     */
    public function getBankName()
    {
        if (is_null($this->_bankName)) {
            $this->_convertAdditionalData();
        }
        return $this->_bankName;
    }

    /**
     * Enter description here...
     *
     * @return string
     */
    public function getBsb()
    {
        if (is_null($this->_bsb)) {
            $this->_convertAdditionalData();
        }
        return $this->_bsb;
    }

    /**
     * Enter description here...
     *
     * @return string
     */
    public function getAccountNumber()
    {
        if (is_null($this->_accountNumber)) {
            $this->_convertAdditionalData();
        }
        return $this->_accountNumber;
    }

    public function getAccountName()
    {
        if (is_null($this->_accountName)) {
            $this->_convertAdditionalData();
        }
        return $this->_accountName;
    }

    /**
     * Enter description here...
     *
     * @return Symmetrics_Invoice_Block_Info_Invoice
     */
    protected function _convertAdditionalData()
    {
        $details = @unserialize($this->getInfo()->getAdditionalData());
        if (is_array($details)) {
            $this->_bankName = isset($details['bankname']) ? (string) $details['bankname'] : '';
            $this->_bsb = isset($details['bsb']) ? (string) $details['bsb'] : '';
            $this->_accountNumber = isset($details['accountnumber']) ? (string) $details['accountnumber'] : '';
            $this->_accountName = isset($details['accountname']) ? (string) $details['accountname'] : '';
        } else {
            $this->_bankName = '';
            $this->_bsb = '';
            $this->_accountNumber = '';
            $this->_accountName = '';
        }

        return $this;
    }

    public function toPdf()
    {
        // $this->setTemplate('tweakmag/payment/info/directdeposit/pdf/australia.phtml');
        return $this->toHtml();
    }
}