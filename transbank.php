<?php
require 'vendor/autoload.php';

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;

$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
    ->getNormalTransaction();

$amount = 10000;
$sessionId = 'mi_sesion';
$buyOrder = strval(rand(10000,9999999));
$returnUrl = 'http://www.comercio.cl/callback';
$finalUrl = 'http://www.comercio.cl/final';

$initResult = $transaction->initTransaction(
    $amount, $buyOrder, $sessionId, $returnUrl, $finalUrl
);

$formAction = $initResult->url;
$tokenWs = $initResult->token;
?>





<form method="post" action="<?php echo $formAction; ?>">
  <input type="hidden" name="token_ws" value="<?php echo $tokenWs; ?>">
  <input type="submit" value="Pagar con Transbank">
</form>