<?php include('includes/config.php'); ?>
<?php
    
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $msg=$_POST['message'];

    $sql = "insert into contact(fname,lname,email,phone,message) values('$firstname','$lastname','$email','$phone','$msg')";
  // use exec() because no results are returned
  $con->exec($sql);

$_SESSION['msg']="Thank You for Contact Us. We will contact you soon!!";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbf218cbf9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
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
        </style>
</head>
<body>
    <?php include('includes/top-header.php');?>

    <div class="header">
        <div class="container">
                <h2 style="font-weight:900">Contact Us</h2>
        </div>
    </div>
        
        <form action="" method="POST" id="middle1">
            <?php if(isset($_POST['submit']))
        {?>
            <div class="alert alert-success" style="color: green; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
            
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <br><br><br>
                <p style="font-size: 17px;">You can contact us any way that is convenient for you.
                    We are available 24/7 via <br> fax or email.You can also use a contact form below or visit office
                    personally.</p>

<br><br><br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="firstname" class="lab"> Firstname</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" name="firstname" style="width:100%" class="ip" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="lastname" class="lab"> Lastname</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" name="lastname" style="width:100%" class="ip" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="email" class="lab"> Email</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="email" style="width:100%" name="email" class="ip" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="tel" class="lab"> Phone</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" style="width:100%" name="phone" class="ip" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="tel" class="lab"> Message</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea name="message" style="width:100%;border-radius: 5px;height: 100px;" id="" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9">
                            <button class="btn btn-success" style="width:100%" type="submit" name="submit">Submit</button>
                        </div>
                    </div>

                
                </div>
                <div class="col-lg-4">
                <h3 class="h">ADDRESS</h3>
            <hr style="background-color: rgb(109, 107, 107);">
            <p>
                <i class="fas fa-map-marker-alt" style="margin-right: 15px;"></i>
                Shop No-5 Near Jawahar Nagar Police Station, Aurangabad
            </p>

            <h3>PHONES</h3>
            <hr style="background-color: rgb(109, 107, 107);">
            <p><i class="fas fa-phone-alt" style="margin-right: 15px;"></i>
                +91 &nbsp;9637777444
            </p>

            <h3>E-MAIL</h3>
            <hr style="background-color: rgb(109, 107, 107);">
            <p> <i class="far fa-envelope" style="margin-right: 15px;"></i>

                <a href="dinshachngaurangabad@gmail.com">dinshachngaurangabad@gmail.com</a>
            </p>

            <h3>OPENING HOURS</h3>
            <hr style="background-color: rgb(109, 107, 107);">
            <p style="margin-top: 30px; margin-bottom: 0px;"> <i class="far fa-calendar-alt" style="margin-right: 15px;"></i>
                Mon-Fri: &nbsp; 9:00 am-6:00 pm <br>
            </p>
            
            <p style="margin-top: 0;margin-left: 31px;">
                Sat-Sun: &nbsp; 11:00 am-4:00 pm

            </p>

                </div>
            </div>
        </div>
        </form>

        <br><br><br><br><br><br>
    <?php include('includes/footer.php');?>
    
</body>
</html>