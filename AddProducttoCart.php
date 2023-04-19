<?php 
session_start();
    $product_id = $_GET['id'];
    $name_encoded = $_GET['name'];
    $product_name = urldecode($name_encoded);
    $product_img = $_GET['img'];
    $product_price = $_GET['price'];
    $product_price = $_GET['price'];
    $product_TH = $_GET['maTH'];
    $type = $_GET['type'];
    // Tạo một mảng sản phẩm mới để thêm vào giỏ hàng
    $product = array(
        'id' => $product_id,
        'name' => $product_name,
        'image' => $product_img,
        'price' => $product_price,
        'TH' => $product_TH,
        'quantity' => 1
    );
    if (!isset($_SESSION['cart'])) {
        // Nếu giỏ hàng không tồn tại, tạo mới giỏ hàng và thêm sản phẩm mới vào giỏ hàng
        
        $_SESSION['cart'][$product_id] = $product;
    } else {
        // Nếu giỏ hàng đã tồn tại, kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu đã có sản phẩm trong giỏ hàng, tăng số lượng lên 1
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            $_SESSION['cart'][$product_id] = $product;
        }
    }
    $a =sprintf('Location: detail.php?id=%s&type=%s', $product_id, $type);
    header($a);
 ?>