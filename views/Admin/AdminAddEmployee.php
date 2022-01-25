<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Add_Emoloyee.css">
    
    <title>Lead driving school</title>
</head>
<body>
    
    <div class="mid-box-container-1">
        <div>
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Register Employee</h1>
            </div>
            <div class="err" id="err">
                
            </div>
            <div class="field-container">
               <div class="input-container">
                   <label for="Name">Name :</label>
                   <input type="text" class="Name" id="Name" name="Name">
               </div>
                <div class="input-container">
                    <label for="emp-address">Address :</label>
                    <input type="text" class="emp-address" id="empAddress" name="empAddress">
                </div>
                <div class="input-container">
                    <label for="NIC">NIC :</label>
                    <input type="text"  class="NIC" id="NIC"  name="NIC">
                </div>
                <!-- <div class="input-container">
                    <label for="Dob">Date of Birth :</label>
                    <input type="date"  class="Dob"  id="Dob"  name="Dob">
                </div> -->
                <div id="input-container" class="input-container" >
                    <label>Gender :</label><br>
                    <input class="male" type="radio" name="Gender"  id="male" value="m">
                    <label for="male">Male</label> <br>
                    <input class="female" type="radio" name="Gender" id="female" value="f">
                    <label for="female">Female</label> 
                </div> 
                <div class="gender-below" id="gender-below">

                </div>
                <div class="input-container">
                    <label for="tel-no">Contact Number :</label>
                    <input type="tel" class="tel-no"  id="telNo" name="telNo">
                </div>
                <div class="input-container">
                    <label for="Emp-type">Job Title :</label>
                    <select class="Emp-type" id="empType"  name="empType" onchange="changeLicense()">
                        <!-- <option value="Manager">Manager</option>
                        <option value="Receptionist">Receptionist</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Teacher">Teacher</option> -->
                    </select>
                </div> 

                <div class="input-container" id='license-Number'>
                    <label for="license-Number">license Number :</label>
                    <input type="text" class="license-Number"  id="licenseNumber"  name="licenseNumber">
                </div>
                     
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>Admin/staff">
                <button class="cancel">
                    Cancel
                </button></a>
                <button class="confirm" type="submit" id="submit" name="submit"  onclick="register()">
                   Register
                </button>
                
            </div>
        </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/admin/registerEmployee.js"></script>
</body>
</html>