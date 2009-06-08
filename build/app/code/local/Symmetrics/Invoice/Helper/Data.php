<?php
/**
 * Symmetrics_Invoice_Helper_Data
 *
 * @category Symmetrics
 * @package Symmetrics_Invoice
 * @author symmetrics gmbh <info@symmetrics.de>, Eugen Gitin <eg@symmetrics.de>
 * @copyright symmetrics gmbh
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Symmetrics_Invoice_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_PAYMENT_METHODS = 'payment';

    public function getMethodInstance($code)
    {
        $key = self::XML_PATH_PAYMENT_METHODS.'/'.$code.'/model';
        $class = Mage::getStoreConfig($key);
        if (!$class) {
            Mage::throwException($this->__('Can not configuration for payment method with code: %s', $code));
        }
        return Mage::getModel($class);
    }

    public function getBankname()
    {
		return $this->getMethodInstance('vorkasse')->getBankname();
	}

    public function getAccountname()
    {
		return $this->getMethodInstance('vorkasse')->getAccountname();
	}

    public function getBsb()
    {
		return $this->getMethodInstance('vorkasse')->getBsb();
	}

    public function getAccountnumber()
    {
		return $this->getMethodInstance('vorkasse')->getAccountnumber();
	}
}
