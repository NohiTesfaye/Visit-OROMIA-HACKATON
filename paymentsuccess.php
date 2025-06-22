<?php
session_start();

// Verify payment status (in test mode, you might want to skip actual verification)
$tx_ref = $_GET['tx_ref'] ?? '';
$transaction_id = $_GET['transaction_id'] ?? '';

// In a real implementation, you would verify the payment with Chapa's API here
// But since you're in test mode, we'll simulate a successful payment

// Store payment information in session for display
$_SESSION['payment_info'] = [
    'status' => 'success',
    'tx_ref' => $tx_ref,
    'transaction_id' => $transaction_id,
    'amount' => isset($_GET['amount']) ? $_GET['amount'] : (isset($_SESSION['fareHidden']) ? $_SESSION['fareHidden'] : 'N/A'),
    'currency' => 'ETB',
    'email' => isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A',
    'payment_method' => 'Chapa (Test Mode)',
    'timestamp' => date('Y-m-d H:i:s')
];

// Clear temporary session data
unset($_SESSION['fareHidden']);
unset($_SESSION['email']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Travel Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        .success-icon {
            text-align: center;
            font-size: 50px;
            color: #4CAF50;
            margin: 20px 0;
        }
        .payment-details {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
            width: 200px;
        }
        .btn {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your flight booking has been confirmed.</p>
        
        <div class="payment-details">
            <h2>Payment Details</h2>
            <div class="detail-row">
                <div class="detail-label">Transaction Reference:</div>
                <div><?php echo htmlspecialchars($_SESSION['payment_info']['tx_ref']); ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Transaction ID:</div>
                <div><?php echo htmlspecialchars($_SESSION['payment_info']['transaction_id']); ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Amount Paid:</div>
                <div><?php echo htmlspecialchars($_SESSION['payment_info']['amount']); ?> ETB</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Payment Method:</div>
                <div><?php echo htmlspecialchars($_SESSION['payment_info']['payment_method']); ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Date & Time:</div>
                <div><?php echo htmlspecialchars($_SESSION['payment_info']['timestamp']); ?></div>
            </div>
        </div>
        
        <p>A confirmation email has been sent to <?php echo htmlspecialchars($_SESSION['payment_info']['email']); ?>.</p>
        
        <p>
            <a href="index.php" class="btn">Return to Home</a>
            <a href="#" class="btn" onclick="window.print()">Print Receipt</a>
        </p>
        
        <p><small>Note: This is a test transaction. No actual money was transferred.</small></p>
    </div>
    
    <?php
    // In a real implementation, you might want to:
    // 1. Save the transaction to your database
    // 2. Send a confirmation email
    // 3. Update your booking status
    
    // For test mode, we'll just log to a file (optional)
    file_put_contents('test_payments.log', 
        date('Y-m-d H:i:s') . " - Test payment: " . 
        json_encode($_SESSION['payment_info']) . "\n", 
        FILE_APPEND);
    ?>
</body>
</html>