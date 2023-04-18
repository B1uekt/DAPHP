
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleGH.css">
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
    <?php 
    require('navbar.php');  
    ?>
    <!-- Navbar End -->

<div class="container-fluid" >
  <div class="container pt-5 pb-3">
    <h1 class="display-1 text-primary text-center">Giỏ Hàng</h1>
    <hr class="line">
  </div> 
</div>
<?php 
    $Total =0;
        foreach ($_SESSION['cart'] as $product){
            
            $s ='';
            $s .= '<div class="container d-flex" style="height: 150px; max-width:1140px;">';
            $s .= '<div class="col-2 d-flex" style="height: 150px">';
            $s .= sprintf('<img style="height: 150px; width: 150px" src="%s" alt="">', $product['image']);
            $s .= '</div>';
            $s .= '<div class="col-9" style="height: 150px; display: flex; align-items:flex-end">';
            $s .= '<div class="col-9" style="height: 150px">';
            $s .= sprintf('<p class="ten pl-5">%s</p>', $product['name']);
            $s .= sprintf('<p class="price pl-5">%s</p>',number_format($product['price'], 0, '', ','));
            $s .= sprintf('<p class="price pl-5">Mã Thương Hiệu: %s</p>', $product['TH']);
            $s .= '</div>';
            $s .= '<div class="col-3" id="buy-amount">';
            $s .= '<button class="minus-btn" onclick="handleMinus()">-</button>';
            $s .= sprintf('<input type="text" name="amount" id="amount" value="%s">', $product['quantity']);
            $s .= '<button class="plus-btn" onclick="handlePlus()">+</button>';
            $s .= '</div>';
            $s .= '</div>';
            $s .= '<div class="col-1" style="height: 150px">';
            $s .= sprintf('<a href="DeleteProductCart.php?id=%s" class="bin" tittle="Xóa sản phẩm này"><i class="fa fa-trash-o" aria-hidden="true"></i></a>', $product['id']);
            $Price = $product['quantity'] * $product['price'];
            $Total += $Price;
            $s .= sprintf('<p class="price1">%s</p>', number_format($Price, 0, '', ','));
            $s .= '</div>';
            $s .= '</div>';
            $s .= '<hr class="line1">';
            echo($s);
            }
        ?>
            <div class="container d-flex" style="height: 200px; max-width:1140px;">
              <div class="col-6" style="height: 200px">
                <input style ="margin: 0px; margin-top: 30px;" type="text" class="gc" placeholder="Ghi chú" >  
              </div>
              <div class="col-6 tt" style="height: 200px" >
                <div >
                  <p class="tong" style ="margin-top: 30px; margin-bottom: 40px">Tổng tiền: <span class="price2"><?php echo(number_format($Total, 0, '', ',')) ?></span></p>
                </div>
                  <div>
                    <button>
                      Tiếp tục mua hàng
                    </button>
                    <button> 
                      Cập nhật
                    </button>
                    <button>
                      Thanh toán
                    </button>
                  </div>
                  
              </div>
            </div> 
        


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
<script>
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;
    console.log(amountElement);
    let render = (amount)=>{
      amountElement.value = amount
    }
    let handlePlus = () =>{
      console.log(amount);
      amount++;
      render(amount);
    }
    let handleMinus = () =>{
      console.log(amount);
      amount--;
      amount = (amount<=0)?1:amount;
      render(amount);
    }
    amountElement.addEventListener('input',() =>{
      amount = amountElement.value;
      amount = parseInt(amount);
      amount = (isNaN(amount) || amount==0)?1:amount;
      render(amount);
      console.log(amount);
    });
</script>
</body>

</html>