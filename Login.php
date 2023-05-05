<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
    .social{
        margin-top: 30px;
        margin-left: 25px;
        display: flex;
    }
    .social div{
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255,255,255,0.27);
        color: #eaf0fb;
        text-align: center;
    }
    .social div:hover{
        background-color: rgba(255,255,255,0.47);
    }
    .social .fb{
        margin-left: 25px;
    }
    .social i{
        margin-right: 4px;
    }
    </style>
    <title>Form login</title>
</head>
<body style="margin: 0;"> 
    <div style="background: rgba(28, 30, 50, 0.7)">
        <div id="wrapper">
            <form name="DangNhap" action="code_login.PHP" method="post" id="form-login" enctype="multipart/form-data">
                <h1 class="form-heading">ROYAL CARS</h1>
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input name ="sdt_dn" type="text" class="form-input" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input name ="mk_dn" type="password" class="form-input" placeholder="Password">
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div>
                    <div class="form-signup">
                        <a href="">Forgot Password</a>
                    </div>
                    <div class="form-signup" style="float: right;">
                        <a href="Signup.php">Sign Up</a>
                    </div>
                </div>
                <input type="submit" name ="submit" value="Log In" class="form-submit">

                <div class="social">
                    <div class="go" style="cursor: pointer"><i class="fab fa-google"></i>  Google</div>
                    <div class="fb" style="cursor: pointer"><i class="fab fa-facebook"></i>  Facebook</div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>