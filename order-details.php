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
    <title>My Orders Details</title>
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
                <h2 style="font-weight:900">My Order Deatils (Order No : <?php echo $_GET['id'];?>) </h2>
        </div>
    </div>
    <div class="container">
            <br>
            <div id="center"> 
                <div id="tags">
                    <table style="width:100%">
                        <?php
                        $oid=$_GET['id'];
                        $stmt = $con->prepare("SELECT * FROM orders where id='$oid' order by id desc");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $rows=$stmt->fetchAll();
                        $cnt=1;
                        foreach($rows as $row)
                        {
                            $oid=$row['id'];
                            $orderDate=$row['orderDate'];

                        ?>  
                            <tr><th   >Order No : </th><td   ><?php echo htmlentities($oid);?></td></tr>
                            <tr><th   >Order Date : </th><td><?=$orderDate?></td></tr>
                            
                            <tr><th    colspan="2"><hr><br></th></tr>
                            <tr><th   ><h3>Payment Details:</h3></th><td></td></tr>
                            <tr><th    colspan="2"><hr></th></tr>
                            <tr><th   >Bank Name : </th><td><?=$row['bankname']?></td></tr>
                            <tr><th   >Holder Name : </th><td><?=$row['holdername']?></td></tr>
                            <tr><th   >Account No : </th><td><?=$row['accno']?></td></tr>
                            <tr><th   >IDFC Code : </th><td><?=$row['idfccode']?></td></tr>

                        <?php
                            $uid=$_SESSION['login'];
                            $stmtu = $con->prepare("select * from users where id='$uid'");
                            $stmtu->execute();

                            // set the resulting array to associative
                            $resultu = $stmtu->setFetchMode(PDO::FETCH_ASSOC);
                            $rowsu=$stmtu->fetchAll();
                            // print_r($res);
                            foreach($rowsu as $rowu)
                            {
                        ?>
                            <tr><th    colspan="2"><hr><br></th></tr>
                            <tr><th   ><h3>Shipping Details:</h3></th><td></td></tr>
                            <tr><th    colspan="2"><hr></th></tr>
                            <tr><th   >Shipping Address : </th><td><?=$rowu['shippingAddress']?></td></tr>
                            <tr><th   >Shipping State : </th><td><?=$rowu['shippingState']?></td></tr>
                            <tr><th   >Shipping City : </th><td><?=$rowu['shippingCity']?></td></tr>
                            <tr><th   >Shipping Pincode : </th><td><?=$rowu['shippingPincode']?></td></tr>
                                
                        <?php } ?>

                            <tr><th    colspan="2"><hr><br></th></tr>
                            <tr><th   ><h3>Product Details:</h3></th><td></td></tr>
                            <tr><th    colspan="2"><hr></th></tr>
                            <tr><td    colspan="2">
                                <table    style="width:100%">
                                    <tr><th   >Name</th><th   >Quantity</th><th   >Price </th><th   >Total</th></tr>
                        <?php
                            // $name="";
                            // $price="";
                            $totalprice=0;

                            $stmt1 = $con->prepare("SELECT * FROM order_products where order_id='$oid'");
                            $stmt1->execute();
                            $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
                            $rows1=$stmt1->fetchAll();
                            foreach($rows1 as $row1)
                            {

                                $pid=$row1['product_id'];
                                $quantity=$row1['quantity'];

                                $stmt2 = $con->prepare("SELECT * FROM products where id='$pid'");
                                $stmt2->execute();
                                $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                                $rows2=$stmt2->fetchAll();
                                foreach($rows2 as $row2)
                                {

                                    $price=$row2['productPrice'];
                                    $name=$row2['productName'];
                                    $total=$price*$quantity;

                                    $totalprice+=$total;
                        ?>
                                    <tr><td><?=$name?></td><td   ><?=$quantity?></td><td><?=$price?></td><td   ><?=$total?></td></tr>
                                
                        <?php   }
                            } 
                        ?>
                                    <tr><th   >Total</th><th   ></th><th   > </th><th   ><?=$totalprice?></th></tr>
                                </table>
                            </td></tr>

                    <?php    }
                    ?>
                    </table>
<hr>
<br>

                </div>
            </div>
        
            </div>

            <br><br><br><br><br>
       
       <?php include('includes/footer.php');?>
</body>
</html>