<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Symmetrics
 * @package   Symmetrics_Invoice
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eugen Gitin egb@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
 
/**
 * Symmetrics_Invoice_Model_Method_Invoice
 *
 * @category  Symmetrics
 * @package   Symmetrics_Invoice
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eugen Gitin egb@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_Invoice_Model_Method_Invoice extends Mage_Payment_Model_Method_Abstract
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code  = 'invoice';

    /**
     * Block type for payment form
     *
     * @var string
     */
    protected $_formBlockType = 'symmetrics_invoice_block_form_invoice';

    /**
     * Block type for payment info
     *
     * @var string
     */
    protected $_infoBlockType = 'symmetrics_invoice_block_info_invoice';

    /**
     * Get payment method code var value
     *
     * @var string
     */
	public function getCode()
	{
		return $this->_code;
	}

    /**
     * Get bank name var value
     *
     * @var string
     */
    public function getBankname()
    {
        return $this->getConfigData('bankname');
    }

    /**
     * Get bank BSB var value
     *
     * @var string
     */
    public function getBsb()
    {
        return $this->getConfigData('bsb_number');
    }

    /**
     * Get bank account number var value
     *
     * @var string
     */
    public function getAccountnumber()
    {
        return $this->getConfigData('account_number');
    }
 
    /**
     * Get bank account name var value
     *
     * @var string
     */
    public function getAccountname()
    {
        return $this->getConfigData('account_name');
    }

    /**
     * Validate payment method information object
     *
     * @return Symmetrics_Invoice_Model_Method_Invoice
     */
    public function validate()
    {
         return $this;
    }

    /**
     * To check billing country is allowed for the payment method
     *
     * @param string $country country code
     *
     * @return bool
     */
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
    	// run the license check here
        return true;
    }

    /**
     * Assign data to info model instance
     *
     * @param mixed $data
     *
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
}