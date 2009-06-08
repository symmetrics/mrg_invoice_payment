<?php
/**
 * Symmetrics_Invoice_Block_Form_Invoice
 *
 * @category Symmetrics
 * @package Symmetrics_Invoice
 * @author symmetrics gmbh <info@symmetrics.de>, Eugen Gitin <eg@symmetrics.de>
 * @copyright symmetrics gmbh
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Symmetrics_Invoice_Block_Form_Invoice extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('symmetrics/invoice/form/invoice.phtml');
    }
}
