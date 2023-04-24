<?php 
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }



$product_id = $_GET['id'];
$name_encoded = $_GET['name'];
$product_name = urldecode($name_encoded);
$product_img = $_GET['img'];
$product_price = $_GET['price'];
$product_TH = $_GET['maTH'];
$type = $_GET['type'];

if($type=='car'){
    $sql = "SELECT  * FROM SanPham WHERE IDSP = $product_id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $MaSP = $row['MaSP'];
}
else if($type=='accessory') {
    $sql1 = "SELECT  * FROM phukien WHERE IDPK = $product_id ";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $MaSP = $row1['MaPK'];
}
//echo($MaSP);

// Tạo một mảng sản phẩm mới để thêm vào giỏ hàng
$product = array(
    'id' => $product_id,
    'name' => $product_name,
    'image' => $product_img,
    'price' => $product_price,
    'TH' => $product_TH,
    'quantity' => 1,
    'type' => $type,
    'MaSP' => $MaSP
);


//echo($product['MaSP']);
if (isset($_SESSION['cart'][$MaSP])) {

    if ($type == 'car') {

        $count = 0;
        foreach ($_SESSION['cart'] as $product) {
            if ($product['type'] == 'car') {
                $count++;
            }
        }

        if ($count >= 1) {
            echo "<div style='color: white; background-color: #f44336;padding: 10px;margin-bottom: 10px;' class='error-message'>Bạn không thể thêm sản phẩm này nữa.</div>";
        }
        else {
            $_SESSION['cart'][$MaSP]['quantity']++;
            echo 'đã thêm';
        }

    } else {
        $_SESSION['cart'][$MaSP]['quantity']++;
        $a =sprintf('Location: detail.php?id=%s&type=%s', $product_id, $type);
        header($a);
        exit();
    }

} 
else {
    if ($type == 'car') {

        $count = 0;
        foreach ($_SESSION['cart'] as $product) {
            if ($product['type'] == 'car') {
                $count++;
            }
        }

        if ($count >= 1) {
            echo "<div style='color: white; background-color: #f44336;padding: 10px;margin-bottom: 10px;' class='error-message'>Bạn không thể thêm sản phẩm này nữa.</div>";
        } 
        else {
            $_SESSION['cart'][$MaSP] = $product;
            $a =sprintf('Location: detail.php?id=%s&type=%s', $product_id, $type);
            header($a);
            exit();
        }

    } else {
        $_SESSION['cart'][$MaSP] = $product;
        $a =sprintf('Location: detail.php?id=%s&type=%s', $product_id, $type);
        header($a);
        exit();
    }
}
 ?>