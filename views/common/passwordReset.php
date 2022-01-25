<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Signup/Signup.css">
    <title>Lead driving school</title>
    
</head>
<body>
<div class="fullpage">
        <div class="signup-box">
            <div class="left">
                <div class="content-box">
                <div class="topic"><h1>Reset your password</h1></div> 
                <div class="message" id="msgDiv"></div>
                    <div  class="signup-password"  name="signupPassword">
                        
                        <input type="password" class="enter-password" name="enterPassword" id="enterPassword" placeholder="Set Your own Password">
                        
                        <input type="password" class="confirm-password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                        <div class="submit-button-container"><button class="confirm-button" name="confirm" id="confirm" onclick="passing()">Send</button></div>
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
    <script src="<?php echo URL?>public/js/student/passwordReset.js"></script>
</body>
</html>