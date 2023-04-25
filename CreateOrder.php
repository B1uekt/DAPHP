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
        $length = 20; // Số ký tự cho mã đơn hàng
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
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $MaKH = $row['MaKH'];


    
    
    $MaHD = generateMAHD(); 
    foreach($_SESSION['cart'] as $product ){
        
        if($product['type']=='car'){
            $MaDH = generateOrderCode();
            $sql2 = sprintf("SELECT  * FROM sanpham WHERE MaSP = '%s'", $product['MaSP']);
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            $current_quality = $row2['SoLuong']- $product['quantity'];
            if($current_quality >= 0){
                $update_sp = sprintf("UPDATE `sanpham` SET `SoLuong`='%d' WHERE MaSP = '%s'", $current_quality, $product['MaSP']);
                //var_dump($update_sp);
                $result3 = mysqli_query($conn, $update_sp);
            }
            

            $taoDH = sprintf("INSERT INTO `donhang`(`MaDH`, `MaSP`, `MaKH`, `TrangThaiDH`, `Gia`) VALUES ('%s','%s','%s','Preparing','%f')", $MaDH, $product['MaSP'], $MaKH, $Totalcar);
            $result4 = mysqli_query($conn, $taoDH);
            $taoHD = sprintf("INSERT INTO `hoadon`(`MaHD`, `TongTien`, `MaDH`) VALUES ('%s','%f','%s')", $MaHD, $Total, $MaDH);
            $result5 = mysqli_query($conn, $taoHD);
        }
        else{
             
            $MaDHPK = generateOrderCode1();
            



            
            $sql1 = sprintf("SELECT  * FROM phukien WHERE MaPK = '%s'", $product['MaSP']);
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);


            $current_quality = $row1['SoLuong']- $product['quantity'];
            if($current_quality >= 0){
                $update_pk = sprintf("UPDATE `phukien` SET `SoLuong`='%d' WHERE MaPK = '%s'", $current_quality, $product['MaSP']);
                $result7 = mysqli_query($conn, $update_pk);
            }  

            $taoDH_PK = sprintf("INSERT INTO `donhang_pk`(`MaDHPK`, `MaPK`, `SoLuong`, `MaHD`, `Gia`) VALUES ('%s','%s','%s','%s','%s')",$MaDHPK, $product['MaSP'], $product['quantity'], $MaHD, $row1['Gia']);
            $result6 = mysqli_query($conn, $taoDH_PK);
            var_dump($taoDH_PK);
            //var_dump($update_pk);
        }
    }
    unset($_SESSION['cart']);
    
    //var_dump($taoDH);
    //var_dump($taoHD);
    
 ?>
