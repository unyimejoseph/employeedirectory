<!DOCTYPE HTML>
<html>
<head>
	<title>login </title>
	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- STYLES & JQUERY 
================================================== -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
		<link rel="stylesheet" type="text/css" href="css/icons.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="css/skinblue.css"/>change skin color here -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<script src="js/jquery-1.9.0.min.js"></script><!-- the rest of the scripts at the bottom of the document -->

	  
</head>
<body>
	<body>
		<div class="bg">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<a class="navbar-brand" href="index.html">emdi<span class="themecolor">rect</span>ory</a>
						</div>
					</div>
			

					<?php
							require ('conn.php');

							if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {
								header('location: dashboard.php');
							}

							if (isset($_POST['login'])) {
								$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
								$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

									if ($email =='') {
									 	echo '<h3 class="col-xs-4 col-xs-offset-4">ENTER YOUR EMAIL ADDRESS</h3>';
									}elseif ($password =='') {
										echo '<h3 class="col-xs-4 col-xs-offset-4">ENTER YOUR PASSWORD</h3>';
									
									}else{


									$q = $conn->prepare("SELECT * FROM users WHERE email = :email");
									$q->bindParam(':email', $email);
									$q->execute();

									if ($q->rowCount() > 0) { 
										$row = $q->fetch();
										$account_password = $row['password'];
										$pwd = crypt($password, $account_password);

									if ($pwd == $account_password) {
										$_SESSION['user_login'] = $email;
										header('Location:dashboard.php');
									}else{
										echo '<h3 class="col-xs-4 col-xs-offset-4">YOUR PASSWORD IS INCORRECT</h3>';
									}
										
									}else{
										echo '<h3 class="col-xs-4 col-xs-offset-3">YOUR EMAIL ADDRESS IS INCORRECT</h3>';
									}
									
									
								}
							}
						
						?>

		
					<div class="row">
						<!-- <div class="pull-right"><a href="logout.php"><h4>Logout</h4></a></div> -->
						<div class="col-xs-6 col-xs-offset-4">
							<form method="POST" role="form" action="">
								<h5 class="text-center">Login to your Account</h5><hr>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="Email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<div class="row">
									<div class="col-xs-5">
										<!-- <input type="checkbox" name="remember" value=""> Remember Me -->
									</div>
									<!-- <p class="pull-right"><a href="">Forgot Password?</a></p>  -->
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
									<p class="text-center" style="margin-top: 20px">Not Yet Registered? <a href="signup.php">Sign Up Here</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
