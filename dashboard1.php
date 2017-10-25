<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>directory</title>
	
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
		<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

		<!-- [ PLUGIN STYLESHEET ]
	        =========================================================================================================================--> 
		<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
		<!-- [ Boot STYLESHEET ]
	        =========================================================================================================================-->
		<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
	        <!-- [ DEFAULT STYLESHEET ] 
	        =========================================================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
	        <link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="css/color/rose.css">
			<script src="vegas/js/jquery.min.js"></script>
		  	<script src="bootstrap/js/bootstrap.js"></script>
        
</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->	
   <!--  <div class="preloader">
    <div class="loader theme_background_color">
        <span></span>
      
    </div>
</div> -->
<!-- [ /PRELOADER ]
=================================================================================== -->
	</head>
	<style type="text/css">

	body{
		margin-top: 10px;
		background: #FFF;
	}
	.navbar-fixed-top {
		height:  60px;
	}
	
	.container-fluid {
		border: 1px solid #222;
		margin-top: 20px;
		}

	.jumbotron {
		background: #fff;
		border: 1px solid #ccc;
	}

	.nav-stacked {
		margin-top: 60px;
		background: #286090;
		padding-top: 0px;
	}

	.nav-stacked a {
		font-size: 15px;
	}

	hr {
		padding: 0px;
	}

	.panel-default {
		/* width: 350px; */
		padding-top: 6px;
		margin: 15px 0px;
		/* background: #286090; */
	}
	.panel-heading{
		border: 2px;
		background: #222;
		height: 90px;
		/* padding-top: 1px; */
	}
	.panel-footer {
		background: #286090;
		color: #ccc;
		height: 70px;
		padding-bottom: 30px;
		padding-top: 20px; 
	}

	.panel-footer:hover {
		background: #ccc;

	}

	h1 {
		margin-top: 60px;
		text-align: center;
	}

	a {
		color: #fff;
	}

	a:hover {
		color: #286090;
		background: #fff;
		text-decoration: none;
	}

	p {
		font-size: 16px;
	}

	
	

	

	</style>
<body>
		 <?php

			session_start();

			if(isset($_SESSION['user_login'])) { 
				// header('location: login.ph    p');
				echo $_SESSION['user_login'];
			}
		?>
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 <a class="navbar-brand" href="index.html">emdi<span class="themecolor">rect</span>ory</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">			
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"> Logout</a></li>
					 <!-- <li><a href="#"><span class="glyphicon glyphicon-tasks"> Dashboard</span></a></li> -->
					<!-- <li><a href="#"><span class="text-right"> Messages</span></a></li> -->
				</ul>

			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
		<h1>DASHBOARD</h1>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-3">
					<div class="panel-default">
						<div class="panel-heading">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#"></a></li>
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">ADD NEW <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="company.php">Company</a></li>
										<li><a href="department.php">Department</a></li>
										<li><a href="employee.php">Employees</a></li>
										<li><a href="jobs.php">Jobs</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- <div class="panel-footer">

						</div> -->
						<div class="panel-footer">
							<a href=""><h5>VIEW PROFILE</h5></a>
						</div>
						<div class="panel-footer">
							<a href=""><h5>CONTACT INFO</h5></a>
						</div>
						<div class="panel-footer">
							<a href=""><h5>SOCIAL LINKS</h5></a>
						</div>
						<div class="panel-footer">
							<a href=""><h5>JOBS</h5></a>
						</div>
						<div class="panel-footer">
							<a href=""><h5>ACTIVITY LOG</h5></a>
						</div>
					</div>
				</div>
				<div class="col-xs-8">
					<div class="panel panel-default" style="margin-top: 20px; padding: 2px;">
					  	<div class="panel-heading" style="padding: 0px;">
					  		<div class="button">
					  			<div class="btn btn-primary btn-lg">DEPARTMENTS</div>
					  			<div class="btn btn-primary btn-lg">EMPLOYEES</div>
					  			<div class="btn btn-primary btn-lg">JOBS</div>
					  			<div class="btn btn-primary btn-lg">CALENDAR</div>
					  		</div>
						</div>
						<div class="row">
							<div class="">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<table>
									<tr>
										<th>Sun</th>
										<th>Mon</th>
										<th>Tue</th>
										<th>Wed</th>
										<th>Thur</th>
										<th>Fri</th>
										<th>Sat</th>
									</tr>
								</table>
						
		</div>


		<!-- [ DEFAULT SCRIPT ] -->
	<script src="library/modernizr.custom.97074.js"></script>
	<script src="library/jquery.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	
	<!-- [ PLUGIN SCRIPT ] -->
        <script src="library/vegas/vegas.min.js"></script>
	<script src="js/plugins.js"></script>
        <!-- [ TYPING SCRIPT ] -->
         <script src="js/typed.js"></script>
         <!-- [ COUNT SCRIPT ] -->
         <script src="js/fappear.js"></script>
       <script src="js/jquery.countTo.js"></script>
	<!-- [ SLIDER SCRIPT ] -->  
        <script src="js/owl.carousel.js"></script>
         <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        
        <!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>
  
	</body>
</html>
				

