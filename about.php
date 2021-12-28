<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbf218cbf9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/about.css">
    <title>AboutUs</title>
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
        .demo-img{
            width: 100%;
            border: 1px solid silver;
            box-shadow: 0px 0px 5px silver;
            border-radius: 10px;
            margin: 10px;
            padding: 10px;
            height: 150px;
        }
        </style>
</head>
<body>
    <?php include('includes/top-header.php');?>

    <div class="header">
        <div class="container">
                <h2 style="font-weight:900">About Us</h2>
        </div>
    </div>

    <section>
    <div class="container">
        <div style="padding: 100px 0px;font-size: 17px">
            <p>Established in 2001, Our company is recognized for its quality products,meeting national and international standards.  <br>
                The company is certified under ISO-9001:2015 and products under ECE R67, ISO-15500 and SNI indonesia. <br>
            Starting from few machines to building in hours development model, all our products has been value engineering by us.</p>
        </div>
        <br>

        <h2>What We Do </h2> <br>
        
        <div id="two" class="common">
            <p>We are leading manufacture are developer of CNG and LPG Conversion kits, 
                Cushers, Fare Meters and Speed Limitation devices.</p>

        </div>
        <br>
        <div style="padding: 20px; border: 3px solid #034e99; border-radius: 20px;text-align: center; color: #034e99;font-weight: 700; box-shadow: 0px 0px 20px silver">
        <h2>Vision</h2> <br>
        <p>
            To Continuously develop prducts for safety, comfort and sustainable alternate 
            fuel model to serve the future generation.</p>       
            </div>
        <br>

        <h2>Approvals / Certifications</h2> <br>

        <div class="row">
            <div class="col-lg-2"><img src="img/67R-.png" alt="" class="demo-img"></div>
            <div class="col-lg-2"><img src="img/110R-.png" alt="" class="demo-img"></div>
            <div class="col-lg-2"><img src="img/ARAI-.png" alt="" class="demo-img">  </div>
            <div class="col-lg-2"><img src="img/icat-.png" alt="" class="demo-img">  </div>
            <div class="col-lg-2"><img src="img/SNI-.png" alt="" class="demo-img"></div>
            <div class="col-lg-2"><img src="img/TUV-.png" alt="" class="demo-img"></div>
            <div class="col-lg-2"><img src="img/VCA-.png" alt="" class="demo-img"></div>
        </div>
        </div>
        <br><br><br><br>
    </section>

    
<!-- {% comment %} -------------------------------------------------------------------------------------- {% endcomment %} -->
    <?php include('includes/footer.php');?>

    
</body>
</html>