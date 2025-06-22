<?php
function processChapaPayment($postData, $secretKey) {
    $payment_data = [
        'amount' => $postData['fareHidden'],
        'currency' => 'ETB',
        'email' => $postData['email'],
        'first_name' => $postData['nameOnCard'],
        'tx_ref' => $postData['tx_ref'],
        'callback_url' => '',
        'return_url' => 'http://localhost/travel3/paymentsuccess.php',
        'customization' => [
            'title' => 'Flight Payment',
            'description' => 'Flight booking reservation'
        ]
    ];

    $ch = curl_init('https://api.chapa.co/v1/transaction/initialize');
    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $secretKey,
            'Content-Type: application/json'
        ],
        CURLOPT_POSTFIELDS => json_encode($payment_data),
        CURLOPT_RETURNTRANSFER => true
    ]);
    
    $response = curl_exec($ch);
    $result = json_decode($response, true);
    
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200 && $result['status'] == 'success') {
        header('Location: ' . $result['data']['checkout_url']);
        exit;
    } else {
        $_SESSION['payment_error'] = $result['message'] ?? 'Payment initialization failed';
        header('Location: paymentHotels.php');
        exit;
    }
}
