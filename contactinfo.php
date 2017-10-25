<!DOCTYPE HTML>
<html>
<head><meta name="viewport" content="width=device-width"/>
	<title>employee </title>
<!-- STYLES & JQUERY 
================================================== -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
		<link rel="stylesheet" type="text/css" href="css/icons.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="css/skinblue.css"/><! change skin color here --> 
		<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<script src="js/jquery-1.9.0.min.js"></script><!-- the rest of the scripts at the bottom of the document -->

			
	</head>
				<body>
				
					<?php
				
						require('conn.php');

						// if (isset($_SESSION['user_login'])) {
						// 	header('Location:login.php');
						// }
						// 
						
						//check if the user has registered
						if (isset($_POST['submit'])) {
							$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
							$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
							$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
							$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
							$confirmed_password = filter_var($_POST['confirmed_password'], FILTER_SANITIZE_STRING);

							if ($firstname =='') {
								echo '<h3 class="col-xs-4 col-xs-offset-4">ADD FIRST NAME</h3>';

								}elseif ($lastname =='') {
									echo '<h3 class="col-xs-4 col-xs-offset-4">ADD LAST NAME</h3>';

								}elseif ($email =='') {
									echo '<h3 class="col-xs-4 col-xs-offset-4">ADD YOUR EMAIL ADDRESS</h3>';

								}elseif ($password =='') {
									echo '<h3 class="col-xs-4 col-xs-offset-4">INCLUDE YOUR PASSWORD</h3>';


								}elseif ($confirmed_password =='') {
									echo '<h3 class="col-xs-4 col-xs-offset-4">CONFIRMED YOUR PASSWORD</h3>';

								}elseif ($password != $confirmed_password)  {
									echo '<h3 class="col-xs-3 col-xs-offset-4">YOUR PASSWORD DO NOT MATCH</h3>';

								} elseif (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
										echo '<h3 class="col-xs-4 col-xs-offset-4">YOUR EMAIL ADDRESS IS INVALID</h3>';

								} else {

									// Check if the user has already registered or if the user already exist  
									$q = $conn->prepare("SELECT email FROM users WHERE email = :email");
									$q->bindParam(':email', $email);
									$q->execute();
									$row = $q->fetch();
									if ($q->rowCount() > 0) {
										echo '<h3 class="col-xs-4 col-xs-offset-4"> YOUR ARE ALREADY REGISTERED </h3>';
									}else{
									//end of check

									//password hashing
									$hash_password = password_hash($password, PASSWORD_DEFAULT);
									     
									$q = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :hash_password)");
										//bind parameters to handle sql injection
										$q->bindParam(':firstname', $firstname);
										$q->bindParam(':lastname', $lastname);
										$q->bindParam(':email', $email);
										$q->bindParam(':hash_password', $hash_password);

										if ($q->execute()) {
											//redirect to login page
											header("Location: dashboard.php");
											}

										 else { 
											echo '<h3 class="col-xs-4 col-xs-offset-4"> ERROR CONNECTING TO DATABASE</h3>';
										}
									}
								}
							}
						?>
					
					</div>
				</div>
			</div>
		</div> 
	</div>

			<!-- <div class="boxedtheme"> -->
				<!-- TOP LOGO & MENU
				================================================== -->
				<div class="grid">
					<div class="row ">
						<!--Logo-->
						<div class="col-xs-1">
							<a href="index.html"><h1>directory</h1></a>
						</div>
						<div class="col-xs-1 col-xs-offset-10">
							<h6 class="logout"><a href="logout.php"> Logout</a></h6>
						</div>
					</div>
				</div>		
	 		<div class="row">
				<div class="col-xs-4 col-xs-offset-3">
			 		<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
						<h4 class="text-center">Add Employee's Contact Info</h4><hr>
						<div class="form-group">
							<label>Phone</label>
							<input type="hidden" name="employee_id" id="employee_id">
							<input type="text" name="phone" class="form-control" id="phone" placeholder="" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>">
						</div>
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" placeholder="" value="<?php if (isset($_POST['address'])) echo $_POST['address'] ?>">
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Add Contact</button>
					</form>
				</div>
			</div>
		</div>

			<!-- JAVASCRIPTS
		================================================== -->
		<!-- all -->
		<script src="js/modernizr-latest.js"></script>

		<!-- menu & scroll to top -->
		<script src="js/common.js"></script>

		<!-- cycle -->
		<script src="js/jquery.cycle.js"></script>

		<!-- twitter -->
		<script src="js/jquery.tweet.js"></script>

		<!-- filtering -->
		<script src="js/jquery.isotope.min.js"></script>

		<!-- hover effects -->
		<script type="text/javascript" src="js/mosaic.1.0.1.min.js"></script>

</body>
</html>