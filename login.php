<?php include('includes/config.php'); ?>
<?php
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pwd=md5($_POST['pwd']);

    print_r($pwd);

    $stmt = $con->prepare("select * from users where email='$email' and password='$pwd'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
    if(!empty($rows)){
        foreach($rows as $row)
        {
            $id=$row['id'];
            $_SESSION['login']=$id;
            $_SESSION['fname']=$row['fname'];

            if(isset($_SESSION['session']) && $_SESSION['session']!=""){
                $session=$_SESSION['session'];
                $stmt = $con->prepare("select * from cart where session='$session'");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rows=$stmt->fetchAll();
                if(!empty($rows)){
                    foreach($rows as $row)
                    {
                        $qty=$row['quantity'];
                        $rowid=$row['id'];
                        $sql = "update cart set user_id='$id',session=null where id='$rowid'";
                        $con->exec($sql);
                    }
                }
            }
            $_SESSION['session']="";
            header('location:home.php');
        }
    } else{
        $_SESSION['msg']="Username or Password Invalid!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbf218cbf9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
    <style>
        .header{
            padding: 20px 0px;
            margin-top: -10px;
            background-image: linear-gradient(to right,#044a8f, #459df5);
            color: white;
            text-shadow: 0px 0px 10px black;
            text-align: center;
        }
        .ul-list{
            padding: 70px 0px;
        }
        .ul-list li{
            padding: 10px;
        }
        input{
            width: 100%;
            padding: 7px 10px;
        }

        .common{
            margin: 20px 0px;
        }
        </style>
</head>
<body>
    <?php include('includes/top-header.php');?>
    <div class="header">
        <div class="container">
                <h2 style="font-weight:900">User Sign In </h2>
        </div>
    </div>
   <?php if(isset($_POST['submit']))
        {?><br>
            <div class="alert alert-success" style="color: red; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                <strong>Alert!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
            
            </div>
        <?php } ?>
    <section>
        
        <form action="" method="POST" style="width: 400px; margin: 50px auto;">
            <div class="row">
                <div class="col-lg-1" style="padding:10px;">
                    <i class="far fa-envelope" style="font-size:20px;text-align: center;"></i> 
                </div>
                <div class="col-lg-11">
                    <input type="email" placeholder="Email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    title="Please enter a valid mobile or email address." required style="color:black;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-1" style="padding:10px;">
                    <i class="fas fa-lock" style="font-size:20px;text-align: center;"></i> 
                </div>
                <div class="col-lg-11">
                    <input type="password" placeholder="Password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                    required style="color:black;"> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-1" style="padding:10px;">
                </div>
                <div class="col-lg-11">
                    <input type="submit" class="btn btn-primary" style="width:100%" name="submit" value="Login">
                </div>
            </div>

            

            <div style="text-align: center; margin-top: 20px;">
                <p>New to Dinsha Cng ?<a href="signup.php" style="text-decoration: none; color: blue"> Create Account</a></p>
                <hr>
                <p><a href="forgot.php" style="text-decoration: none; color: blue">Forget account?</a> </p>
            </div>
            
        </form>
        
    </section>

    <br><br><br><br><br>
               
   <?php include('includes/footer.php');?>

</body>
</html>