<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title>Form login</title>
</head>
<body style="margin: 0;"> 
    <div style="background: rgba(28, 30, 50, 0.7)">
        <div id="wrapper">
            <form action="" id="form-login">
                <h1 class="form-heading">ROYAL CARS</h1>
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="text" class="form-input" placeholder="Username">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" class="form-input" placeholder="Password">
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div>
                    <div class="form-signup">
                        <a href="">Forgot Password</a>
                    </div>
                    <div class="form-signup" style="float: right;">
                        <a href="Signup.html">Sign Up</a>
                    </div>
                </div>
                <input type="submit" name ="submit" value="Log In" class="form-submit">
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>