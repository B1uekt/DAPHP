<?php 
	if(isset($_POST['update'])){
		$sdtUser = $_POST['user_sdt'];
		$emailUser = $_POST['user_email'];
		$tenUser = $_POST['user_name'];
		$diachiUser = $_POST['user_diachi'];
		$hinhUser = '';// later
		var_dump($_FILES['fileToUpload']['size']);
		if($_FILES['fileToUpload']['size'] != 0) {
			uploadFileHinh($hinhUser);
		}

		$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "sql_daphp";

	    $conn = mysqli_connect($servername, $username, $password, $dbname);
	    if(!$conn){
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    if($hinhUser == ''){
	    	$sql = sprintf("UPDATE `khachhang` SET `TenKH`= '%s', `Email`='%s', `DiaChi`='%s' Where `khachhang`.`SDT` = '%s'", $tenUser, $emailUser, $diachiUser, $sdtUser);
	    }
	    else {
	    	$sql = sprintf("UPDATE `khachhang` SET `TenKH`= '%s', `Email`='%s', `DiaChi`='%s', `Img_user`='%s' Where `khachhang`.`SDT` = '%s' ", $tenUser, $emailUser, $diachiUser, $hinhUser, $sdtUser);
	    }

	    if ($conn->query($sql) === TRUE) {
		  	echo "The record editted successfully";
		  	header("Location: account-setting.php");
		  	exit();
		} 
		else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		mysqli_close($conn);
	}


function uploadFileHinh(&$hinh) {
	$target_dir = "img/users/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
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
	  $hinh = $target_file;
	  return 1;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	//var_dump($target_file);
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		$hinh = $target_file;
	  } else {
		echo "Sorry, there was an error uploading your file.";
	  }
	}
}
 ?>