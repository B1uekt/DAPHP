<?php
    require_once('lib_session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Of Admin</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!--Css link-->
        <link rel="stylesheet" href="grid.css">
        <link rel="stylesheet" href="styleadmin.css">
        <!--Font link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!--Icon link-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    </head>
    <body>
        <div class="col-2 nav float-left">
            <h2 style="color:white;padding-bottom: 20px;">Panacea</h2>
            <div class="nav-item"><a href="admin.html"><span class="material-symbols-outlined">home</span>Home</a></div>
            <button class="dropdown-btn"><span t class="material-symbols-outlined">category</span>Manage Products</button>
            <div class="dropdown-container">
            <a href="manageproduct.php?page=1">ALL CAR</a>
                <a href="manageproduct.php?page=2">TWO-SEATER CAR</a>
                <a href="manageproduct.php?page=3">FOUR-SEATER CAR</a>
                <a href="manageproduct.php?page=4">ACCESSORY</a>
            </div>
            <div class="nav-item"><a href="manageuser.php"><span class="material-symbols-outlined">manage_accounts</span>Manage Users</a></div>
            <div class="nav-item"><a href="manageorder.html"><span class="material-symbols-outlined">list_alt</span>Manage Orders</a></div>
        </div>
        <div class="col-10 float-left" style = "margin-left: 16.66%;">
            <div class="text-center welcome">
                <h2>WELCOME BACK ADMIN</h2>
            </div>
            <div class="container-fluid d-flex contain-stat">
                <div class="col-4">
                    <div class="stat d-flex">
                        <i class="fa fa-users" style="font-size:100px; color:#48dbfb"></i>
                        <div class="total">
                            <h1>9000</h1>
                            <h4>Total User</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat d-flex">
                        <i class="fa fa-shopping-cart" style="font-size:100px; color:#feca57"></i>
                        <div class="total">
                            <h1>8000</h1>
                            <h4>Total Order</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat d-flex">
                        <i class='fas fa-box-open' style='font-size:100px; color:#1dd1a1 '></i>
                        <div class="total">
                            <h1>15000</h1>
                            <h4>Total Product</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid graph my-4">
                <canvas id="myChart" style="width:100%;"></canvas>
            </div>
    </div>
    <!--JS VE DO THI-->
    <script>
        var xValues = ["T-Shirt", "Jogger", "Dress", "Hat", "Bag"];
        var yValues = [55, 120, 50, 24, 26];
        
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
                label:'Amount',
                backgroundColor: "#86c9e4",
                data: yValues,
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'  
            }]
          },
          options: {
            legend:{
                display:true,
                position:'right',
                labels:{
                    fontColor:'#000',
                    fontSize:20
                }
            },
            title: {
              display: true,
              text: "The Number Of Clothes That Have Been Sold",
              fontSize:25,
              fontColor:'black'
            }
          }
        });

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

    </script>
    </body>
</html>

