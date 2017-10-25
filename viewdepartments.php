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

		


	<?php 

	  	require('conn.php');

	  		// QUERY FOR EDITING OF DEPARTMENT
		    if (isset($_POST['submit'])) {

		    	$name = $_POST['name'];
		    	$description = $_POST['description'];
		    	$id = $_POST['id'];

		    	$q = $conn->prepare("UPDATE department SET name =:name, description =:description WHERE id = :id");
		    $q->bindParam(':id',$id);
	    	$q->bindParam(':name',$name);
	    	$q->bindParam(':description',$description);

	    	if ($q->execute()) {
	    		echo "YOUR DEPARTMENT WAS SUCCESSFULLY UPDATED";
	    	}else{
				echo "Sorry User Could Not Be Updated!";
			}

		}
					    
		$q = $conn->prepare("SELECT * FROM department ORDER BY id ASC");
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

		        $q =$conn->prepare("SELECT * FROM department WHERE name LIKE :searchq");
		        $q->bindParam(":searchq",$searchq);
		        $q->execute();

		        $count = $q->rowCount();
		         if($count == 0) {
		                   echo 'No results found.';
		                } else {
		                    while($row = $q->fetch()) {
		                        $Name = $row['name'];
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
						<th class="col-xs-1">ID</th>
						<th class="col-xs-2">Name</th>
						<th class="col-xs-6">Description</th>
						<th colspan ="3">Activity</th>
						<!-- <th></th> -->
						<!-- <th></th> -->
					</tr>
				</div>
			</div>
		

	<?php

			foreach ($row as $value) {
				echo "<tr>";
				echo '<td>'. $value['id']. '</td>';
				echo '<td>'. $value['name']. '</td>';
				echo '<td>'. $value['description']. '</td>';
				?>

				<!-- VIEW EMPLOYEES -->
				<td><a href="viewemployees.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">View Employees</a> 

	 			<!-- EDIT DEPARTMENTS-->
	 			<td>
				<a data-toggle="modal" href="#editUser" class="btn btn-info editUser" data-name="<?php echo $value['name']; ?>" data-description="<?php echo $value['description']; ?>" id="<?php echo $value['id']; ?>"> Edit</a>
				
				<!-- DELETE DEPARTMENT -->
				<td>
				<a data-toggle="modal" href="#deleteUser" class="btn btn-danger deleteUser"> Delete</a> 
		
				<?php
				echo "</tr>";	
				}
				echo "</table>";

			} else {
				echo "no result found";
		}


	    	
		 // <!-- QUERY FOR DELETING DEPARTMENT -->	
			 if (isset($_POST['delete'])) {
			    	$name = $_POST['name'];
			    	$description = $_POST['description'];
			    	$id = $_POST['id'];

			    	$q = $conn->prepare("DELETE FROM department WHERE id =:id");
		    	
		    	$q->bindParam(':id',$id);

		    	if ($q->execute()) {
		    		echo "DEPARTMENT DELETED SUCCESSFULLY";
		    	}else{
					echo "SORRY ERROR DELETING DEPARTMENT!";
				}

			}
			// <!-- ENDOF QUERY FOR DELETING DEPARTMENT -->
		?>



		<!-- MODAL FOR DELETING DEPARTMENT -->
			<div class="modal fade" id="deleteUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<!-- <h4 class="modal-title">Edit Your Company</h4> -->
				      	</div>
				      	<div class="modal-body">
				      		<h5 class="text-center">Are You Sure You Want to Delete Your DEPARTMENT</h5>
				      	</div>
				      	<div class="modal-footer">
				      		<div class="col-xs-4 col-xs-offset-4">
			        			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			        			<button type="submit" name="delete" class="btn btn-primary">Yes</button>
			      			</div>
			      		</div>
		    		</div>
		  		</div>
		  	</div><!-- ENDOF MODAL FOR DELETING DEPARTMENT -->

		


		<!-- MODAL FOR EDITING DEPARTMENT -->
			<div class="modal fade" id="editUser">
				<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        	<h4 class="modal-title">Edit Your Department</h4>
				      	</div>
				      	<form action="" method="POST" role="form">
				      		<div class="modal-body">
				      		<input type="hidden" name="id" id="company_id">
					        	<div class="form-group">
					          		<label>Name</label>
					          		<input type="text" name="name" class="form-control" id="name">
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
			let description = $(this).data('description');
			let id = $(this).attr('id');

			$('#company_id').val(id);
			$('#name').val(name); 	//Fetch name from modal trigger button
			$('#description').val(description);

		 });
		</script> 
		 
		include('footer.php');
