<?php include('includes/config.php'); ?>
<?php

$user = array();
$user_email = $_GET['user'];

if(isset($_GET['user']))
{
    $email=$_GET['user'];

    $stmt = $con->prepare("select * from users where email='$email' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
    if(!empty($rows)){
        foreach($rows as $row)
        {
            array_push($user,$row);
        }
    }else{
    }
}

if(isset($_POST['submit']))
{
    if($_POST['pass'] == $_POST['cpass'])
    {
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);

        $sql = "UPDATE `users` SET `password`='".$pass."' WHERE `email`='".$email."' ";
        // use exec() because no results are returned
        $con->exec($sql);
        echo "<script>window.alert('Updated Successfully..!!!');window.location.href='login.php'</script>";

    } else {
        echo "<script>window.alert('Password didn't match..!!!');</script>";
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
            padding: 100px 0px;
            margin-top: -10px;
            background-image: linear-gradient(to right,#044a8f, #459df5);
            color: white;
            text-shadow: 0px 0px 10px black;
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
                <h2 style="font-weight:900">Change Password</h2>
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
                <div class="col-lg-4" style="padding:10px;">
                     New Password
                </div>
                <div class="col-lg-8">
                    <input type="text" placeholder="New Password" name="pass"  required style="color:black;"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter,
                        and at least 8 or more characters">
                    <input type="hidden" placeholder="New Password" name="email" value="<?php echo $user_email; ?>"  required style="color:black;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4" style="padding:10px;">
                     Confirm Password
                </div>
                <div class="col-lg-8">
                    <input type="text" placeholder="Confirm Password" name="cpass"  required style="color:black;"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter,
                        and at least 8 or more characters">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4" style="padding:10px;">
                </div>
                <div class="col-lg-8">
                    <input type="submit" class="btn btn-primary" style="width:100%" name="submit" value="Change">
                </div>
            </div>

            

            <div style="text-align: center; margin-top: 20px;">
                <p>New to Dinsha Cng ?<a href="signup.php" style="text-decoration: none; color: blue"> Create Account</a></p>
                <hr>
                <p>Already have an account?<a href="login.php" style="text-decoration: none; color: blue"> Sign In</a></p>
            </div>
            
        </form>
        
    </section>

    <br><br><br><br><br>
               
   <?php include('includes/footer.php');?>

</body>
</html>