<?php 
require_once('lib_session.php');
echo('<div class="container-fluid position-relative nav-bar p-0">');
        echo('<div class="position-relative px-lg-5 " style="z-index: 9;">');
            echo('<nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">');
                echo('<a href="" class="navbar-brand">');
                    echo('<h1  class="text-uppercase text-primary mb-1">Royal Cars</h1>');
                echo('</a>');
                echo('<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>');
                echo('</button>');
                echo('<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">');
                    echo('<div class="navbar-nav ml-auto py-0">');
                        echo('<a href="index.php" class="nav-item nav-link">Home</a>');
                        echo('<a href="about.html" class="nav-item nav-link">About</a>');
                        echo('<a href="service.html" class="nav-item nav-link">Service</a>');
                        echo('<div class="nav-item dropdown">');
                            echo('<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>');
                            echo('<div class="dropdown-menu rounded-0 m-0">');
                                echo('<a href="car.php?type=car" class="dropdown-item">Car</a>');
                                echo('<a href="car.php?type=accessory" class="dropdown-item">Accessory</a>');
                            echo('</div>');
                        echo('</div>');
                        echo('<div class="nav-item dropdown">');
                            echo('<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>');
                            echo('<div class="dropdown-menu rounded-0 m-0">');
                                echo('<a href="team.html" class="dropdown-item">The Team</a>');
                                echo('<a href="testimonial.html" class="dropdown-item">Testimonial</a>');
                            echo('</div>');
                        echo('</div>');
                        echo('<a href="contact.html" class="nav-item nav-link">Contact</a>');
                        echo('<div class="nav-item dropdown">');
                            echo('<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i></a>');
                            echo('<div class="dropdown-menu rounded-0 m-0">');
                                
                                    if(isAdminLogged()){
                                        echo'<a href="account-setting.php" class="dropdown-item">Cập nhật thông tin</a>';
                                        echo'<a href="" class="dropdown-item">Lịch sử đơn hàng</a>';
                                        echo'<a href="Logout.php?isAdmin=1" class="dropdown-item">Đăng xuất</a>';
                                    }
                                    else{
                                        echo'<a href="Login.php" class="dropdown-item">Đăng nhập</a>';
                                        echo'<a href="Signup.php" class="dropdown-item">Đăng ký</a>';
                                    }
                            echo('</div>');
                        echo('</div>');
                                    if(isAdminLogged()){
                                        echo '<a class="nav-item nav-link" href="GH.php"><i class="fas fa-shopping-cart ic" ></i><span style="position: absolute; top: 25px;margin-right: 15px; background: #ee4266; color: white; border-radius: 70%; padding: 5px;font-size: 12px; width: 20px; height: 20px;  line-height: 20px;" id="NoOfItemsInCart">0</span></a>';
                                    }
                    echo('</div>');
                echo('</div>');
            echo('</nav>');
        echo('</div>');
    echo('</div>');
 ?>