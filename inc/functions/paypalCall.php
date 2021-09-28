<?php

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

function actionPay($id = false, $valor = false ) {
    if ($id && $valor) {

        echo $id . '<br />';
        echo $valor . '<br />';
        // After Step 1
        $clientId = returnSetting('client_id');
        $clientSecret = returnSetting('client_secret');
        echo $clientId . '<br />';
        echo $clientSecret . '<br />';
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $id,
                "amount" => [
                    "value" => $valor,
                    "currency_code" => "BRL"
                ]
            ]],
            "application_context" => [
                "cancel_url" => "https://postmodernmastering.com/cancel",
                "return_url" => "https://postmodernmastering.com/return"
            ] 
        ];

        try {
            $response = $client->execute($request);
            return $response;
        }catch (HttpException $ex) {
            return $ex->statusCode;
            // print_r($ex->getMessage());
        }
    }
    else {
        return false;
    }
    
}

?>