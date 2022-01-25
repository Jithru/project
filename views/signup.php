<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Signup/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <title>Lead driving school</title>
    
</head>
<body>
    <div class="fullpage">
        <div class="signup-box">
            <div class="left">
                <div class="content-box">
                    <div class="topic"><h1>Verification</h1></div>
                    <div class="message" id="msgDiv"></div>
                    <div class="signup-form">
                        <input type="text" class="nic-container" name="nic" id="nic" placeholder="Your NIC">
                        <input type="text" class="Otp-code" name="otpcode" id="otpcode" placeholder="Your Temporary Password">
                        <div class="submit-button-container"><button class="sent-button" name="sent" id="sent" onclick="validate()" >Send</button></div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="left-column">
                <h1>
                    <div class="lead">LEAD</div>
                    <div class="driving">DRIVING</div> 
                    <div class="school">SCHOOL</div>
                </h1>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/common/signupValidation.js"></script>
</body>
</html>