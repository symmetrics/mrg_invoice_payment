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
 * @author    Eugen Gitin <eg@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
 
/**
 * Symmetrics_Invoice_Block_Info_Invoice
 *
 * @category  Symmetrics
 * @package   Symmetrics_Invoice
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eugen Gitin <eg@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_Invoice_Block_Info_Invoice extends Mage_Payment_Block_Info
{
    /**
     * Bank name
     *
     * @var string
     */
    protected $_bankName;

    /**
     * Bank State Branch number
     *
     * @var string
     */
    protected $_bsb;

    /**
     * Bank account number
     *
     * @var string
     */
    protected $_accountNumber;

    /**
     * Bank account name
     *
     * @var string
     */
    protected $_accountName;

    /**
     * Set invoice template
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('symmetrics/invoice/info/invoice.phtml');
    }

    /**
     * Get bank name var value
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
     * Get bank BSB var value
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
     * Get bank account number var value
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

    /**
     * Get bank account name var value
     *
     * @return string
     */
    public function getAccountName()
    {
        if (is_null($this->_accountName)) {
            $this->_convertAdditionalData();
        }
        return $this->_accountName;
    }

    /**
     * Convertor for additional payment data
     *
     * @return Symmetrics_Invoice_Block_Info_Invoice
     */
    protected function _convertAdditionalData()
    {
        $details = @unserialize($this->getInfo()->getAdditionalData());
        if (is_array($details)) {
            $this->_bankName = isset($details['bankname']) ? (string)$details['bankname'] : '';
            $this->_bsb = isset($details['bsb']) ? (string)$details['bsb'] : '';
            $this->_accountNumber = isset($details['accountnumber']) ? (string)$details['accountnumber'] : '';
            $this->_accountName = isset($details['accountname']) ? (string)$details['accountname'] : '';
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
       return $this->toHtml();
    }
}