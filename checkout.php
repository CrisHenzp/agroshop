<?php include("carrito.php");
session_start();  

switch ($action) {

  case "getResult":

    $message .= "<pre>" . print_r($_POST, TRUE) . "</pre>";
    if (!isset($_POST["token_ws"]))
      break;

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

    break;

  case "getStatus":

    if (!isset($_POST["token_ws"]))
      break;

    /** Token de la transacción */
    $token = filter_input(INPUT_POST, 'token_ws');

    $request = array(
      "token" => filter_input(INPUT_POST, 'token_ws')
    );

    $data = '';
    $method = 'GET';
    $type = 'sandbox';
    $endpoint = '/rswebpaytransaction/api/webpay/v1.0/transactions/' . $token;

    $response = get_ws($data, $method, $type, $endpoint);

    $message .= "<pre>";
    $message .= print_r($response, TRUE);
    $message .= "</pre>";

    $url_tbk = $url3. "?action=refund";
    $submit = 'Refund!';
    break;
}
?>
