	<!DOCTYPE html>
	<html>
	<head>
		<title>companies</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		
		<style type="text/css">
			.container {
				width: 100%;
			}

			.table {
				border: 2px solid #286090;
			}

			th {
				background: #ccc;
				border: 2px solid white;
			}
			h3 {
				background: #222;
				height: 50px;
				margin-bottom: 0px;
				padding-top: 10px;
				color: #fff;
				font-size: 20px;
				padding-left: 30px;
				margin-top: 0px;
			}
			#searchform {
				margin-top: 100px;
				margin-left: 400px;
				margin-bottom: 2px;
			}

			input {
				padding: 8px;
			}
		</style>
	</head>
	<body>

		

	<?php 

	  	require('conn.php');

	  		// QUERY FOR EDITING OF COMPANY
		    if (isset($_POST['submit'])) {

		    	$name = $_POST['name'];
		    	$email = $_POST['email'];
		    	$phone = $_POST['phone'];
		    	$address = $_POST['address'];
		    	$industry = $_POST['industry'];
		    	$no_of_employees = $_POST['no_of_employees'];
		    	$description = $_POST['description'];
		    	$id = $_POST['id'];

		    	$q = $conn->prepare("UPDATE company SET name =:name, email =:email, phone =:phone, address =:address, industry =:industry, no_of_employees =:no_of_employees, description =:description WHERE id = :id");
	    	$q->bindParam(':name',$name);
	    	$q->bindParam(':id',$id);
	    	$q->bindParam(':email',$email);
	    	$q->bindParam(':phone',$phone);
	    	$q->bindParam(':address',$address);
	    	$q->bindParam(':industry',$industry);
	    	$q->bindParam(':no_of_employees',$no_of_employees);
	    	$q->bindParam(':description',$description);

	    	if ($q->execute()) {
	    		echo "YOUR COMPANY WAS SUCCESSFULLY UPDATED";
	    	}else{
				echo "Sorry User Could Not Be Updated!";
			}

		}
					    
		$q = $conn->prepare("SELECT * FROM company ORDER BY id ASC");
			$q->execute();

			if ($q->rowCount() > 0) {
			$row = $q->fetchALL();


	?>

		<!-- SEARCH FORM -->
	         <form  method="post" action=""  id="searchform"> 
	            <input  type="text" name="name" size="60"  placeholder="Search for company by name"> 
	            <input  type="submit" name="search" value="Search"> 
	        </form>
	    <!-- END SEARCH FORM  -->

	        <?php
	    // QUERY FOR COMPANY SEARCH
			if(isset($_POST['search'])) {
		        $searchq = $_POST['search'];
		        $searchq = preg_replace ("#[^0-9a-z]#i","",$searchq);
		        
		        }

		        $q =$conn->prepare("SELECT * FROM company WHERE name LIKE :searchq");
		        $q->bindParam(":searchq",$searchq);
		        $q->execute();

		        $count = $q->rowCount();
		         if($count == 0) {
		                   echo '.';
		                } else {
		                    while($row = $q->fetch()) {
		                        $Name = $row['name'];
		                        $id = $row['id'];

		                      echo '<tr><td><a id=' .$id. '" onclick="document.();">'.$Name.'</a></td><td>';
		                    }
		                }
		            $company_count = 0;
		        ?>
		    <!--  END OF SEARCH -->


		<!-- TABLE -->
			<div class="container">
				<div class="col-xs-10 col-xs-offset-1">
					<h3>List of companies</h3>
					<table class="table table-bordered table hover" id="tab-logic">
					<tr>
						<th class="col-xs-1">S/N</th>
						<th class="col-xs-4">Name</th>
						<th class="col-xs-4">Email</th>
						<th colspan ="3">Activity</th>
						<!-- <th></th> -->
						<!-- <th></th> -->
					</tr>
				</div>
			</div>
		<!-- END TABLE -->
		

	<?php

			foreach ($row as $value) {
				echo "<tr>";
				echo '<td>'. ++$company_count. '</td>';
				echo '<td>'. $value['name']. '</td>';
				echo '<td>'. $value['email']. '</td>';
				?>

				<!-- VIEW COMPANY -->
				<td><a href="viewcompany.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">View</a> 

	 			<!-- EDIT COMPANY-->
	 			<td>
				<a data-toggle="modal" href="#editUser" class="btn btn-info editUser" data-name="<?php echo $value['name']; ?>" data-email="<?php echo $value['email']; ?>" data-phone="<?php echo $value['phone']; ?>" data-address="<?php echo $value['address']; ?>" data-industry="<?php echo $value['industry']; ?>" data-no_of_employees="<?php echo $value['no_of_employees']; ?>" data-description="<?php echo $value['description']; ?>" id="<?php echo $value['id']; ?>"> Edit</a>
				
				<!-- DELETE COMPANY -->
				<td>
				<a data-toggle="modal" href="#deleteUser" class="btn btn-danger deleteUser"> Delete</a> 
		
				<?php
				echo "</tr>";	
				}
				echo "</table>";

			} else {
				echo "no result found";
			}


	    	
		 // <!-- QUERY FOR DELETING COMPANY -->	
			 if (isset($_POST['delete'])) {
			    	$name = $_POST['name'];
			    	$email = $_POST['email'];
			    	$phone = $_POST['phone'];
			    	$address = $_POST['address'];
			    	$industry = $_POST['industry'];
			    	$no_of_employees = $_POST['no_of_employees'];
			    	$description = $_POST['description'];
			    	$id = $_POST['id'];

			    	$q = $conn->prepare("DELETE FROM company WHERE company id =:id");
		    	
		    	$q->bindParam(':id',$id);

		    	if ($q->execute()) {
		    		echo "COMPANY DELETED SUCCESSFULLY";
		    	}else{
					echo "SORRY ERROR DELETING COMPANY!";
				}

			}
			// <!-- ENDOF QUERY FOR DELETING COMPANY -->
		?>



		<!-- MODAL FOR DELETING COMPANY -->
			<div class="modal fade" id="deleteUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<!-- <h4 class="modal-title">Edit Your Company</h4> -->
				      	</div>
				      	<div class="modal-body">
				      		<h5 class="text-center">Are You Sure You Want to Delete Your Company</h5>
				      	</div>
				      	<div class="modal-footer">
				      		<div class="col-xs-4 col-xs-offset-4">
			        			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			        			<button type="submit" name="delete" class="btn btn-primary">Yes</button>
			      			</div>
			      		</div>
		    		</div>
		  		</div>
		  	</div><!-- ENDOF MODAL FOR DELETING COMPANY -->

		


		<!-- MODAL FOR EDITING COMPANY -->
			<div class="modal fade" id="editUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<h4 class="modal-title">Edit Your Company</h4>
				      	</div>
				      	<form action="" method="POST" role="form">
				      		<div class="modal-body">
				      		<input type="hidden" name="id" id="user_id">
					        	<div class="form-group">
					          		<label>Name</label>
					          		<input type="text" name="name" class="form-control" id="name">
					        	</div>
					        	<div class="form-group">
					          		<label>Email</label>
				          			<input type="text" name="email" class="form-control" id="email" >
				        		</div>
				        		<div class="form-group">
				          			<label>Phone</label>
				          			<input type="text" name="phone" class="form-control" id="phone">
				        		</div>     
				       			 <div class="form-group">
				          			<label>Address</label>
				          			<input type="text" name="address" class="form-control" id="address">
				        		</div> 
				        		<div class="form-group">
				          			<label>Industry</label>
				          			<input type="text" name="industry" class="form-control" id="industry">
				        		</div> 
				        		<div class="form-group">
				          			<label>No_of_Employees</label>
				          			<input type="text" name="no_of_employees" class="form-control" id="no_of_employees">
				        		</div> 
				        		<div  class="form-group">
									<label>Company Description</label>
									<textarea name="description" class="form-control"  rows="5" id="description"></textarea>
								</div> 
		      				</div>
			      			<div class="modal-footer">
			        			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        			<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
			      			</div>
			     		</form> 
		    		</div>
		  		</div>
		  	</div>
		<!-- ENDOF MODAL FOR EDITING COMPANY -->


	 		
	  		
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$('.editUser' ).click(function() {       
			let name = $(this).data('name');	 //Modal Event
			let	email = $(this).data('email');
			let phone = $(this).data('phone');
			let address = $(this).data('address');
			let industry = $(this).data('industry');
			let no_of_employees = $(this).data('no_of_employees');
			let description = $(this).data('description');

			let id = $(this).attr('id');

			$('#user_id').val(id);

			$('#name').val(name); 	//Fetch name from modal trigger button
			$('#email').val(email);
			$('#phone').val(phone);
			$('#address').val(address);
			$('#industry').val(industry);
			$('#no_of_employees').val(no_of_employees);
			$('#description').val(description);

		 });
		</script> 


	</body>
</html>


		<!--  
		include('footer.php');
 -->