<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/studentList.css">
        <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout2.css">
        <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Employee_Details.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    
    <title>Lead driving school</title>
</head>
<body>
    <div class="mid-box-container-1-active" id="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="mid-box-title-container">
                <h1>Details of employee</h1>
            </div>
            <div class="mid-box-details-container" id="mid-box-details-container">
                <div class="box-row">
                    <div class="box-column-1"><h4>Student ID</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="emId"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Name with initial</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="intname"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Full Name</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="fullname"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Address</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="address"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>NIC</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="nic"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Gender</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="gender"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>District</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="district"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>City</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="city"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Div sec</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="divsec"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Nearest police station</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="police"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Date of birth</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="dob"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Contact</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="contact"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Occupation</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="occupation"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Student type</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="type"></div>  
                </div>
                <div class="box-row">
                    <div class="box-column-1"><h4>Arival date</h4><h4>:</h4></div> 
                    <div class="box-column-2" id="arivaldate"></div>  
                </div>

            </div>
            <div class="mid-box-button-container">
                <a href="<?php echo URL?>Admin/studentAccounts"><button class="back">Back</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/Admin/studentMoreDetails.js"></script>
</body>
</html>