<?php 

    session_start();
    $Total = $_GET['tongtien'];
    $Totalcar = $_GET['tongtiencar'];
    $TotalAccessory = $_GET['tongtiena'];
    //echo($Total);

    function generateOrderCode() {
        $length = 10; // Số ký tự cho mã đơn hàng
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //Các ký tự cho mã đơn hàng
        $result = '';
        $date = date('YmdHis'); // Chuỗi thời gian hiện tại
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
        $result .= $characters[mt_rand(0, $max)]; // Chọn một ký tự ngẫu nhiên từ các ký tự cho sẵn và thêm vào chuỗi kết quả
        }
        return $date . $result; // Trả về mã đơn hàng ngẫu nhiên
    }
    function generateOrderCode1() {
        $length = 5; // Số ký tự cho mã đơn hàng
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //Các ký tự cho mã đơn hàng
        $result = '';
        $date = date('YmdHis'); // Chuỗi thời gian hiện tại
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
        $result .= $characters[mt_rand(0, $max)]; // Chọn một ký tự ngẫu nhiên từ các ký tự cho sẵn và thêm vào chuỗi kết quả
        }
        return $date . $result; // Trả về mã đơn hàng ngẫu nhiên
    }
    function generateMAHD() {
        $length = 10; // Số ký tự cho mã đơn hàng
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //Các ký tự cho mã đơn hàng
        $result = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
        $result .= $characters[mt_rand(0, $max)]; // Chọn một ký tự ngẫu nhiên từ các ký tự cho sẵn và thêm vào chuỗi kết quả
        }
        return $result; // Trả về mã đơn hàng ngẫu nhiên
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = sprintf("SELECT  * FROM khachhang WHERE SDT = '%s'", $_SESSION['current_username']);
    //var_dump($sql);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $MaKH = $row['MaKH'];

    //echo($MaKH);


    
    $MaDH = generateOrderCode();
    $MaHD = generateMAHD(); 
    foreach($_SESSION['cart'] as $product ){
        
        if($product['type']=='car'){

            $taoDH = sprintf("INSERT INTO `donhang`(`MaDH`, `MaSP`, `MaKH`, `TrangThaiDH`, `TongTien`) VALUES ('%s','%s','%s','Prepared','%s')", $MaDH, $product['MaSP'], $MaKH, $Totalcar);
            //$result1 = mysqli_query($conn, $taoDH);
            //var_dump($taoDH);
            //echo($product['MaSP']. "   ");
        }
        else{
            $MaDHPK = generateOrderCode1();
            $taoDH_PK = sprintf("INSERT INTO `donhang_pk`(`MaDHPK`, `MaDH`, `MaPK`, `SoLuong`, , `MaHD`) VALUES ('%s','%s','%s','%s')",$MaDHPK, $MaDH, $product['MaSP'], $product['quantity'] );
        }
    }
    echo($MaHD);
    echo($taoDH);
    echo($taoDH_PK);
 ?>
