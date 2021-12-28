<?php include('includes/config.php'); ?>
<?php
    
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $qty=1;
	if($_GET['qty']){
		$qty=$_GET['qty'];
	}	
	$userid='null';
	$session=null;
	if(isset($_SESSION['login']) && $_SESSION['login']!=""){
		$userid=$_SESSION['login'];
		$stmt = $con->prepare("select * from cart where productid='$id' and user_id='$userid' and session='$session'");
	    $stmt->execute();
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $rows=$stmt->fetchAll();
	    if(!empty($rows)){
		    foreach($rows as $row)
		    {
		    	$qty=$row['quantity']+1;
		    	$rowid=$row['id'];
		    	$sql = "update cart set quantity='$qty' where id='$rowid'";
				$con->exec($sql);
		    }
		}else{
			  echo $sql = "insert into cart(productid,quantity,user_id,session) values('$id','$qty',$userid,'$session')";
			  // use exec() because no results are returned
			  $con->exec($sql);
		}

	  	header('Location: checkout.php');
	}else{
		header('Location: login.php');
	}
}

?>

