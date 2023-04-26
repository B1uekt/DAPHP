<?php
  require_once('lib_session.php');
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="formlogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="ajax.js"></script>
</head>
<body>
    <a class="home" href="admin.html"><i class="material-icons">home</i></a>
    <div class="formlogin">
        <form id="login-form" method="post" id="myform">
            <div class="imgcontainer">
              <img src="imgadmin/Panacea.jpg" alt="Avatar" class="avatar">
            </div>
          
            <div class="container">
              <label for="phone"><b>Phone Number</b></label>
              <input class="input" type="tel" id="phone" placeholder="Enter Phone Number" autocomplete="current-password" name="phone" pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b" required>
          
              <label for="psw"><b>Password</b></label>
              <input class="input" type="password" id="psw" placeholder="Enter Password" name="psw" required>
          
              <button type ="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" class="cancelbtn">Cancel</button>
              <span class="psw"><a href="#">Sign Up</a></span>
            </div>
          </form>
    </div>
    <script>
        const cancelBtn = document.querySelector('.cancelbtn');

        cancelBtn.addEventListener('click', function() {
            const myForm = document.getElementById('myform');
            myForm.reset();
        });
    </script>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var phone = document.getElementById("phone").value;
        var psw = document.getElementById("psw").value;
        let requestProductInfo = new XMLHttpRequest();
            requestProductInfo.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                  console.log(this.responseText);
                  if(this.responseText == "success"){
                     window.location.href = 'admin.php';
                  }
                  else if(this.responseText == "invalid_password"){
                    alert("Your password is incorrect !");
                  }
                  else if(this.responseText == "invalid_phonenumber"){
                    alert("Your phonenumber is incorrect !");
                  }
            }
        };
        requestProductInfo.open("GET", "login.php?phone="+phone+"&psw="+psw);
        requestProductInfo.send();
      });
    </script>
</body>