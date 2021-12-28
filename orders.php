<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['remove']))
{
    $sql = "delete from orders where id = '".$_POST['orderid']."'";
    $con->exec($sql);
    $_SESSION['msg']="Order Removed !!";
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
    <title>My Orders</title>
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
                <h2 style="font-weight:900">My Orders </h2>
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
                       
                    <table style="width:100%">
                        <tr><th   >Sr.No</th><th   >Order No</th><th   >Order Date</th><th   >Action</th></tr>
                        <?php
                        $userid=$_SESSION['login'];
                        $stmt = $con->prepare("SELECT * FROM orders where user_id='$userid' order by id desc");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $rows=$stmt->fetchAll();
                        $cnt=1;
                        foreach($rows as $row)
                        {
                            $oid=$row['id'];
                            $orderDate=$row['orderDate'];

                        ?>  
                        <form action="" method="post" onsubmit="return confirm('Are you sure want to cancel this order?');">
                            <tr>
                                <td   ><?php echo htmlentities($cnt);?></td>
                                <td><?=$oid?></td>
                                <td   ><?=$orderDate?></td>
                               
                                <td   >
                                    <input type="hidden" name="orderid" value="<?=$oid?>">
                                    <a href="order-details.php?id=<?=$oid?>"><button type="button" class="btn btn-success">Order Details</button></a>
                                    <button type="submit" class="btn btn-danger" name="remove">Cancel Order</button>
                                </td>
                            </tr>
                        </form>
                        <?php $cnt=$cnt+1; ?>
                        <?php } ?>
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