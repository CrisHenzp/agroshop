<?php
require_once 'vendor/autoload.php';



MercadoPago\SDK::setClientId("TEST-95a96239-de94-4468-a467-704eb441414c");
MercadoPago\SDK::setClientSecret("TEST-8687406887999766-110322-135f5560056400f0aa2bcbc132023f75-239464583");

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();