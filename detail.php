<?php require_once('lib_session.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    if (!empty($_GET['id'])){
      $MaXe = $_GET['id'];  
      $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $type = $_GET['type'];
        if($type=='car'){
            $sql = "SELECT * FROM SanPham WHERE IDSP = '$MaXe'";
            $result = mysqli_query($conn, $sql);
        }
        else {
            $sql = "SELECT * FROM PhuKien WHERE IDPK = '$MaXe'";
            $result = mysqli_query($conn, $sql); 
        }
        
    }

 ?>
<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>  
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5 " style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1  class="text-uppercase text-primary mb-1">Royal Cars</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.php?type=car" class="dropdown-item">Car</a>
                                <a href="car.php?type=accessory" class="dropdown-item">Accessory</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="team.html" class="dropdown-item">The Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <?php  
                                    if(isAdminLogged()){
                                        echo'<a href="account-setting.php" class="dropdown-item">Cập nhật thông tin</a>';
                                        echo'<a href="" class="dropdown-item">Lịch sử đơn hàng</a>';
                                        echo'<a href="Logout.php?isAdmin=1" class="dropdown-item">Đăng xuất</a>';
                                    }
                                    else{
                                        echo'<a href="Login.php" class="dropdown-item">Đăng nhập</a>';
                                        echo'<a href="Signup.php" class="dropdown-item">Đăng ký</a>';
                                    }
                                ?>
                            </div>
                        </div>
                                    <?php  
                                        if(isAdminLogged()){
                                            echo '<a class="nav-item nav-link" href="GH.php"><i class="fas fa-shopping-cart ic" ></i><span style="position: absolute; top: 25px;margin-right: 15px; background: #ee4266; color: white; border-radius: 70%; padding: 5px;font-size: 12px; width: 20px; height: 20px;  line-height: 20px;" id="NoOfItemsInCart">0</span></a>';
                                        }
                                    ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <form action="" method="get">
            <div class="row mx-n2 justify-content-end"> 
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <input type="hidden" name="type" value="timkiem">
                    <input name= "search" class="custom-select px-4 mb-3 " style="width: 230px; height: 50px; background:none; margin: 0px 15px" type="text" placeholder="Search">
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2 pl-5">
                    <button name ="timkiem" class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Search End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Car Detail</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Car Detail</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
        <?php 
            $s = "";
            $row = mysqli_fetch_assoc($result);
            if($type=='car'){
                $s .= sprintf('<h1 class="display-4 text-uppercase mb-5">%s</h1>', $row['TenSP']);
            }
            else {
                $s .= sprintf('<h1 class="display-4 text-uppercase mb-5">%s</h1>', $row['TenPK']);
            }
            //$s .= sprintf('<h1 class="display-4 text-uppercase mb-5">%s</h1>', $row['TenSP']); 
            $s .= ('<div class="row align-items-center pb-5">');
            $s .= ('<div class="col-lg-6 mb-4">');
            $s .= sprintf('<img class="img-fluid" src="%s" alt="">', $row['Url_image']);
            $s .= ('</div>');
            $s .= ('<div class="col-lg-6 mb-4">');
            if($type=='car'){
                $s .= sprintf('<h4 class="mb-2">%s</h4>', number_format($row['GiaBan'], 0, '', ','));
            }
            else {
                $s .= sprintf('<h4 class="mb-2">%s</h4>', number_format($row['Gia'], 0, '', ','));
            }
            //$s .= sprintf('<h4 class="mb-2">%s</h4>', number_format($row['GiaBan'], 0, '', ','));
            $s .= ('<div class="d-flex mb-3">');
            $s .= ('<h6 class="mr-2">Rating:</h6>');
            $s .= ('<div class="d-flex align-items-center justify-content-center mb-1">');
            $s .= ('<small class="fa fa-star text-primary mr-1"></small>');
            $s .= ('<small class="fa fa-star text-primary mr-1"></small>');
            $s .= ('<small class="fa fa-star text-primary mr-1"></small>');
            $s .= ('<small class="fa fa-star text-primary mr-1"></small>');
            $s .= ('<small class="fa fa-star-half-alt text-primary mr-1"></small>');
            $s .= ('<small>(250)</small>');
            $s .= ('</div>');
            $s .= ('</div>');
            $s .= sprintf('<p>%s</p>', $row['MoTa']);
            $s .= ('<div class="d-flex pt-1 pb-5">');
            $s .= ('<h6>Share on:</h6>');
            $s .= ('<div class="d-inline-flex">');
            $s .= ('<a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>');
            $s .= ('<a class="px-2" href=""><i class="fab fa-twitter"></i></a>');
            $s .= ('<a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>');
            $s .= ('<a class="px-2" href=""><i class="fab fa-pinterest"></i></a>');
            $s .= ('</div>');
            $s .= ('</div>');
            if(isAdminLogged()){
                $s .= ('<div class="d-flex">');
                $s .= ('<div class ="col-6"  style="padding-left: 0px">');
                if($type=='car'){
                    $name_encoded = urlencode($row['TenSP']);
                    $s .= sprintf('<a href="AddProducttoCart.php?id=%s&name=%s&price=%d&maTH=%s&img=%s&type=%s"><button class="GH">Thêm vào giỏ hàng</button></a>',  $row['IDSP'], $name_encoded, $row['GiaBan'], $row['MaTH'], $row['Url_image'], $_GET['type']);
                }
                else {
                    $name_encoded = urlencode($row['TenPK']);
                    $s .= sprintf('<a href="AddProducttoCart.php?id=%s&name=%s&price=%d&maTH=%s&img=%s&type=%s"><button class="GH">Thêm vào giỏ hàng</button></a>',  $row['IDPK'], $name_encoded, $row['Gia'], $row['MaTH'], $row['Url_image'], $_GET['type']);
                }
                //$name_encoded = urlencode($row['TenSP']);
                //$s .= sprintf('<a href="AddProducttoCart.php?id=%s&name=%s&price=%d&maTH=%s&img=%s"><button class="GH">Thêm vào giỏ hàng</button></a>',  $row['IDSP'], $name_encoded, $row['GiaBan'], $row['MaTH'], $row['Url_image']);
                $s .= ('</div>');
                $s .= ('<div class ="col-6"  style="padding-left: 0px">');
                if($type=='car'){
                    $s .= sprintf('<a href="booking.php?id=%s"><button class="GH">Đăng kí lái thử</button></a>',  $row['IDSP']);
                }
                else {
                    $s .= sprintf('<a href="booking.php?id=%s"><button class="GH">Đăng kí lái thử</button></a>',  $row['IDPK']);
                }
                //$s .= sprintf('<a href="booking.php?id=%s"><button class="GH">Đăng kí lái thử</button></a>',  $row['IDSP']);
                $s .= ('</div>');
                $s .= ('</div>');
            }
            $s .= ('</div>');
            $s .= ('</div>');
            $s .= ('</div>');
            $s .= ('</div>');
            echo($s);
        ?>
    <!-- Related Car End -->


    <!-- Vendor Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>info@example.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Affiliate Programme</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Return & Refund</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Newsletter</h4>
                <p class="mb-4">Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
                <i>Lorem sit sed elitr sed kasd et</i>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.</p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>