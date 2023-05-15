<!DOCTYPE html>
<html>
<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sql_daphp";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT t.SDT, t.MatKhau, t.Status, k.* FROM khachhang k, taikhoan t WHERE t.SDT = k.SDT ";
            $result = mysqli_query($conn, $sql);
?>
<head>
    <title>Manage Product</title>
    <!--CSS link-->
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="styleorder.css">
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--Icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="model-0 hide">
    <div class="model-inner-0">
        <div class="model-header-0 d-flex">
            <div class="header-form"><h3>UPDATE YOUR USER</h3></div>
            <i class="fa fa-window-close"></i>
        </div>
        <div class="model-body-0">
            <form onsubmit="OnSubmit();">
                <div class="container-price-cate my-3 d-flex">
                    <div class="price">
                        <label for="account">ACCOUNT</label><br>
                        <input class="float-left price-cate" type="text" id="account" name="account" value="">
                    </div>
                    <div class="cate">
                        <label for="pro-number">PASSOWRD</label><br>
                        <input class="float-left price-cate" type="text" id="password" name="password" value="">
                    </div>
                </div>
                <div class="container-price-cate my-3 d-flex">
                    <div class="price">
                        <label for="price">EMAIL</label><br>
                        <input class="float-left price-cate" type="text" id="email" name="email" value="">
                    </div>
                    <div class="cate">
                        <label for="phone">Phone number</label><br>
                        <input class="float-left price-cate" type="tel" id="phone" name="phone" pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b">
                    </div>
                </div>
                <label for="descr">ADDRESS</label><br>
                <textarea class="descr" id="descr" name="descr" rows="4" cols="70"></textarea>
                <input class="submit" type="submit" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
<div class="col-2 nav float-left">
            <h2 style="color:#F77D0A;padding-bottom: 20px;">ROYAL CARS</h2>
            <div class="nav-item"><a href="admin.php"><span class="material-symbols-outlined">home</span>Home</a></div>
            <button class="dropdown-btn"><span t class="material-symbols-outlined">category</span>Manage Products</button>
            <div class="dropdown-container">
            <a href="manageproduct.php?page=1">ALL CAR</a>
                <a href="manageproduct.php?page=2">TWO-SEATER CAR</a>
                <a href="manageproduct.php?page=3">FOUR-SEATER CAR</a>
                <a href="manageproduct.php?page=4">ACCESSORY</a>
            </div>
            <div class="nav-item"><a href="manageuser.php"><span class="material-symbols-outlined">manage_accounts</span>Manage Users</a></div>
            <button class="dropdown-btn"><span class="material-symbols-outlined">list_alt</span>Manage Orders</button>
            <div class="dropdown-container">
                <a href="manageorder.php?page=1">CAR</a>
                <a href="manageorder.php?page=2">ACCESSORY</a>
            </div>
        </div>
<div class="col-10" style="margin-left:16.66%">
    <h1><i class="fa fa-gear" style="font-size:24px"></i>Manage User</h1>

    <div class="new-p my-3">
        <a href="Signup.php"><i class="fa fa-plus-circle" style="margin-right: 10px;"></i>ADD NEW USER</a>
    </div>

    <div class="my-4 sort-search d-flex">
        <form class="col-4" action="">
            <div class="search d-flex">
                <input type="text" placeholder="&#160;&#160;&#160;Search here" style = "width:100%">
                <button type="submit" style="font-size:30px;margin-left:3px; margin-top: auto; margin-bottom:auto;"><span style = "color: #F77D0A" class="material-symbols-outlined">search</span></button>
            </div>
        </form>
        <div class="sort" onclick="toggleDropdown()">
            <i class="fa fa-sort" style="font-size:30px;"></i>
            <div class="dropdown-button">
                <form action="">
                    <div class="filter" style="text-align: left;">
                        <input type="radio" id="price1" name="alphabet" value="AZ">
                        <label for="price1">A -> Z</label><br>
                        <input type="radio" id="price2" name="alphabet" value="ZA">
                        <label for="price2">Z -> A</label><br>
                    </div>
                    <button class="filter-btn" type="submit" value="submit">FILTER</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid all-p">
        <div class="container-fluid row-title d-flex my-3">
            <div class="col-1 text-center title">ID</div>
            <div class="col-1 text-center title">NAME</div>
            <div class="col-3 text-center title">ADDRESS</div>
            <div class="col-3 text-center title">EMAIL</div>
            <div class="col-2 text-center title">PHONE NUMBER</div>
            <div class="col-2 text-center title">BLOCK</div>
        </div>
        <?php
                $s = "";
                while ($row = mysqli_fetch_assoc($result)) {
                    //var_dump($row['Status']);
                    $s .= '<div class="container-fluid row-order d-flex">';
                    $s .= sprintf('<div class="col-1 text-center order"><p>%s</p></div>', $row['MaKH']);
                    $s .= sprintf('<div class="col-1 text-center order"><p>%s</p></div>', $row['TenKH']);
                    
                    $s .= sprintf('<div class="col-3 text-center order"><p>%s</p></div>', $row['DiaChi']);
                    $s .= sprintf('<div class="col-3 text-center order"><p>%s</p></div>', $row['Email']);
                    $s .= sprintf('<div class="col-2 text-center order"><p>%s</p></div>', $row['SDT']);
                    $s .= '<div class="col-2 text-center order btn-de-up">';
                    $s .= sprintf('<a href="deleteuser.php?SDT=%s&status=%s"  class="btn but-delete ">%s</a>',$row['SDT'], $row['Status'], $row['Status']);
                    $s .= '</div>';
                    $s .= '</div>';
                }
                echo($s);
        ?>
    </div>
</div>
<script>
    function toggleDropdown(){
        var dropdown = document.querySelector('.dropdown-button');
        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        } else {
            dropdown.classList.add('show');
        }
    }
</script>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    var buttonGroups =document.querySelectorAll('.btn-de-up')
    var model0= document.querySelector('.model-0');
    var icon0 = document.querySelector('.model-header-0 i');
    var submit = document.querySelector('.submit')
    function toggleCLose2(){
        model0.classList.add('hide');
    }
    buttonGroups.forEach(group => {
        const deleteButton = group.querySelector('.but-update');
        deleteButton.addEventListener('click', () => {
            model0.classList.remove('hide');
        });
    });

    icon0.addEventListener('click',  toggleCLose2);
    submit.addEventListener('click', toggleCLose2);

    function OnSubmit(){
        confirm("Do you agree to change this information?");
    }
    function YesorNo(){
        confirm('DO YOU WANT TO DELETE THIS USER ?')
    }
</script>
</body>
</html>
