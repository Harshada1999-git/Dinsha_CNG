<?php include('includes/config.php'); ?>
<?php

if(isset($_POST['submit']))
{
    $email_var=$_POST['email'];

    $stmt = $con->prepare("select * from users where email='$email_var'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
    if(!empty($rows)){
        foreach($rows as $row)
        {

        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "sharlawar77@gmail.com";
        $from = "clickytl@gmail.com";

        // Set the email subject.
        $subject = "Reset your Dinsha CNG password";

        // Build the email content.
        $email_content = "<div style='width:500px;margin: 20px auto;font-family: arial;box-shadow: 0px 0px 10px silver;'>
            <h1 style='width: 100%; padding: 20px 0px;background-color: #3ECF8E; text-align: center;color: white;text-shadow: 0px 0px 5px black;'>Password Reset Request</h1>
            <div style='padding: 0px 20px 50px;    color: #636363;font-family: Helvetica Neue,Helvetica,Roboto,Arial,sans-serif; font-size: 14px; line-height: 150%; text-align: left;'>
                <p>Hi ".$row['fname']." ".$row['lname']."</p>
        
                <p>Someone has requested a new password for the following account on Dinsha CNG:</p>
        
                <p>Student: ".$row['email']." </p>
        
                <p>If you didn't make this request, just ignore this email. If you'd like to proceed:</p>
        
                <p><a href='http://localhost/online-shop/new-password.php?user=".$row['id']."' style='color: #3ECF8E'>Click here to reset your password</a></p>
        
                <p>Thanks for reading.</p>
            </div>
        </div>";
        
        // print_r($email_content);die();

        // Build the email headers.
        // $email_headers = "From: e-Learning <$from>";
        
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= "From: Dinsha CNG <$from>";

        // Send the email.
        if (mail($email, $subject, $email_content, $headers)) {
            $_SESSION['msg']="Thank You! Your Link has been shared.";
            // Set a 200 (okay) response code.
            http_response_code(200);
            // echo "Thank You! Your message has been sent.";
            echo "<script>window.alert('Thank You! Your Link has been shared.');</script>";
            
        } else {
            $_SESSION['msg']="Check email and reset your password.";
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            // echo "Oops! Something went wrong and we couldn't send your message.";
            echo "<script>window.alert('Check email and reset your password');</script>";
            
        }
    }
    }else{
        $_SESSION['msg']="User not exits..!!";
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
                <h2 style="font-weight:900">Forgot Password</h2>
        </div>
    </div>
   <?php if(isset($_POST['submit']))
        {?><br>
            <div class="alert alert-success" style="color: red; text-align: center; display: block; width: 100%; margin-bottom: 20px"> 
                <strong>Alert!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
            
            </div>
        <?php } ?>
    <section>
        
        <form action="" method="POST" id="searchForm" style="width: 400px; margin: 50px auto;">
            <div class="row">
                <div class="col-lg-4" style="padding:10px;">
                     Enter Email
                </div>
                <div class="col-lg-8">
                    <input type="email" placeholder="Enter Email" name="email"  id="email" required style="color:black;">
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

   <script>
// Attach a submit handler to the form
$( "#searchForm" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
  var $form = $( this ),
    term = $form.find( "input[name='email']" ).val(),
    url = $form.attr( "" );
 
  // Send the data using post
  var posting = $.post( 'http://www.lalitsharlawar.com/email.php', { email: term } );
 
  // Put the results in a div
  posting.done(function( data ) {

    var responce = JSON.parse(data)
    if(responce.status == '1')
    {
        window.alert(responce.message);
        window.location.href="http://localhost/online-shop/";
    } else {
        window.alert(responce.message);
        window.location.href="http://localhost/online-shop/";
    }
  });
});
</script>

</body>
</html>