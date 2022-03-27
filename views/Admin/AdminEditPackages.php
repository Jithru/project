<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Edit_packages.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/popup.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/backgroundAnim.css">
    <title>Lead driving school</title>
</head>
<body>
<ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
<div id="pop-div" class="popup-container">
        <div class="conf-box">
            <div class="msg-container">
                <h2>Delete Package?</h2>
                deleting a Packages will permenently remove it from your system 
            </div>
            <div class="btn-container">
                <button class="yess" onclick="cancel()">
                    No, keep Package 
                </button >
                    
                <button class="no" onclick="yesDelete()">
                    Yes, Delete Package
                </button>
            </div>
        </div>
     </div>
     <div id="pop-div2" class="popup-container2">
        <div class="conf-box2">
            <div class="invalid-login" id="invalid-login">
                Invalid password, please try again.
            </div>
            <div class="input-container">
                <label for="">Username :</label>
                <input type="text" id="username"> 
            </div>
            <div class="input-container">
                <label for="">Password :</label>
                <input type="password" id="passwordd"> 
            </div>
            <div class="btn-container2">
                <button class="yess" onclick="cancel2()">
                    Cancel 
                </button >
                    
                <button class="no" onclick="deletePackage()">
                    Confirm
                </button>
            </div>
        </div>
     </div>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Edit Package</h1>
            </div>
            <div class="field-container">
               <div class="input-container-2">
                   <div class="input-container-edit" id="p-name">
                        <label for="package-name-edit">Package Name :</label>
                        
                    
                   </div>
                    <button id="p-name-e" class="edit" onclick="editPname()">
                        Edit
                    </button>
                    <div id="responsive-name" class="responsive">

                    </div>
               </div>
               <div id="nm" class="btn-cnt">
                    <button id="p-name-c" class="cancel-small-deactivate" onclick="cancelPname()">
                        cancel
                    </button>
                    <button id="p-name-s" class="save-small-deactivate" onclick="savePname()">
                        save
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
                <div class="input-container-2" id="classesd">
                    <div class="input-container-edit" id="classes">
                        <label for="classes-edit">Number of Training Days :</label>
                        <div class="classes-edit" id="classes-edit">
                            
                        </div>
                    </div>
                    <!-- <button id="p-class-e" class="edit" onclick="editPclass()">
                        Edit
                    </button> -->
                    <div id="responsive-class" class="responsive-active">

                    </div>
                </div>
                <!-- <div id="cls" class="btn-cnt">
                    <button id="p-class-c" class="cancel-small-deactivate" onclick="cancelPclass()">
                        cancel
                    </button>
                    <button id="p-class-s" class="save-small-deactivate" onclick="savePclass()">
                        save
                    </button>
                </div> -->
                    
                <div class="input-container-2"> 
                    <div class="input-container-edit" id="p-days">
                        <label for="training-days-edit">Number of Training Days :</label>
                        
                        
                    </div>
                    <button id="p-day-e" class="edit" onclick="editPdays()">
                        Edit
                    </button>
                    <div id="responsive-day" class="responsive">

                    </div>
                    
                </div>
                <div id="dy" class="btn-cnt">
                    <button id="p-day-c" class="cancel-small-deactivate" onclick="cancelPdays()">
                        cancel
                    </button>
                    <button id="p-day-s" class="save-small-deactivate" onclick="savePdays()">
                        save
                    </button>
                </div>
                <div class="input-container-2">
                    <div class="input-container-edit" id="p-amount">
                        <label for="total-price-edit">total-price (LKR):</label>

                    </div>
                    <button id="p-amount-e" class="edit" onclick="editPamount()">
                        Edit
                    </button>
                    <div id="responsive-amount" class="responsive">

                    </div>
                    
                </div>
                <div id="am" class="btn-cnt">
                    <button id="p-amount-c" class="cancel-small-deactivate" onclick="cancelPamount()">
                        cancel
                    </button>
                    <button id="p-amount-s" class="save-small-deactivate" onclick="savePamount()">
                        save
                    </button>
                </div>
                     
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>Admin/packages">
                    <button class="cancel">
                        Back
                    </button>
                </a>
                <button class="delete" onclick="deletex()">
                    Delete
                </button>
                
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/admin/popup.js"></script>
    <script  src="<?php echo URL?>public/js/Admin/editPackages.js"></script>
    <script  src="<?php echo URL?>public/js/Admin/deletePackages.js"></script>
</body>
</html>