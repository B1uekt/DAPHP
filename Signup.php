<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Form login</title>
    
</head>
<body style="margin: 0;"> 
    <div style="background: rgba(28, 30, 50, 0.7)">
        <div id="wrapper">
            <form name="DangKy" action="DangKy.php" method="post" id="form-login" enctype="multipart/form-data">
                <h1 class="form-heading">ROYAL CARS</h1>
                <div class="form-group">
                    <input name="sdt" type="text" class="form-input" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input name="email" type="text" class="form-input" placeholder="Email">
                </div>
                <div class="form-group">
                    <input name="mk" type="password" class="form-input" placeholder="Password">
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div class="form-group">
                    <input name="mk1_dk" type="password" class="form-input" placeholder="Re-enter The Password">
                    <div id="eye1">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <input name="submit" type="submit" value="Sign Up" class="form-submit">
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
<script>
    $(document).ready(function() {
  $('#form-login').submit(function(event) {
    // Ngăn chặn gửi form trực tiếp
    event.preventDefault();
    
    // Lấy giá trị các trường input
    var sdt = $('input[name="sdt"]').val();
    var email = $('input[name="email"]').val();
    var mk = $('input[name="mk"]').val();
    
    // Gửi yêu cầu kiểm tra tài khoản đã tồn tại hay chưa bằng AJAX
    $.ajax({
      url: 'kiem-tra-tai-khoan.php', // Đường dẫn đến file xử lý kiểm tra tài khoản
      type: 'POST',
      dataType: 'json',
      data: {
        sdt: sdt,
        email: email
      },
      success: function(response) {
        // Xử lý dữ liệu trả về
        if (response.status === 'exists') {
          alert(response.message);
        } else {
          // Nếu tài khoản chưa được đăng ký, gửi yêu cầu đăng ký tài khoản
          $.ajax({
            url: 'xu-ly-dang-ky.php', // Đường dẫn đến file xử lý đăng ký tài khoản
            type: 'POST',
            dataType: 'json',
            data: {
              sdt: sdt,
              email: email,
              mk: mk
            },
            success: function(response) {
              alert(response.message);
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert('Lỗi: ' + xhr.status + '. ' + thrownError);
            }
          });
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert('Lỗi: ' + xhr.status + '. ' + thrownError);
      }
    });
  });
});
  </script>
</html>