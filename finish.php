<?php
include("checkout.php");

$message .= "<pre>" . print_r($_POST, TRUE) . "</pre>";
    if (!isset($_POST["token_ws"]))

    /** Token de la transacción */
    $token = filter_input(INPUT_POST, 'token_ws');

    $request = array(
      "token" => filter_input(INPUT_POST, 'token_ws')
    );

    $data = '';
    $method = 'PUT';
    $type = 'sandbox';
    $endpoint = '/rswebpaytransaction/api/webpay/v1.0/transactions/' . $token;

    $response = get_ws($data, $method, $type, $endpoint);

    $message .= "<pre>";
    $message .= print_r($response, TRUE);
    $message .= "</pre>";

    $url_tbk = $url3 . "?action=getStatus";
    $submit = 'Ver Status!';

echo 'Transaccion fallida. <a href="../">Volver al home</a>';