<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	</head>
</html>

<?php 

  	require('conn.php');
  		

    if (isset($_GET['id'])) {
    	$id = $_GET['id'];
    	$value = $_GET['value'];
 
    	}

    	$q = $conn->prepare("SELECT * FROM company WHERE id = :id");
		$q->bindParam(':id',$id);
		$q->execute();

		if ($q->rowCount() > 0) {
		$row = $q->fetch();

		echo $id;
		

		?>

		<td><a href="viewdepartments.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">View  Departments</a> 


	    <?php

	    }else {
	    	header('Location:companies.php');
    } 	

	
					
?>

  		
  		
