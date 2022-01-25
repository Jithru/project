<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/studentList.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Admin/Mid_Box_Layout2.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Employee_Details.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <title>List of Students</title>
</head>
<body>

<div class="mid-box-container-1" id="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="mid-box-title-container">
                <h1>Details of Student</h1>
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
                <button class="back" onclick='closeMore()'>Back</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>

        <div class="main">
            <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>
            <div class="view">
                <div class="part-1">
                    <div class="topic"><b>List of Student</b></div>
                </div>
                <div class="part-2">
                    <div class="choise">
                        <div class="cl1">
                            <button class="all">All</button>
                            <button class="exam">Exam passed</button>
                            <button class="trial">Trial passed</button>
                            <button class="fail">Exam Falied</button>
                        </div>
                        <div class="cl2">
                            <input type="text" name="search" class="search" placeholder="Search">
                        </div>
                    </div>
                </div>
                
                <div class="part-3">
                    <div class="head-cover">
                        <div class="table-head">
                            <div class="one"><h4>ID</h4></div>
                            <div class="two"><h4>Name</h4></div>
                            <div class="three"><h4>Tel. No</h4></div>
                            <div class="four"></div>
                            <div class="five"></div>
                            
                        </div>
                    </div>
                    
                    <div class="table-body">
                        <div class="scroll" id="scroll">
                            
                        </div>
                    </div>
                </div>
            <div class="registerStudent-button-container">
                <a href="<?php echo URL?>Receptionist/registration"><button class="registerStudent-button">Register Student</button></a>
            </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/receptionist/studentList.js"></script>
</body>
</html>