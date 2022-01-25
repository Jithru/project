<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Edit_packages.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Edit Package</h1>
            </div>
            <div class="field-container">
               <div class="input-container">
                   <div class="input-container-edit">
                        <label for="package-name-edit">Package Name :</label>
                        <div class="package-name-edit">
                            Package-1
                        </div>
                   </div>
                   <button class="edit">
                    Edit
                    </button>
               </div>
               <!-- <div class="input-container">
                    <div class="input-container-edit">
                        <label for="vehicle-class-type-edit">Vehicle classes :</label>
                        <div class="vehicle-class-type-edit">
                            Light Vehicles
                        </div>
                    </div>
                    <button class="edit">
                        Edit
                    </button>
                </div>  -->
                <div class="classes-check-outer-edit">
                    <div class="classes-check-edit">
                        
                        <div class="classes-check-edit-in">
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">A </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">A1 </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">A(Auto) </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">B </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">B1 </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">B(Auto) </label><br>
                            </div>
                            <div class="chk-bx">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1">C </label><br>
                            </div>
                        </div>
                        <div class="res"></div>
                    </div>
                    <div class="res"></div>
                </div>
                <div class="input-container">
                    <div class="input-container-edit">
                        <label for="training-days-edit">Number of Training Days :</label>
                        <div class="training-days-edit">
                            15
                        </div>
                    </div>
                    <button class="edit">
                        Edit
                    </button>
                </div>
                <div class="input-container">
                    <div class="input-container-edit">
                        <label for="total-price-edit">total-price (LKR):</label>
                        <div class="total-price-edit">
                            3500.00
                        </div>
                    </div>
                    <button class="edit">
                        Edit
                    </button>
                </div>
                     
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>Admin/packages">
                    <button class="cancel">
                        Cancel
                    </button>
                </a>
                <button class="delete">
                    Delete
                </button>

                <button class="save">
                    Save
                </button>
                
            </div>
        </div>
    </div>
</body>
</html>