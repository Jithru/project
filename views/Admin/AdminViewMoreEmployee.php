<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/View_More_Employee.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Details of employee</h1>
            </div>
            <div class="details-container">
                <div class="row">
                    <div class="column-1"><h4>ID</h4><h4>:</h4></div> 
                    <div class="column-2" id="emId">E-16204</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Name</h4><h3>:</h3></div> 
                    <div class="column-2" id="Name">Gihan Sandaruwan Weerasinghe</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Job title</h4><h4>:</h4></div> 
                    <div class="column-2" id="Job-title">Manager</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>NIC</h4><h4>:</h4></div> 
                    <div class="column-2" id="NIC">980210324v</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Contact</h4><h4>:</h4></div> 
                    <div class="column-2" id="Contact">0778560822</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Address</h4><h4>:</h4></div> 
                    <div class="column-2" id="Address">No-177 danture,Pilimathalawa,kandy</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Date of birth</h4><h4>:</h4></div> 
                    <div class="column-2" id="dob">1998/01/21</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Gender</h4><h4>:</h4></div> 
                    <div class="column-2" id="Gender">Male</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Hiring Date</h4><h4>:</h4></div> 
                    <div class="column-2" id="Hiring-Date">2020-02-20</div>  
                </div>
                <div class="row">
                    <div class="column-1"><h4>Licence-No</h4><h4>:</h4></div> 
                    <div class="column-2" id="Licence-row">E-162049898</div>  
                </div>

            </div>
            <div class="button-container">
                <a href="<?php echo URL?>Admin/employeeAccounts">
                    <button class="cancel">
                        Back
                    </button>
                </a>

                <a href="<?php echo URL?>Admin/editEmployee">
                    <button class="save">
                        Edit
                    </button>
                </a>

                
                
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/Admin/employeeMoreDetails.js"></script>
</body>
</html>