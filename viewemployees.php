	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
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
				height: 30px;
				margin-bottom: 0px;
				padding-top: 5px;
				color: #fff;
				font-size: 20px;
				padding-left: 30px;
			}
		</style>
	</head>
	<body>

		

	</body>
	</html>


	<?php 

	  	require('conn.php');

	  		// QUERY FOR EDITING OF DEPARTMENT
		    if (isset($_POST['submit'])) {

		    	$firstname = $_POST['firstname'];
		    	$lastname = $_POST['lastname'];
		    	$jobtitle = $_POST['jobtitle'];
		    	$gender = $_POST['gender'];
		    	$bio = $_POST['bio'];
		    	$id = $_POST['id'];

		    	$q = $conn->prepare("UPDATE employee SET firstname =:firstname, lastname =:lastname, jobtitle =:jobtitle, gender =:gender, bio =:bio WHERE id = :id");
		    $q->bindParam(':id',$id);
	    	$q->bindParam(':firstname',$firstname);
	    	$q->bindParam(':lastname',$lastname);
	    	$q->bindParam(':jobtitle',$jobtitle);
	    	$q->bindParam(':gender',$gender);
	    	$q->bindParam(':bio',$bio);

	    	if ($q->execute()) {
	    		echo "EMPLOYEE HAS BEEN SUCCESSFULLY UPDATED";
	    	}else{
				echo "SORRY COULD NOT UPDATE!";
			}

		}
					    
		$q = $conn->prepare("SELECT * FROM employee ORDER BY id ASC");
			$q->execute();

			if ($q->rowCount() > 0) {
			$row = $q->fetchALL();


	?>




			<!-- SEARCH FORM -->
	         <form  method="post" action=""  id="searchform"> 
	            <input  type="text" name="name" placeholder="Search for department by name"> 
	            <input  type="submit" name="search" value="Search"> 
	        </form> 



	    <?php



	        	// QUERY FOR DEPARTMENT SEARCH
			if(isset($_POST['search'])) {
		        $searchq = $_POST['search'];
		        $searchq = preg_replace ("#[^0-9a-z]#i","",$searchq);
		        
		        }

		        $q =$conn->prepare("SELECT * FROM employee WHERE name LIKE :searchq");
		        $q->bindParam(":searchq",$searchq);
		        $q->execute();

		        $count = $q->rowCount();
		         if($count == 0) {
		                   echo 'No results found.';
		                } else {
		                    while($row = $q->fetch()) {
		                        $firstname = $row['firstname'];
		                        $lastname= $row['lastname'];
		                        $gender = $row['gender'];
		                        $jobtitle = $row['jobtitle'];
		                        $id = $row['id'];

		                      echo '<tr><td><a id=' .$id. '" onclick="document.();">'.$Name.'</a></td><td>';
		                    }
		                }
		    ?>
		        <!-- END OF DEPARTMENT SEARCH -->

		        


			<div class="container">
				<div class="col-xs-10 col-xs-offset-1">
				<h3>List of Departments</h3>
					<table class="table table-bordered table hover" id="tab-logic">
					<tr>
						<th class="col-xs-2">image of employees</th>
						<th class="col-xs-2">First Name</th>
						<th class="col-xs-2">Last Name</th>
						<th class="col-xs-1">Gender</th>
						<th class="col-xs-2">Jobtitle</th>
						<th colspan="3">Activity</th>
						<!-- <th></th> -->
					</tr>
				</div>
			</div>
		

	<?php

			foreach ($row as $value) {
				echo "<tr>";
				echo '<td>'. $value;
				echo '<td>'. $value['firstname']. '</td>';
				echo '<td>'. $value['lastname']. '</td>';
				echo '<td>'. $value['gender']. '</td>';
				echo '<td>'. $value['jobtitle']. '</td>';
				?>

				<!-- VIEW EMPLOYEES -->
				<td><a href="viewemployee.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">View</a> 

	 			<!-- EDIT EMPLOYEE-->
	 			<td>
				<a data-toggle="modal" href="#editUser" class="btn btn-info editUser" data-firstname="<?php echo $value['firstname']; ?>" data-lastname="<?php echo $value['lastname']; ?>" data-gender="<?php echo $value['gender']; ?>" data-jobtitle="<?php echo $value['jobtitle']; ?>" data-bio="<?php echo $value['bio']; ?>" id="<?php echo $value['id']; ?>"> Edit</a>
				
				<!-- DELETE EMPLOYEE -->
				<td>
				<a data-toggle="modal" href="#deleteUser" class="btn btn-danger deleteUser"> Delete</a> 
		
				<?php
				echo "</tr>";	
				}
				echo "</table>";

			} else {
				echo "no result found";
		}


	    	
		 // <!-- QUERY FOR DELETING EMPLOYEE -->	
			 if (isset($_POST['delete'])) {
			    	$firstname = $_POST['firstname'];
			    	$lastname = $_POST['lastname'];
			    	$lastname = $_POST['gender'];
			    	$lastname = $_POST['jobtitle'];
			    	$id = $_POST['id'];

			    	$q = $conn->prepare("DELETE FROM employee WHERE id =:id");
		    	
		    	$q->bindParam(':id',$id);

		    	if ($q->execute()) {
		    		echo "DEPARTMENT DELETED SUCCESSFULLY";
		    	}else{
					echo "SORRY ERROR DELETING DEPARTMENT!";
				}

			}
			// <!-- ENDOF QUERY FOR DELETING EMPLOYEE -->
		?>



		<!-- MODAL FOR DELETING EMPLOYEE -->
			<div class="modal fade" id="deleteUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<!-- <h4 class="modal-title">Edit Your Company</h4> -->
				      	</div>
				      	<div class="modal-body">
				      		<h5 class="text-center">Are You Sure You Want to Delete Employee</h5>
				      	</div>
				      	<div class="modal-footer">
				      		<div class="col-xs-4 col-xs-offset-4">
			        			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			        			<button type="submit" name="delete" class="btn btn-primary">Yes</button>
			      			</div>
			      		</div>
		    		</div>
		  		</div>
		  	</div><!-- ENDOF MODAL FOR DELETING EMPLOYEE -->

		


		<!-- MODAL FOR EDITING EMPLOYEE -->
			<div class="modal fade" id="editUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<h4 class="modal-title">Edit Employee</h4>
				      	</div>
				      	<form action="" method="POST" role="form">
				      		<div class="modal-body">
				      		<input type="hidden" name="id" id="department_id">
					        	<div class="form-group">
					          		<label>First Name</label>
					          		<input type="text" name="firstname" class="form-control" id="firstname">
					        	</div>
					        	<div class="form-group">
					          		<label>Last Name</label>
					          		<input type="text" name="lastname" class="form-control" id="lastname">
					        	</div>
					        	<div class="form-group">
					          		<label>Gender</label>
					          		<input type="text" name="gender" class="form-control" id="gender">
					        	</div>
					        	<div class="form-group">
					          		<label>Jobtitle</label>
					          		<input type="text" name="jobtitle" class="form-control" id="jobtitle">
					        	</div>
				        		<div  class="form-group">
									<label>Bio</label>
									<textarea name="bio" class="form-control"  rows="5" id="bio"></textarea>
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
		<!-- ENDOF MODAL FOR EDITING EMPLOYEE-->


	 		
	  		
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$('.editUser' ).click(function() {       
			let firstname = $(this).data('firstname');	 //Modal Event
			let lastname = $(this).data('lastname');
			let gender = $(this).data('gender');
			let jobtitle = $(this).data('jobtitle');
			let bio = $(this).data('bio');
			let id = $(this).attr('id');

			$('#department_id').val(id);
			$('#firstname').val(firstname); 	//Fetch name from modal trigger button
			$('#lastname').val(lastname);
			$('#gender').val(gender);
			$('#jobtitle').val(jobtitle);
			$('#bio').val(bio);

		 });
		</script> 
		 
		include('footer.php');
