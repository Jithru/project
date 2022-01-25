<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css"> 
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/forgotPassword.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <script src="<?php echo URL?>public/js/student/forgotPassword.js"></script>
    
    <title>Lead driving school</title>
</head>
<body>
<!-- <div class="otp-container" id="otp-container">
    <div class="otp-mid">
            <div class="title-container">
                <h3>Forgot Password ? Enter your</h3>
            </div>
            <div class="err-1" id="err-1"> 
                
            </div>
            <div class="field-container">
               <div class="input-container">
                    <label for="otp">OTP :</label>
                    <input type="text" class="otp" id="otp" name="otp">
               </div>
                 
            </div>
            <div class="button-container">
                <button class="cancel" onclick="otpCancel()">
                    Cancel
                </button>
                <button class="confirm" id="submit" name="submit" onclick="compareOTP()">
                   Confirm
                </button>
                
            </div>
    </div>

</div> -->
<div class="mid-box-container-1">
        <div>
        <div class="mid-box-container-2">
            <div class="title-container">
                <h3>Forgot Password ? Enter your</h3>
            </div>
            <div class="err" id="err">
                
            </div>
            <div class="field-container">
               <div class="input-container">
                    <label for="nic">NIC :</label>
                    <input type="text" class="nic" id="nic" name="nic">
               </div>
                <div class="input-container">
                    <label for="Contact">Contact Number :</label>
                   <input type="text" class="Contact" id="Contact" name="Contact">
                </div>  
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>User/loginpage">
                <button class="cancel">
                    Cancel
                </button></a>
                <button class="confirm" id="submit" name="submit"  onclick="forgot_password()">
                   Confirm
                </button>
                
            </div>
        </div>
        </div>
    </div>
</body>
</html>