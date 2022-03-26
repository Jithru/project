<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Add_Package.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Add New Package</h1>
            </div>
            <div class="field-container">
               <div class="input-container">
                   <label for="package-name">Package Name :</label>
                   <input type="text" class="package-name" id="package-name">
               </div>
               <!-- <div class="input-container">
                    <label for="vehicle-class-type">Vehicle classes :</label>
                    <select class="vehicle-class-type" id="">
                        <option value="LightVehicles">Light Vehicles</option>
                        <option value="HeavyVehecles">Heavy Vehecles</option>
                    </select>
                </div>  -->
                <div class="classes-check-outer">
                <div class="chk-err" id="chk-err"></div>
                <div class="classes-check" id="classes-edit"> 
                        
                    </div>
                </div>
                <div class="input-container">
                    <label for="training-days">Number of Training Days :</label>
                    <input type="number" min="0" class="training-days" id="training-days">
                </div>
                <div class="input-container">
                    <label for="total-price">total-price (LKR):</label>
                    <input type="number" min="0" class="total-price" id="total-price">
                </div>
                     
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>Admin/packages">
                <button class="cancel">
                    Cancel
                </button></a>
                
                <button class="confirm" onclick="addPackage()">
                    Confirm
                </button>
            </div>
        </div>
    </div>
    <script  src="<?php echo URL?>public/js/Admin/addPackage.js"></script>
</body>
</html>