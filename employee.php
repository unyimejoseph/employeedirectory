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
				<!-- HEADER
				================================================== -->
				
					<?php
							require ('conn.php');
							
							// if (isset ($_SESSION['user_login'])) {

							// 	header('Location:login.php');	
							// }
							if (isset($_POST['submit'])) {
								if (isset($_FILES['fileToUpload'])) {
									$target_dir = "uploads/";
									if (! is_dir($target_dir)) {
							       		mkdir($target_dir, 0755);
							    	}
									$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
									$uploadOk = 1;
									$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
									// Check if image file is a actual image or fake image
								    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
								    if($check !== false) {
								        echo "File is an image - " . $check["mime"] . ".";
								        $uploadOk = 1;
								    } else {
								        echo "File is not an image.";
								        $uploadOk = 0;
								    }
									// Check if file already exists
									if (file_exists($target_file)) {
									    echo "Sorry, file already exists.";
									    $uploadOk = 0;
									}
									// Check file size
									if ($_FILES["fileToUpload"]["size"] > 500000) {
									    echo "Sorry, your file is too large.";
									    $uploadOk = 0;
									}
									// Allow certain file formats
									if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
									&& $imageFileType != "gif" ) {
									    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
									    $uploadOk = 0;
									}
									// Check if $uploadOk is set to 0 by an error
									if ($uploadOk == 0) {
									    echo "Sorry, your file was not uploaded.";
									// if everything is ok, try to upload file
									} else {
									    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
									        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
									    } else {
									        echo "Sorry, there was an error uploading your file.";
									    }
									}
								}
										
								$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
								$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
								$jobtitle = filter_var($_POST['jobtitle'], FILTER_SANITIZE_STRING);
								$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
								$bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);
								$department_id = filter_var($_POST['department_id'], FILTER_SANITIZE_STRING);

								 if ($firstname == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER YOUR FIRST NAME </h3>';
								} elseif ($lastname == '') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ENTER LAST NAME </h3>';
								}elseif ($jobtitle =='') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ADD YOUR JOB TITLE</h3>';
								}elseif ($gender =='') {
									echo '<h3 class="col-xs-3 col-xs-offset-4">CHOOSE YOUR  GENDER </h3>';
								}elseif ($bio =='') {
									echo '<h3 class="col-xs-3 col-xs-offset-4"> ADD YOUR BIO </h3>';
								}else { 
										// Check if the employee  already exist.
									$q = $conn->prepare("SELECT jobtitle FROM employee WHERE jobtitle = :jobtitle");
									$q->bindParam(':jobtitle', $jobtitle);
									$q->execute();
									$row = $q->fetch();
									if ($q->rowCount() > 0) {
										echo '<h3 class="col-xs-3 col-xs-offset-4"> EMPLOYEE ALREADY EXIST</h3>';
									}else {

									$q = $conn->prepare("INSERT INTO employee (department_id, firstname, lastname, jobtitle, gender, bio) VALUES (department_id, :firstname, :lastname, :jobtitle, :gender, :bio)");
									$q->bindParam(':firstname', $firstname);
									$q->bindParam(':lastname', $lastname);
									$q->bindParam(':jobtitle', $jobtitle);
									$q->bindParam(':gender', $gender);
									$q->bindParam(':bio', $bio);
									$q->bindParam(':department_id', $department_id);

									if ($q->execute()) {
										// redirect to companies page
										header("Location: companies.php");
									}else { 
										echo '<h3 class="col-xs-4 col-xs-offset-4"> ERROR CONNECTING TO DATABASE</h3>';
									}
								}
							}
						}


								
					?>
				
					
	 		<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
			 		<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
						<h4 class="text-center">Add New Employee</h4><hr>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="hidden" name="department_id" id="department_id">
									<input type="text" name="firstname" class="form-control" id="firstname" placeholder="" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname'] ?>">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="lastname" class="form-control" id="lastname" placeholder="" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label>Job Title</label>
									<input type="text" name="jobtitle" class="form-control" placeholder="" value="<?php if (isset($_POST['jobtitle'])) echo $_POST['jobtitle'] ?>">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label>Gender </label>
			 						<input type="text" name="gender" class="form-control" id="gender" value="<?php if (isset($_POST['jobtitle'])) echo $_POST['jobtitle'] ?>">
								</div>
							</div>
						</div>
						<!-- <div class="form-group">
							<input type="file" name="fileToUpload">
							<input type="submit" value="Upload Image" name="submit">
						</div> -->
						<div  class="form-group">
							<label>Employee Bio</label>
							<textarea name="bio" class="form-control" placeholder="Employee Bio" rows="5" value="<?php if (isset($_POST['bio'])) echo $_POST['bio'] ?>"></textarea>
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
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

		<!-- CALL hover effects -->
		<script type="text/javascript">  			

			$(document).ready(function($){				
				$('.cover').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'578'		//Horizontal position on hover
				});		    
		    });		    
</script>

<!-- CALL isotope filtering -->
<script>
$(document).ready(function(){
var $container = $('#content');
  $container.imagesLoaded( function(){
        $container.isotope({
	filter: '*',
	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
   }
});
});
$('#nav a').click(function(){
  var selector = $(this).attr('data-filter');
    $container.isotope({ 
	filter: selector,
	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
   }
  });
  return false;
});
$('#nav a').click(function (event) {
    $('a.selected').removeClass('selected');
    var $this = $(this);
    $this.addClass('selected');
    var selector = $this.attr('data-filter');
    $container.isotope({
         filter: selector
    });
    return false; // event.preventDefault()
});
});
 </script>
</body>
</html>