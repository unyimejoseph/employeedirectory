<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit company</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.min.js"></script>
</head>

<body>


<?php 

  	require_once('loginconn.php');

  		
    if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    	$id = $_GET['edit_id'];

    	$q = $conn->prepare("SELECT * FROM company WHERE id = :id");
		$q->bindParam(':id',$id);
		$q->execute();

		if ($q->rowCount() > 0) {
		$row = $q->fetch();

		echo "$id";
		}

	    
	    if (isset($_POST['save_changes'])) {
	    	$name = $_POST['name'];
	    	$email = $_POST['email'];
	    	$phone = $_POST['phone'];
	    	$address = $_POST['address'];
	    	$industry = $_POST['industry'];
	    	$no_of_employees = $_POST['no_of_employees'];
	    	$description = $_POST['description'];
	    }

    // } else {

    	$q = $conn->prepare("UPDATE company SET name =:name, email =:email, phone =:phone, address =:address, industry =:industry, no_of_employees =:no_of_employees, description =:description");
    	$q->bindParam(':name',$name);
    	$q->bindParam(':email',$email);
    	$q->bindParam(':phone',$phone);
    	$q->bindParam(':address',$address);
    	$q->bindParam(':industry',$industry);
    	$q->bindParam(':no_of_employees',$no_of_employees);
    	$q->bindParam(':description',$description);

    	$q->execute();

    	echo "YOUR COMPANY WAS SUCCESSFULLY UPDATED";

		}else{
			echo "Sorry User Could Not Be Updated!";
		}
	
			
	?>

	

	<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" href='#modal-id'>edit</a> -->
		<div class="modal fade" id="viewUser">
			<div class="modal-dialog">
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        	<h4 class="modal-title">Edit Your Company</h4>
			      	</div>
			      	<div class="modal-bodmy">
			      		<form action="" method="POST" role="form">
				        	<div class="form-group">
				          		<label>Nae</label>
				          		<input type="text" name="name" class="form-control" id="name">
				        	</div>
				        	<div class="form-group">
				          		<label>Email</label>
			          			<input type="text" class="form-control" id="" >
			        		</div>
			        		<div class="form-group">
			          			<label>Phone</label>
			          			<input type="text" class="form-control" id="">
			        		</div>     
			       			 <div class="form-group">
			          			<label>Address</label>
			          			<input type="text" class="form-control" id="">
			          			<?php echo $row['address']; ?>
			        		</div> 
			        		<div class="form-group">
			          			<label>Industry</label>
			          			<input type="text" class="form-control" id="">
			        		</div> 
			        		<div class="form-group">
			          			<label>no_of_employees</label>
			          			<input type="text" class="form-control" id="">
			        		</div> 
			        		<div  class="form-group">
							<label>Company Description</label>
							<textarea name="description" class="form-control"  rows="5"></textarea>
						</div>
	     				</form>  
	      			</div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        			<button type="button" class="btn btn-primary">Save changes</button>
	      			</div>
	    		</div>
	  		</div>
		<script type="text/javascript">
		$('.viewUser' ).click(function() {       
		let name = $(this).data('name'); //Modal Event
		 $('name').text(name); //Fetch id from modal trigger button
		$.ajax({
		  type : 'POST',
		   url : 'query.php', //Here you will fetch records 
		   data :  'post_id='+ id, //Pass $id
		   success : function(data){
		     $('.form-data').html(data);//Show fetched data from database
		     }
		   });
		  });
		</script>  




<!-- Latest compiled and minified JS
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->