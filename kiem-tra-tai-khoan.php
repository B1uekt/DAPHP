<?php
if (isset($_POST['sdt']) && isset($_POST['email'])) {
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
    $response = array(
      'status' => 'not_exists',
      'message' => 'Tài khoản chưa được đăng ký'
    );
  }

  mysqli_close($conn);
  echo json_encode($response);
}
?>