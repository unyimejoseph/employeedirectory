<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	</head>

			
			<?php
		// 			$file = $_FILES['image']['tmp_name'];
		// 			if (!isset($file)) {
		// 				echo "please select image";
		// 			}
		// 			else{

		// 			$image_check = getimagesize($FILES['image']['tmp_name']);
		// 			if ($image_check==false) {
		// 				echo "Not a Valid Image";
		// 			}else{
		// 			$image = file_get_contents($FILES['image']['tmp_name']);
		// 			$image_name = $FILES['image']['name'];
		// 			if ($q = $conn->prepare("INSERT INTO imageupload VALUES(1, '$image_name', $image) ")) {
		// 				echo 'successful';
		// 			}else{
		// 				echo mysql_error();
		// 		}
		// 	}
		// }

					if (isset($_POST['submit'])) {
						$target_dir = "/uploads/";
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
					        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					    } else {
					        echo "Sorry, there was an error uploading your file.";
					    }
					}
				
			?>

			<body>
		<div class="container">
			<div class="jumbotron">
				<div class="row">
					<div class="col-xs-4">
						<form action="employee.php" method="POST" enctype="multipart/form-data">
						   <input type="file" name="fileToUpload">
						   <input type="submit" name="submit">
						</form>
					</div>
					<div class="col-xs-4">
						<h4>First Name</h4>
						<h4>Last Name</h4>
						<h4>Gender</h4>
						<h4>Jobtitle</h4>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
