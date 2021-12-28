<?php include('includes/config.php'); ?>
<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbf218cbf9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css">
    <title>Order Placed</title>
    <style>
        .header{
            padding: 20px 0px;
            margin-top: -10px;
            background-image: linear-gradient(to right,#044a8f, #459df5);
            color: white;
            text-shadow: 0px 0px 10px black;
        }
        </style>
</head>
<body>
    <?php include('includes/top-header.php');?>
    
    <div class="header">
        <div class="container">
                <h2 style="font-weight:900">Order Placed Successfully..!! </h2>
        </div>
    </div>
    <div class="container" style="text-align: center">
        <img src="img/order.gif" width="300px">
        <br>
        <a href="products.php"><button type="submit" style="width: 100%;margin-top: 50px;padding: 20px;" name="submit" class="btn btn-primary" style="">Contine Shopping</button></a>
    </div>
   
    <br><br><br><br><br>
       
       <?php include('includes/footer.php');?>
</body>
</html>