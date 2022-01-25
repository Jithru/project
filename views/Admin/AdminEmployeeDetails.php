<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout2.css">
        <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Employee_Details.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    
    <title>Lead driving school</title>
</head>
<body>
<div class="mid-box-container-1-active">
        <div class="mid-box-container-2">
            <div class="mid-box-title-container">
                <h1>Details of employee</h1>
            </div>
            <div class="mid-box-details-container" id="mid-box-details-container">
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>ID</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="emId"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Name</h4><h3>:</h3></div> 
                    <div class="mid-box-column-2" id="Name"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1" ><h4>Job title</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="Job-title"></div> 
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>NIC</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="NIC"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Contact</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="Contact"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Address</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="Address"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Date of birth</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="dob"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Gender</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="Gender"></div>  
                </div>
                <div class="mid-box-row">
                    <div class="mid-box-column-1"><h4>Hiring Date</h4><h4>:</h4></div> 
                    <div class="mid-box-column-2" id="Hiring-Date"></div>  
                </div>
                <div class="mid-box-row" id="Licence-row">
                      
                </div>

            </div>
            <div class="mid-box-button-container">
                <a href="<?php echo URL?>Admin/staff"><button class="back">Back</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/Admin/employeeMoreDetails.js"></script>
</body>
</html>