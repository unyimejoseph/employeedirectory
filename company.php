<!DOCTYPE HTML>
<html>
<head><meta name="viewport" content="width=device-width"/>
	<title>company</title>
		<!-- STYLES & JQUERY 
		================================================== -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
		<link rel="stylesheet" type="text/css" href="css/icons.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/skinblue.css"/><!-- Change skin color here -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<script src="js/jquery-1.9.0.min.js"></script><!-- scripts are at the bottom of the document -->

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
								$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
								$phone =  filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
								$address =  filter_var($_POST['address'], FILTER_SANITIZE_STRING);
								$no_of_employees =  filter_var($_POST['no_of_employees'], FILTER_SANITIZE_STRING);
								$industry =  filter_var($_POST['industry'], FILTER_SANITIZE_STRING);
								$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
								$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);


								 if ($name == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER NAME</div>';
									echo $name;

								} elseif ($email == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER YOUR EMAIL ADDRESS</div>';
								} elseif ($phone == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER YOUR PHONE NUMBER</h3>';
								} elseif ($address == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER YOUR ADDRESS</h3>';
								} elseif ($industry == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> CHOOSE INDUSTRY</h3>';
								} elseif ($no_of_employees == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> CHOOSE NO OF EMPLOYEES</h3>';
								} elseif ($description == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> DECRIBE YOUR COMPANY</h3>';
								}else{
										// Check if the company name already exist.
									$q = $conn->prepare("SELECT name FROM company WHERE name = :name");
									$q->bindParam(':name', $name);
									$q->execute();
									$row = $q->fetch();
									if ($q->rowCount() > 0) {
										echo '<h3 classs="col-xs-4 col-xs-offset-4"> COMPANY NAME ALREADY EXIST</h3>';
									}else{

									$q = $conn->prepare("INSERT INTO company (user_id, name, email, phone, address, industry, no_of_employees, description) VALUES (:user_id, :name, :email, :phone, :address, :industry, :no_of_employees, :description)");
									$q->bindParam(':name', $name);
									$q->bindParam(':email', $email);
									$q->bindParam(':phone', $phone);
									$q->bindParam(':address', $address);
									$q->bindParam(':industry', $industry);
									$q->bindParam(':no_of_employees', $no_of_employees);
									$q->bindParam(':description', $description);
									$q->bindParam(':user_id', $user_id);

									if ($q->execute()) {
										// redirect to department page
										header("Location: department.php");
									}else { 
										echo '<h3 class="col-xs-3 col-xs-offset-4"> ERROR CONNECTING TO DATABASE</h3>';
									}
								}
							}
						}
								
					?>

					
	
 
			 		<div class="row">
						<div class="col-xs-7 col-xs-offset-3">
					 		<form method="POST" role="form" action="">
								<h4 class="text-center">Add Your Company Account</h4>
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label>Name</label>
											<input type="hidden" name="user_id" id="user_id">
											<input type="text" name="name" class="form-control" id="name" placeholder="" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ?> ">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label>Phone</label>
											<input type="phone" name="phone" class="form-control" placeholder="" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Address</label>
											<input type="text" name="address" class="form-control" placeholder="" value="<?php if (isset($_POST['address'])) echo $_POST['address'] ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label>Industry</label>
											<select class="form-control" id="industry" name="industry" value="<?php if (isset($_POST['industry'])) echo $_POST['industry'] ?>">
												<option></option>
										        <option>Avertising/Media/Publishing</option>
										        <option>Banking</option>
										        <option>Chemical/Agric</option>
										        <option>Computer Technology</option>
										        <option>Construction</option>
										        <option>Corporate</option>
										        <option>Education</option>
										        <Option>Entertainment</OPTION>
										        <option>Fanancial institution</option>
										        <option>Healthcare</option>
										        <option>Insurance</option>
										        <option>Manufacturing</option>
										        <option>Petroleum</option>
										        <option>Pharmacy</option>
										        <option>Telecommunication</option>
										        <option>Transportation and Logistics</option>
										        <option>Travel</option>
									      	</select>
									    </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>No of Employees</label>
											<select class="form-control" id="no_of_employees" name="no_of_employees" value="<?php if (isset($_POST['no_of_employees'])) echo $_POST['no_of_employees'] ?>">
												<option></option>
										        <option>10</option><option>12</option>
										        <option>15</option><option>18</option>
										        <option>20</option><option>21</option>
										        <option>25</option><option>28</option>
										        <option>30</option><option>35</option>
										        <option>36</option><option>38</option>
										        <option>40</option><option>45</option>
										        <option>50</option><option>55</option>
										        <option>58</option><option>60</option>
									      </select>
										</div>
									</div>
								</div>
								
								<div  class="form-group">
									<label>Company Description</label>
									<textarea name="description" class="form-control" value="<?php if (isset($_POST['description'])) echo $_POST['description'] ?>" placeholder="Company Description" rows="5"></textarea>
								</div>
								<div class="button">
									<button class="btn btn-primary" name="submit">Add Company</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>