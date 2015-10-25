<?php 


require_once __DIR__ . '/../vendor/autoload.php'; 
use Kishanio\CCAvenue\Payment as CCAvenueClient;

// Get Response
$response=$_POST["encResponse"];	

$ccavenue = new CCAvenueClient( 'M_smi44769_44769', '9vixgnzn5772ev1b13bz52chdxeq0bk3' );

// Check if the transaction was successfull.
echo $ccavenue->response( $response );
