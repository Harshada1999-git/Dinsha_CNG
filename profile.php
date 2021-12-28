<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['submit']))
{
    $firstname  =   $_POST['firstname'];
    $lastname   =   $_POST['lastname'];
    $dob        =   $_POST['dob'];
    $gender     =   $_POST['gender'];
    $email      =   $_POST['email'];
    $phone      =   $_POST['phone'];
    $address    =   $_POST['address'];

    $id=$_SESSION['login'];

    $sql = "update users set fname='$firstname',lname='$lastname',dob='$dob',gender='$gender',email='$email',contactno='$phone',shippingAddress='$address' where id='$id'";
  // use exec() because no results are returned
  $con->exec($sql);

$_SESSION['msg']="Profile Updated Successfully!!";

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
    <title>My Account</title>
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
                <h2 style="font-weight:900">User Profile </h2>
        </div>
    </div>

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
                        <input type="text" name="firstname" value="<?=$row['fname']?>" required> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                        <label for="name" class="lab" >Last Name</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" name="lastname" value="<?=$row['lname']?>" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                        <label for="name" class="lab" >Date Of Birth</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="date" name="dob" value="<?=$row['dob']?>" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                        <label for="name" class="lab" >Gender</label>
                    </div>
                    <div class="col-lg-9">
                        <select name="gender" style="width: 100%;padding: 10px;">
                            <option value="Male" <?php if($row['gender'] == 'Male'){ echo 'selected';} ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female'){ echo 'selected';} ?>>Female</option>
                            <option value="Other" <?php if($row['gender'] == 'Other'){ echo 'selected';} ?>>Other</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                        <label for="name" class="lab"  >Email</label>
                    </div>
                    <div class="col-lg-9">
                    <input type=" email" name="email"  value="<?=$row['email']?>"
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
                        <input type="number" name="phone" value="<?=$row['contactno']?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                        <label for="name" class="lab" >Address</label>
                    </div>
                    <div class="col-lg-9">
                        <textarea  style="width: 100%;padding: 10px"  class="ta" name="address"  cols="30" rows="10" required><?=$row['shippingAddress']?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3" style="padding:10px 0px;">
                    </div>
                    <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary" style="width:100%" name="submit" >Update</button>
                    </div>
                </div>
                <br>
                </form>
            </div>
             
         
        </div>
    
</section>
<?php
}
                        ?>

<br><br><br><br><br>
       
<?php include('includes/footer.php');?>

    
</body>
</html>