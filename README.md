The comprehensive Yemeni payment platform


install package composer require msmoney_sdk/php-sdk

create file example.php and add code:
<?php

require 'vendor/autoload.php';

//if you want to change the namespace/path from 'Msmoney' - lines[1-5] - to your desired name,i.e. (use Msmoney\Api\Amount; to use MyDomain\Api\Amount;), then you must change the folders name that holds the API classes as well as change the property 'Msmoney' in (autoload->psr-0) of (php-sdk/composer.json) file to your desired name and run "composer dump-autoload" command from sdk root

use MsmoneySdk\PhpSdk\Msmoney\Api\Amount;
use MsmoneySdk\PhpSdk\Msmoney\Api\Payer;
use MsmoneySdk\PhpSdk\Msmoney\Api\Payment;
use MsmoneySdk\PhpSdk\Msmoney\Api\RedirectUrls;
use MsmoneySdk\PhpSdk\Msmoney\Api\Transaction;

//Payer Object
$payer = new Payer();
$payer->setPaymentMethod('PayMoney'); //preferably, your system name, example - Msmoney

//Amount Object
$amountIns = new Amount();
$amountIns->setTotal(4.99)->setCurrency('USD'); //must give a valid currency code and must exist in merchant wallet list

//Transaction Object
$trans = new Transaction();
$trans->setAmount($amountIns);

//RedirectUrls Object
$urls = new RedirectUrls();
$urls->setSuccessUrl('http://your-merchant-domain.com/example-success.php') //success url - the merchant domain page, to redirect after successful payment, see sample example-success.php file in sdk root, example - http://mscloud.net/Msmoney_sdk/example-success.php

->setCancelUrl('http://your-merchant-domain.com/'); //cancel url - the merchant domain page, to redirect after cancellation of payment, example -  http://Msmoney.net/Msmoney_sdk/


//Payment Object
$payment = new Payment();
$payment->setCredentials([ //Client ID & Secret = Merchants->setting(gear icon)
    'client_id'     => 'place your client id here', //must provide correct client id of an express merchant
    'client_secret' => 'place your client secret here', //must provide correct client secret of an express merchant
])
->setRedirectUrls($urls)
->setPayer($payer)
->setTransaction($trans);

try {
    $payment->create(); //create payment
    header("Location: " . $payment->getApprovedUrl()); //checkout url
}
catch (\Exception $ex)
{
    print $ex;
    exit;
}



and create file example-success.php and add code:

<?php

 /*
This is the sample success page.


 */

if ($_GET)
{
    $encoded = json_encode($_GET);
    // var_dump($encoded);
    // echo '<br/><br/>';

    $decoded = json_decode(base64_decode($encoded), TRUE);
    // var_dump($decoded);
    // echo '<br/><br/>';

    if ($decoded["status"] == 200)
    {
        // do anything here, i.e. display to merchant domain pages or insert data into merchant domain's  database
        echo "Status => " . $decoded["status"] . "<br/>";
        echo "Transaction ID => " . $decoded["transaction_id"] . "<br/>";
        echo "Merchant => " . $decoded["merchant"] . "<br/>";
        // echo "Currency => " . $decoded["currency"] . "<br/>";
        // echo "Amount => " . $decoded["amount"] . "<br/>";
        // echo "Fee => " . $decoded["fee"] . "<br/>";
        // echo "Total => " . $decoded["total"] . "<br/>";
    }
}

?>