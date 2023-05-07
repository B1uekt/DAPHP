<!DOCTYPE html>
<html>
    <head>
        <title>ADD NEW PRODUCT</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="grid.css">
        <link rel="stylesheet" href="styleaddproduct.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
         
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
    <div class="col-2 nav float-left">
            <h2 style="color:white;padding-bottom: 20px;">Panacea</h2>
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
        <div class="col-10 float-left">
            <div class="addproduct">
                <div class="header-form"><h3>ADD YOUR PRODUCT</h3></div>
                <form method="post" action="insertproduct.php" id="myForm" onlick = "myFunction();" enctype="multipart/form-data">
                    <label for="name">Product name</label><br>
                    <input class="name" type="text" id="name" name="name" value=""  required><br>
                    <div class="cate">
                        <label for="cate">Producer</label><br>
                        <select class="price-cate" id="name-producer" name="name-producer" required>
                            <option value="">Choose Producer</option>
                            <option value="Mer">Mercedes</option>
                            <option value="Lam">Lamborghini</option>
                            <option value="Fer">Ferrari</option>
                            <option value="Au">Audi</option>
                            <option value="Bu">Bugatti</option>
                            <option value="BM">BMW</option>
                            <option value="Vin">VinFast</option>
                        </select>
                    </div><br>
                    <label for="descr">Product description</label><br>
                    <textarea class="descr" id="descr" name="descr" rows="4" cols="70"></textarea>
                    <div class="container-price-cate my-3 d-flex">
                        <div class="price">
                            <label for="price">Price</label><br>
                            <input class="price-cate" type="text" id="price" name="price" value=""  required>
                        </div>
                        <div class="cate">
                            <label for="cate">Category</label><br>
                            <select class="price-cate" name="cate" id="cate" required>
                                <option value="">Choose Category</option>
                                <option value="phụ kiện">Accessory</option>
                                <option value="xe 2 chỗ">TWO-SEATER</option>
                                <option value="xe 4 chỗ">FOUR-SEATER</option>
                            </select>
                        </div>  
                    </div>
                    <div class="d-flex" style ="justify-content:space-between">
                        <div class="id-number my-3">
                            <label for="quantity">Quantity</label><br>
                            <input type="text" name="quantity" id="quantity"  required> 
                        </div>
                        <div class="id-number my-3">
                            <label for="quantity">Year</label><br>
                            <input type="text" name="year" id="year"  required> 
                        </div>  
                    </div>
                    <div class="id-number my-3">
                        <label for="quantity">Quantity</label><br>
                        <input type="text" name="quantity" id="quantity"  required> 
                    </div>
                    <label for="fileToUpload">Select image</label><br>
                    <div class="btn-img">
                        <input  type="file" placeholder= "File hình SP" name="fileToUpload"> 
                    </div>
                    <div class="id-number my-3">
                        <label for="id">ID Product</label><br>
                        <input type="text" name="id" id="id"  required> 
                    </div>
                    <input class="submit" type="submit" name="submit" value="SUBMIT">
                </form> 
            </div>
        </div>
        <script>
            function myFunction() {
                alert("The product was added");
            }

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
