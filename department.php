<!DOCTYPE HTML>
<html>
<head><meta name="viewport" content="width=device-width"/>
	<title>department </title>
	<!-- STYLES & JQUERY 
	================================================== -->
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
	<link rel="stylesheet" type="text/css" href="css/icons.css"/>
	<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/skinblue.css"/>change skin color -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<script src="js/jquery-1.9.0.min.js"></script><!-- the rest of the scripts at the bottom of the document -->

	</head>
	<body>
		<div class="bg">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-1">
							<a class="navbar-brand" href="index.html">emdi<span class="themecolor">rect</span>ory</a>
						</div>
						<div class="col-xs-1 col-xs-offset-10">
							<a href="logout.php"><h6>Logout</h6></a>
						</div>
					</div>

						<?php
							require ('conn.php');
							
							// if (isset ($_SESSION['user_login'])) {

							// 	header('Location:login.php');	
							// }
							if (isset($_POST['submit'])) {
								$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
								$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
								$company_id = filter_var($_POST['company_id'], FILTER_SANITIZE_STRING);

								 if ($name == '') {
									echo '<h3 class="col-xs-4 col-xs-offset-4"> ENTER YOUR DEPARTMENT\'S NAME</h3>';
								} elseif ($description == '') {
									echo '<h3 class="col-xs-4 col-xs-offset-4"> ADD IN YOUR DEPARTMENT\'S DESCRIPTION</h3>';
								}else{

										// Check if the department name already exist.
									$q = $conn->prepare("SELECT name FROM department WHERE name = :name");
									$q->bindParam(':name', $name);
									$q->execute();
									$row = $q->fetch();
									if ($q->rowCount() > 0) {
										echo '<h3 classs="col-xs-4 col-xs-offset-4"> DEPARTMENT NAME ALREADY EXIST</h3>';
									}else{

									$q = $conn->prepare("INSERT INTO department (company_id, name, description) VALUES (:company_id, :name, :description)");
									$q->bindParam(':name', $name);
									$q->bindParam(':description', $description);
									$q->bindParam(':company_id', $company_id);

									if ($q->execute()) {
										// redirect to employee page
										header("Location: employee.php");
									}else { 
										echo '<h3 class="col-xs-4 col-xs-offset-4"> ERROR CONNECTING TO DATABASE</h3>';
									}
								}
							}
						}		
					?>



	 		<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
			 		<form method="POST" role="form" action="">
						<h4 class="text-center">Add Department</h4>
						<div class="form-group">
							<label>Name</label>
							<input type="hidden" name="company_id" value="company_id">
							<input type="text" name="name" class="form-control" id="name" placeholder="Name"<?php if (isset($_POST['name'])) echo $_POST['name'] ?> ">
						</div>
						<div  class="form-group">
							<label>Department Description</label>
							<textarea name="description" class="form-control" value="<?php if (isset($_POST['description'])) echo $_POST['description'] ?>" placeholder="Department Description" rows="5"></textarea>
						</div>
						<button class="btn btn-primary" name="submit">Add Department</button>
					</form>
				</div>
			</div>

		<script src="js/jquery.js"></script>
	  	<script src="js/bootstrap.min.js"></script>

	</body>
</html>