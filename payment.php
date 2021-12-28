<?php include('includes/config.php'); ?>
<?php

$user = $_GET['user'];
$total = $_GET['total'];

//razer pay
$key = array();

$key['payment_gateway_api_key'] = 'rzp_test_d6hduJPwMCVy5u';
$key['payment_gateway_secret_key'] = 'pvUSIlusP3Rp5gwcPiwye5x4';

    require('razorpay-php/Razorpay.php');

    // Create the Razorpay Order
    
    use Razorpay\Api\Api;
    use Razorpay\Api\Errors\SignatureVerificationError;

    $orderData = [
        'receipt'         => $user,
        'amount'          => $total, // 2000 rupees in paise
        'currency'        => 'INR',
        'payment_capture' => 1 // auto capture
    ];
    
    $displayAmount = $amount = $orderData['amount'];
    
    $displayCurrency = 'INR';
    
    if ($displayCurrency !== 'INR')
    {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);

        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }
    
    $api = new Api($key['payment_gateway_api_key'], $key['payment_gateway_secret_key']);
    
    $razorpayOrder = $api->order->create($orderData);
    
    $razorpayOrderId = $razorpayOrder['id'];
    
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    
    $data = [
        "key"               => 'rzp_test_d6hduJPwMCVy5u',
        "amount"            => $total,
        "display_currency"  => 'INR',
        "display_amount"    => $displayAmount,
        "name"              => "Dinsha CNG",
        "description"       => '',
        "image"             => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
        "prefill"           => [
        "name"              => "Dinsha CNG",
        "email"             => "support@dinshacng.com",
        "contact"           => "9999999999",
        ],
        "notes"             => [
        "address"           => "",
        "merchant_order_id" => $user,
        ],
        "theme"             => [
        "color"             => "#2E59D9"
        ],
        "order_id"          => $razorpayOrderId,
    ];
    
    
    $json = json_encode($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbf218cbf9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css">
    <title>Checkout</title>
    <style>
        .header{
            padding: 20px 0px;
            margin-top: -10px;
            background-image: linear-gradient(to right,#044a8f, #459df5);
            color: white;
            text-shadow: 0px 0px 10px black;
        }
        th{
            padding: 10px !important;
            border: 1px solid silver;
        }
        td{
            padding: 10px !important;
            border: 1px solid silver;
        }
        input{
            width: 100% !important;
            padding: 5px 10px !important;
        }
        </style>
</head>
<body>
    <?php include('includes/top-header.php');?>
    <div class="header">
        <div class="container">
                <h2 style="font-weight:900">Payment </h2>
        </div>
    </div>
    <div class="container">
        <br><br><br>
    <button class="btn btn-primary btn-user btn-block" id="rzp-button1">Pay Online</button>
<br>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    <input type="hidden" name="total" value="<?php echo $total;?>" >
    <input type="hidden" name="cid" value="<?php echo $user;?>" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
* The entire list of checkout fields is available at
* https://docs.razorpay.com/docs/checkout-form#checkout-fields
*/
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
    </div>
    
<br><br><br><br><br>
       
       <?php include('includes/footer.php');?>
</body>
</html>