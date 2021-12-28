<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <title>Products</title>
</head>
<body>
    <?php include('includes/top-header.php');?>
    <div class="container">
    <div class="row">
    
        <?php
            $stmt = $con->prepare("SELECT * FROM products order by id desc");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows=$stmt->fetchAll();
            $cnt=1;
            foreach($rows as $row)
            {
            ?>  

            <div class="col-lg-3 d-flex align-items-stretch" style="border:1px solid silver; padding: 10px">
            <div class="d-flex align-items-stretch" style="">
            <div class="card" style="width: 18rem;">
            <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" style="margin-top: 20px;width:100%;height: 200px"> 
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlentities($row['productName']);?></h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>

                <h3></h3>
                <div style="text-align: justify; height: 250px; overflow: auto;"> 
                <?php if(!empty($row['productDescription'])){ ?>
                    
                <p >Description:</p>
                <?php echo html_entity_decode($row['productDescription']);?>
                    <br>
                <?php } ?>
                <?php if(!empty($row['specifications'])){ ?>
                    
                <p >Technical Specifications:</p>
                <?php echo html_entity_decode($row['specifications']);?>
                    
                    <br>
                <?php } ?>
                </div>
                
                <h2 class="price"> ₹ <?=$row['productPrice']?> </h2>
                <div>
                    <button type="button" class="btn_one" ><a href="buynow.php?id=<?=$row['id']?>" style="color:white;text-decoration:none;">Buy Now</a></button>
                    <button type="button" class="btn_two"><a href="addtocart.php?id=<?=$row['id']?>" style="color:white;text-decoration:none;">Add to Cart</a></button>
                </div>
           
            </div>
            </div>
<!-- -------------------------------------------------------------------------------- -->
<?php } ?>
            <!-- -------------------------------------------------------------------------------- -->
           <!-- /* --------------------------------------------------------------------------- */ -->

            
    </div>
                </div>
                
<?php include('includes/footer.php');?>
</body>
