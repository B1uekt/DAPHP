<?php
    function generateIDProductCode() {
      $length = 5; // Số ký tự cho mã đơn hàng
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //Các ký tự cho mã đơn hàng
      $result = '';
      $max = strlen($characters) - 1;
      for ($i = 0; $i < $length; $i++) {
      $result .= $characters[mt_rand(0, $max)]; // Chọn một ký tự ngẫu nhiên từ các ký tự cho sẵn và thêm vào chuỗi kết quả
      }
      return $result; // Trả về mã đơn hàng ngẫu nhiên
    }
    if(isset($_POST['submit'])){
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
        $id = generateIDProductCode();
        $price = (double)$_REQUEST['price'];
        $name = $_REQUEST['name'];
        $cate = $_REQUEST['cate'];
        $description = $_REQUEST['descr'];
        if($cate != "phụ kiện"){
            $year =(double)$_REQUEST['year'];
        }
        $name_producer = $_REQUEST['name-producer'];
        $quantity = (double)$_REQUEST['quantity'];
        $hinhSP = '';// later
        if($_FILES['fileToUpload']['size'] != 0) {
          uploadFileHinh($hinhSP);
        }
        if($cate != "phụ kiện"){
            $sql = sprintf("INSERT INTO `sanpham`(`MaSP`, `TenSP`, `MoTa`, `Url_image`, `MaTH`, `GiaBan`, `NamSX`, `MaLoai`, `SoLuong`) VALUES ('%s','%s','%s','%s','%s','%f','%f','%s','%f')", $id,$name,$description,$hinhSP, $name_producer,$price, $year,$cate,$quantity);
        }
        else{
            $sql = sprintf("INSERT INTO `phukien`(`MaPK`, `TenPK`, `SoLuong`, `Gia`, `Url_image`,`MaTH`,`MoTa`) VALUES ('%s','%s','%f','%f','%s','%s','%s')", $id,$name,$quantity,$price, $hinhSP,$name_producer,$description);
        }
        if ($conn->query($sql) === TRUE) {
            if($cate != "phụ kiện")
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
        $cate = $_REQUEST['cate'];
        $target_dir="";
        if($cate != "phụ kiện")
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
