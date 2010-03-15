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
 * Symmetrics_Invoice_Helper_Data
 *
 * @category  Symmetrics
 * @package   Symmetrics_Invoice
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eugen Gitin egb@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_Invoice_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * XML path for payment method
     *
     * @var string
     */
    const XML_PATH_PAYMENT_METHODS = 'payment';

    /**
     * Get payment method instance
     *
     * @param string $code payment code
     *
     * @return object
     */
    public function getMethodInstance($code)
    {
        $key = self::XML_PATH_PAYMENT_METHODS.'/'.$code.'/model';
        $class = Mage::getStoreConfig($key);
        if (!$class) {
            Mage::throwException($this->__('Can not load configuration for payment method with code: %s', $code));
        }
        return Mage::getModel($class);
    }

    /**
     * Get bank name
     *
     * @return string
     */
    public function getBankname()
    {
		return $this->getMethodInstance('vorkasse')->getBankname();
	}

    /**
     * Get bank account name
     *
     * @return string
     */
    public function getAccountname()
    {
		return $this->getMethodInstance('vorkasse')->getAccountname();
	}

    /**
     * Get bank BSB
     *
     * @return string
     */
    public function getBsb()
    {
		return $this->getMethodInstance('vorkasse')->getBsb();
	}

    /**
     * Get bank account number
     *
     * @return string
     */
    public function getAccountnumber()
    {
		return $this->getMethodInstance('vorkasse')->getAccountnumber();
	}
}
