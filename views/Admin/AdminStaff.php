<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Admin_tabel_Styling.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/layOut_common.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Screen_fit_ui.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <!-- <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> -->
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout2.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Employee_Details.css">
    
    
    <title>Lead driving school</title>
</head>
<body>
<div class="mid-box-container-1" id="mid-box-container-1">
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
                <button class="back" onclick='closeMore()'>Back</button>
            </div>
        </div>
    </div>
    <div class="box-1">
    <?php require_once APPROOT."/../views/common/header.php"; ?>
        <div class="box-2">
          <?php require_once APPROOT."/../views/common/AdminSidebar.php"; ?>
            <div class="container-1">
                <div class="title-container">
                  Staff
                </div>

                <div class="add-new-search-container">
                <a href="<?php echo URL?>Admin/addEmployee"><button class="add-new">Add Employee</button></a>
                <input type="search" placeholder='&#xf002; Search'>
                </div>

                <div class="table-heading-container">
                    <div class="heading-row">
                        <div class="col-1">Employee ID</div>
                        <div class="col-2">Name</div>
                        <div class="col-3">Job Title</div>
                        <div class="col-4">Contact</div>
                        <div class="col-5"></div>
                    </div> 
                </div>

                <div class="row-container" id="row-container" >
                    
                </div>
                

            </div>
        </div>
    </div>
    <script  src="<?php echo URL?>public/js/admin/staff.js"></script>
</body>
</html>