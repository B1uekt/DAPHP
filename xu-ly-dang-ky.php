<?php
  function generateCustomerId() {
       $timestamp = time();
       $random = mt_rand(1, 999);
       return 'KH' . $timestamp . '-' . $random;
    }
if (isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['mk'])) {
  // Kết nối cơ sở dữ liệu
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sql_daphp";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    $response = array(
      'status' => 'error',
      'message' => 'Lỗi kết nối cơ sở dữ liệu'
    );
    echo json_encode($response);
    die();
  }

  // Lấy dữ liệu từ request
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  $matkhau = $_POST['mk'];



  // Kiểm tra tính hợp lệ của dữ liệu đầu vào
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response = array(
      'status' => 'error',
      'message' => 'Địa chỉ email không hợp lệ'
    );
    echo json_encode($response);
    die();
  }

  if (strlen($matkhau) < 6) {
    $response = array(
      'status' => 'error',
      'message' => 'Mật khẩu phải có ít nhất 6 ký tự'
    );
    echo json_encode($response);
    die();
  }


  // Kiểm tra tài khoản đã tồn tại hay chưa
  $sql = "SELECT * FROM taikhoan WHERE sdt = ? OR email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $sdt, $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($result->num_rows > 0) {
    $response = array(
      'status' => 'exists',
      'message' => 'Số điện thoại hoặc email đã được đăng ký!'
    );
  } else {
    $maKH = generateCustomerId();
    $themkhachhang = sprintf("INSERT INTO `khachhang`(`MaKH`, `SDT`, `Email`) VALUES ('%s','%s', '%s')", $maKH, $sdt, $email);
    $insertSql = "INSERT INTO `taikhoan`(`MatKhau`, `SDT`, `Email`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertSql);
    mysqli_stmt_bind_param($stmt, "sss", $matkhau, $sdt, $email);

    if (mysqli_stmt_execute($stmt) && mysqli_query($conn, $themkhachhang)) {
      $response = array(
        'status' => 'success',
        'message' => 'Đăng ký tài khoản thành công'
      );
      //header('Location:' . 'login.php');
    }
    else {
        $response = array(
            'status' => 'error',
            'message' => 'Lỗi trong quá trình đăng ký tài khoản'
            );
    }
}
    mysqli_close($conn);
    echo json_encode($response);
}
?>