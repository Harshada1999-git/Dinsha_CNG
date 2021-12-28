<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <title>Products</title>
    <style>
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 5px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: black; 
  border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
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

            <div class="col-lg-3 d-flex align-items-stretch" style="height:700px;border:1px solid silver; padding: 10px;">
            <div class="card" style="width: 100%;">
            <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" style="margin-top: 20px;width:100%;height: 200px"> 
                    <div class="card-body">
                        <h3 class="card-title" style="height: 80px"><?php echo substr(htmlentities($row['productName']), 0, 50);?></h3>
                        <p class="card-text">
                        <div style="text-align: justify; height: 250px; overflow: auto; padding: 20px"> 
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
                        </p>
                        <h2 class="price"> ₹ <?=$row['productPrice']?> </h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-warning" style="width:100%" ><a href="buynow.php?id=<?=$row['id']?>" style="color: #1b2545;font-weight: 600; text-decoration:none;">Buy Now</a></button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-warning" style="width:100%" ><a href="addtocart.php?id=<?=$row['id']?>" style="color: #1b2545; font-weight: 600; text-decoration:none;">Add to Cart</a></button>
                            </div>
                        </div>
                    </div>
                    </div>

                
                
                
           
            </div>
<!-- -------------------------------------------------------------------------------- -->
<?php } ?>
            <!-- -------------------------------------------------------------------------------- -->
           <!-- /* --------------------------------------------------------------------------- */ -->

            
    </div>
                </div>
             <br><br><br><br><br><br>
<?php include('includes/footer.php');?>
</body>
