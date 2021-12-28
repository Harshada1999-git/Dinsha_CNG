<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['submit']))
{
    $address=$_POST['address'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];

    $bankname= '';
    $holdername= '';
    $accno= '';
    $idfccode= '';

    $userid=$_SESSION['login'];

    $sqlp = "update users set shippingAddress='$address',shippingState='$state',shippingCity='$city',shippingPincode='$pincode' where id='$userid'";
    $con->exec($sqlp);


    $sql = "insert into orders(user_id,bankname,holdername,accno,idfccode) values('$userid','$bankname','$holdername','$accno','$idfccode')";
    $con->exec($sql);
    $orderid = $con->lastInsertId();


    $stmt = $con->prepare("SELECT * FROM cart where user_id='$userid'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();

    $total = 0;

    foreach($rows as $row)
    {
        $productid=$row['productid'];
        $quantity=$row['quantity'];

        $product = $conn->query("SELECT * FROM `products` where id = '".$row['productid']."' ")->fetch_assoc();

        $total = $total + $quantity*$product['productPrice'];
        
        $sql1 = "insert into order_products(product_id,quantity,order_id) values('$productid','$quantity','$orderid')";
        $con->exec($sql1);
    }

    $sql = "delete from cart where user_id=".$userid;
    $con->exec($sql);

    $_SESSION['msg']="Order Placed Successfully!!";
    header('Location: payment.php?user='.$userid.'&&total='.$total);
}

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
                <h2 style="font-weight:900">Checkout </h2>
        </div>
    </div>
    <div class="container">
<section >
        <section id="middlein">      <br>
            
            <br>
            <div id="center"> 
                <hr>
                <h3>Products List:</h3>
                <hr>
                <form action="" method="post">
                <div id="tags">
                   
                    <table style="width:100%" > 
                        <tr><th>Sr.No</th><th   >Item Name</th><th   >Price</th><th   >Quantity</th> <th   >Total</th></tr>
                        <?php
                        $userid=$_SESSION['login'];
                        $stmt = $con->prepare("SELECT * FROM cart where user_id='$userid'");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $rows=$stmt->fetchAll();
                        $cnt=1;
                        $totprice=0;
                        foreach($rows as $row)
                        {
                            $pid=$row['productid'];
                            $name="";
                            $price="";
                            $total=0;
                            $stmt1 = $con->prepare("SELECT * FROM products where id='$pid'");
                            $stmt1->execute();
                            $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
                            $rows1=$stmt1->fetchAll();
                            foreach($rows1 as $row1)
                            {
                                $price=$row1['productPrice'];
                                $name=$row1['productName'];
                                $total+=$price*$row['quantity'];
                            }
                            $totprice+=$total;
                        ?>  
                        <form action="" method="post">
                            <tr>
                                <td   ><?php echo htmlentities($cnt);?></td>
                                <td><?=$name?></td>
                                <td   ><?=$price?></td>
                                <td   ><?=$row['quantity']?></td>
                                <td   ><?=$total?></td>
                            </tr>
                        </form>
                        <?php $cnt=$cnt+1; ?>
                        <?php } ?>
                        <tr><th></th><th colspan="3"    >Total Price:</th><th><?=$totprice?></th></tr>
                    </table>

<br>
                   
                </div>
                <hr>
                <h3>Shipping Details:</h3>
                <hr>
                <div id="tags">
                    <?php 
                        $id=$_SESSION['login'];
                        $stmt = $con->prepare("select * from users where id='$id'");
                        $stmt->execute();

                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $rows=$stmt->fetchAll();
                        // print_r($res);
                        foreach($rows as $row)
                        {
                    ?>
                       
                        <table    style="width:100%">
                            <tr><th    style="width:500px">First Name :</th><td><?=$row['fname']?></td> </tr>
                            <tr><th   >Last Name :</th><td><?=$row['lname']?></td> </tr>
                            <tr><th   >Email :</th><td><?=$row['email']?></td> </tr>
                            <tr><th   >Contact No :</th><td><?=$row['contactno']?></td> </tr>
                            <tr><th   >Address :</th>
                                <td>
                                    <input type="text" value="<?=$row['shippingAddress']?>" name="address" required />
                                </td>
                            </tr>
                            <tr><th   >State :</th>
                                <td>
                                    <input type="text" value="<?=$row['shippingState']?>" name="state" required />
                                </td>
                            </tr>
                            <tr><th   >City :</th>
                                <td>
                                    <input type="text" value="<?=$row['shippingCity']?>" name="city" required />
                                </td>
                            </tr>
                            <tr><th   >Pincode :</th>
                                <td>
                                    <input type="number" value="<?=$row['shippingPincode']?>" name="pincode" required />
                                </td>
                            </tr>
                        </table>
                        
                        
                    <?php
                    }
                    ?>
                </div>
                <hr>
                
                <button type="submit" style="width: 100%;margin-top: 50px;padding: 20px;" name="submit" class="btn btn-primary" style="">Procced To Pay</button>

                </form>
            </div>
        </section>
    </section>

    </div>
    
<br><br><br><br><br>
       
       <?php include('includes/footer.php');?>
</body>
</html>