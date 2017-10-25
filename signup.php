<!DOCTYPE HTML>
<html>
<head>
	<title>Sign up </title>
	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- STYLES & JQUERY 
================================================== -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
		<!-- <link rel="stylesheet" type="text/css" href="css/icons.css"/> -->
		<!-- <link rel="stylesheet" type="text/css" href="css/skinblue.css"/><!-- change skin color here -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="css/responsive.css"/> -->
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

	


				<!-- <div class="container"> -->
						<div class="row">
							<div class="col-xs-6 col-xs-offset-3">
								<form method="POST" role="form" action="">
									<h4 class="text-center"> Create an Account</h4>
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" class="form-control" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ?>" placeholder=" Name">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" value="<?php if (isset($_POST['name'])) echo $_POST['email'] ?>" placeholder="Email">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<label>Confirmed Password</label>
										<input type="password" name="confirmed_password" class="form-control" placeholder="Confirmed Password">
									</div>
									<div class="">
										<button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
									</div><br>
									<p class="text-center">Already Sign Up? <a href="login.php">Login to Account</a></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>