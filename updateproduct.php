<?php
    if(isset($_REQUEST['submit'])) {
        $loai = $_REQUEST['loaiSP'];
        $id = $_REQUEST['id'];
        $price = (double)$_REQUEST['price'];
        $name = $_REQUEST['name'];
        if($loai == 1){
          $cate = $_REQUEST['cate'];
          $year =(double)$_REQUEST['year'];
        }
        $description = $_REQUEST['descr'];
        $name_producer = $_REQUEST['name-producer'];
        $quantity = (double)$_REQUEST['quantity'];
        $hinhSP = '';// later
        if($_FILES['fileToUpload']['size'] != 0) {
          uploadFileHinh($hinhSP);
        }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        var_dump($hinhSP);
        if($loai == 1){
          if ($hinhSP == '') {
              $sql = sprintf("UPDATE `sanpham` SET `TenSP` = '%s', `MoTa` = '%s', `MaTH` = '%s' , `GiaBan` = '%f' ,`NamSX` = '%f',`MaLoai` = '%s',`SoLuong` = '%f' WHERE `MaSP` = '%s'", $name, $description, $name_producer, $price, $year,$cate,$quantity,$id);
          }
          else {
            $sql = sprintf("UPDATE `sanpham` SET `Url_image` ='%s'  ,`TenSP` = '%s', `MoTa` = '%s', `MaTH` = '%s' , `GiaBan` = '%f' ,`NamSX` = '%f',`MaLoai` = '%s',`SoLuong` = '%f' WHERE `MaSP` = '%s'",$hinhSP,$name, $description, $name_producer, $price, $year,$cate,$quantity,$id);
          }
        }
        else{
            if ($hinhSP == '') {
              $sql = sprintf("UPDATE `phukien` SET `TenPK` = '%s',`MaTH` = '%s' , `Gia` = '%f',`SoLuong` = '%f',`MoTa` = '%s' WHERE `MaPK` = '%s'", $name,$name_producer, $price,$quantity,$description,$id);
            }
            else {
              $sql = sprintf("UPDATE `phukien` SET `Url_image` ='%s', `TenPK` = '%s',`MaTH` = '%s' , `Gia` = '%f',`SoLuong` = '%f', `MoTa` = '%s' WHERE `MaPK` = '%s'",$hinhSP, $name,$name_producer, $price,$quantity,$description,$id);
            }
        }
        if ($conn->query($sql) === TRUE) {
          if($loai == 1)
            header("Location: manageproduct.php?page=1");
          else
          header("Location: manageproduct.php?page=4");
          exit();
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        mysqli_close($conn);
    }
    
    function uploadFileHinh(&$hinh) {
        $loai = $_REQUEST['loaiSP'];
        $target_dir="";
        if($loai == 1)
          $target_dir .= "img/";
        else
          $target_dir .= "img/pk/";
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