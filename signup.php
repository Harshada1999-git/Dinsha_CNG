<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['submit']))
{

    // print_r($_POST);die();

    $firstname  =   $_POST['firstname'];
    $lastname   =   $_POST['lastname'];
    $dob        =   $_POST['dob'];
    $gender     =   $_POST['gender'];
    $email      =   $_POST['email'];
    $phone      =   $_POST['phone'];
    $pwd        =   md5($_POST['pwd']);
    $address    =   $_POST['address'];

    $stmt = $con->prepare("select * from users where email='$email'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
    if(!empty($rows)){
        echo "<script>window.alert('Already user exits..!!!');</script>";
    } else {
        $sql = "insert into users(fname,lname,dob,gender,email,contactno,password,shippingAddress) values('$firstname','$lastname','$dob','$gender','$email','$phone','$pwd','$address')";
        // use exec() because no results are returned
        $con->exec($sql);

        $_SESSION['msg']="Signup Successfully!!";
        echo "<script>window.alert('Signup Successfully..!!!');window.location.href='login.php'</script>";
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
    <link rel="stylesheet" href="css/signup.css">
    <title>signup</title>
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
                <h2 style="font-weight:900">User Sign Up </h2>
        </div>
    </div>
    
        <section style="width: 600px; margin: 20px auto;"> 
                
                        <?php if(isset($_POST['submit']))
                        {?>
                            <div class="alert alert-success" style="color: green; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                                <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                            
                            </div>
                        <?php } ?>
                        <br><br>
                       <form action="" method="post">
                       <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >First Name</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="firstname"  required> 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Last Name</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="lastname" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Date Of Birth</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="dob" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Gender</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="gender" style="width: 100%;padding: 10px;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Email</label>
                            </div>
                            <div class="col-lg-9">
                            <input type=" email" name="email" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                        title="Please enter a valid mobile or email address." required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Phone</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Password</label>
                            </div>
                            <div class="col-lg-9">
                            <input type="password"  name="pwd"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter,
                        and at least 8 or more characters" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                                <label for="name" class="lab" >Address</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea  style="width: 100%;padding: 10px" class="ta" name="address"  cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3" style="padding:10px 0px;">
                            </div>
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-primary" style="width:100%" name="submit" >Sign up</button>
                            </div>
                        </div>
                        <br>
                        </form>
                        <div style="text-align: center; margin-top: 20px;">
                            <p>Already have an account?<a href="login.php" style="text-decoration: none; color: blue"> Sign In</a></p>
                        </div>
                    </div>
                     
                 
                </div>
            
        </section>

        <br><br><br><br><br>
               
   <?php include('includes/footer.php');?>
</body>
</html>