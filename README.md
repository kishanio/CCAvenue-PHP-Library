
#CCAvenue Payment Gateway PHP Library

## Installation

```
composer require kishanio/ccavenue
```

## Documentation / Example

Request Payment

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Kishnio\CCAvenue\Payment as CCAvenueClient;

	$ccavenue = new CCAvenueClient( '<merchant_id>', '<working_key>', '<redirect_url>' );

	// set details 
	$ccavenue->setAmount( '<Amount>' );
	$ccavenue->setOrderId( '<order_id>' );
	$ccavenue->setBillingName( '<billing_cust_name>' );
	$ccavenue->setBillingAddress( '<billing_cust_address>' );
	$ccavenue->setBillingCity( '<billing_cust_city>' );
	$ccavenue->setBillingZip( '<billing_cust_zip>' );
	$ccavenue->setBillingState( '<billing_cust_state>' );
	$ccavenue->setBillingCountry( '<billing_cust_country>' );
	$ccavenue->setBillingEmail( '<billing_cust_email>' );
	$ccavenue->setBillingTel( '<billing_cust_tel>' );
	$ccavenue->setBillingNotes( '<billing_cust_notes>' );

	// copy all the billing details to chipping details
	$ccavenue->billingSameAsShipping();

	// get encrpyted data to be passed
	$data = $ccavenue->getEncryptedData();

	// merchant id to be passed along the param
	$merchant = $ccavenue->getMerchantId();
	

HTML Redirect

	<!-- Request -->
	<form method="post" name="redirect" action="http://www.ccavenue.com/shopzone/cc_details.jsp"> 
		<?php
			echo '<input type=hidden name=encRequest value="'.$data.'"">';
			echo '<input type=hidden name=Merchant_Id value="'.$merchant.'">';
		?>
	</form>

	<script language='javascript'>document.redirect.submit();</script>
	</body>
	</html>


Payment Response

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Kishnio\CCAvenue\Payment as CCAvenueClient;

	// Get Response
	$response=$_POST["encResponse"];	

	$ccavenue = new CCAvenueClient( 'M_smi44769_44769', '9vixgnzn5772ev1b13bz52chdxeq0bk3' );

	// Check if the transaction was successfull.
	echo $ccavenue->response( $response );

