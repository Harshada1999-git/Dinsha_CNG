<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['remove']))
{
    $sql = "delete from cart where id = '".$_POST['cartid']."'";
    $con->exec($sql);
    $_SESSION['msg']="Cart Product Removed !!";
}

if(isset($_POST['update']))
{
    $sql = "update cart set quantity='".$_POST['qty']."' where id = '".$_POST['cartid']."'";
    $con->exec($sql);
    $_SESSION['msg']="Cart Product Updated !!";
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
    <title>My Cart</title>
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
                <h2 style="font-weight:900">My Cart </h2>
        </div>
    </div>
    <div class="container">
    
            <br>
            <div id="center"> 
                <div id="tags">
                    <?php if(isset($_POST['remove']))
                        {?>
                            <div class="alert alert-success" style="color: green; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                                <strong>Alert!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                            
                            </div>
                        <?php } ?>
                        <?php if(isset($_POST['update']))
                        {?>
                            <div class="alert alert-success" style="color: green; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                                <strong>Success!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                            
                            </div>
                        <?php } ?>
                    <table style="width:100%">
                        <tr><th   >Sr.No</th><th   >Item Name</th><th   >Price</th><th   >Quantity</th> <th   >Total</th><th   >Action</th></tr>
                        <?php
                        $userid=$_SESSION['login'];
                        $stmt = $con->prepare("SELECT * FROM cart where user_id='$userid'");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $rows=$stmt->fetchAll();
                        $cnt=1;
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

                        ?>  
                        <form action="" method="post">
                            <tr>
                                <td   ><?php echo htmlentities($cnt);?></td>
                                <td><?=$name?></td>
                                <td   ><?=$price?></td>
                                <td   ><input type="number" value="<?=$row['quantity']?>" name="qty" required style="text-align: center; width:50px" /></td>
                                <td   ><?=$total?></td>
                                <td   >
                                    <input type="hidden" name="cartid" value="<?=$row['id']?>">
                                    <button type="submit" class="btn btn-warning"  name="update">Update</button>
                                    <button type="submit" class="btn btn-danger"  name="remove">Remove</button>
                                </td>
                            </tr>
                        </form>
                        <?php $cnt=$cnt+1; ?>
                        <?php } ?>
                    </table>
<hr>
<br>
<?php
if(!empty($rows)){
?>
                   <a href="checkout.php"><button style="width: 100%;margin-top: 50px;padding: 20px;font-size: 20px" name="submit" class="btn btn-primary" style="">Proceed To Checkout</button></a>
                   <?php
}
                   ?>
                </div>
            </div>

            </div>
            <br><br><br><br><br>
       
       <?php include('includes/footer.php');?>
    
</body>
</html>