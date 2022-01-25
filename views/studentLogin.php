<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/login.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo URL?>public/js/common/studentLogin.js"></script>
    <title>Lead driving school</title>
</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="left">
                <div class="left-column">
                <h1>
                    <div class="lead">LEAD</div>
                    <div class="driving">DRIVING</div> 
                    <div class="school">SCHOOL</div> 
                </h1>
            </div>
            </div>
                <div class="login-box">
                    <div class="form-header" id="formHeader">
                        <h1 class="form-heder-h1">User Login</h1>
                    </div>
                    

                    
                    <div class="loginForm" >

                        <div class="invalid-login" id="invalid-login">
                            Invalid username or password, please try again.
                        </div>
                        <div class="input-container">
                            <input class="text-input" id="username" name="username" type="text" placeholder='&#xf007; NIC'>
                            <input class="text-input" id="password" name="password" type="password" style="font-family: FontAwesome;" placeholder='&#xf023;  password'>
                        </div>
                        <div class="buttons">
                            <a class="forgot-password"  href="<?php echo URL?>User/forgotPassword">
                               Forgot your password?
                            </a>
                            <button class="login-btn"   onclick="check_empty_field()">Log In</button>

                        </div>
                            </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- meka main login eka -->