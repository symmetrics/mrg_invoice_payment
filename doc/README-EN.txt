* DOCUMENTATION

** INSTALLATION
Extract the content of this archive to your Magento directory. 
Clearing/refresh of the Magento cash might be necessary.

** USAGE
This module adds the "Symmetrics invoice" payment option,
which enables payment to  invoice. The new payment option takes the customer
groups into consideration. The list of the customer groups can be set in backend.
Also one can set such parameters as 'Minimum Order Total', 'Maximum Order Total',
and 'New Order Status'.

** FUNCTIONALITY
*** A: The new payment option "Symmetrics invoice" is added in the system.
*** B: The new payment option is allowed only for certain user groups.
       The list of the user groups for "Symmetrics invoice"
       can be configured in backend.
*** C: "Maximum Order Total" and "Minimum Order Total" settings
       can be configured in backend.
*** D: For each new order there is a possibility to configure 
        order status in backend.
*** E: Altogether, the following options are configurable 
       in backend under "System" -> "Configuration" -> "Sales" 
       -> "Payment methods" -> "Symmetrics invoice"
        1. 'Activated'
        2. 'Title'
        3. 'New order status' (see item D)
        4. 'Payment methods for certain customer groups' (see item B)
        5. 'Minimum Order Total' (see item C)
        6. 'Maximum Order Total' (see item C)

** TECHNICAL
A new payment method is added through config.xml and system.xml.
This method uses <model>invoice/method_invoice</model>.
At the same time, the responsible class Symmetrics_Invoice_Model_Method_Invoice 
implements Mage_Payment_Model_Method_Abstract.
No migration file is necessary.

** PROBLEMS
For the time being, no problems are known.

* TESTCASES

** BASIC
*** A: 1. Go to configuration under "System" -> "Configuration" -> "Sales" -> 
          "Payment methods" -> "Symmetrics invoice" and check if
           "Symmetrics 	invoice" appears there as well.
       2. (1) Set "Activated" on "yes", enter a title (if not 
           yet available), the 	order status to which the order 
           should switch after the payment method had been selected, and 
           select the customer groups for whom this payment method  
           in the order process.
          (2) Go to frontend and buy a product. Check if one can select 
           this payment method in the order process. 
          (3) When the purchase is complete, go to backend under 
           "Sales => Orders",  select your order and check if the order 
          status corresponds to the one you set in the  
          configuration in item A: 2.
*** B: 1. (1) Create a new customer group "Test" and user "test@example.com"
           for this group.
          (2) Go to frontend and buy a product as "test@example.com" customer.
           Check if one can NOT select the "Symmetrics invoice" payment option in
           the order process.
       2. (1) Go to the configuration under "System" ->
           "Configuration" -> "Sales" 	-> "Payment methods" -> "Symmetrics invoice"
          add the new customer group in the group list of 
           "Symmetrics invoice"  payment method.
          (2) Repeat item B.1(2), but this time check if purchase is  
           successful 	with "Symmetrics invoice" payment method.
*** C: 1. (1) Go to configuration under "System" -> 
          "Configuration" -> "Sales" -> "Payment methods" -> "Symmetrics invoice"
           and set Minimum and Maximum 	Order Total.
           (2) Change the values and check that the "Symmetrics invoice" appears 
           only then in "Checkout" if "Minimum" < "Order Total " < Maximum or
            "Minimum" < "Order Total" (if maximum is not set) or,
            on the other hand, 	"Maximum" > "Order Total". 
*** D: 1. (1) Go the the configuration under "System" -> "Configuration"-> 
           "Sales" -> "Payment methods" -> "Symmetrics invoice" and
          change the 'New order status' field.
          (2) Order a product and check if the order status is correct.
*** E: 1. For each option you must check if one can change and save them.
