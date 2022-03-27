<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Edit_Employee.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/popup.css">
    <title>Lead driving school</title>
</head>
<body>
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
            <div class="er-cnt">
                <div class="errp" id="errp">
                    Invalid password, please try again.
                </div>
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
                    
                <button class="no" onclick="deleteEmployee()">
                    Confirm
                </button>
            </div>
        </div>
     </div>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Edit Employee</h1> 
            </div>
            <div id="err" class="err" >
                            
            </div>
            <div class="details-container">
                
                <div class="row">
                    <div class="column-1"><h4>Name</h4><h3>:</h3></div> 
                    <div id="name" class="column-2"></div> 
                    <button id="name-edit" class="edit" onclick="editName()">
                        Edit
                    </button> 
                </div>
                <div id="name-saveC" class="btn-cnt">
                    <button id="name-cancel" class="cancel-small-deactivate" onclick="cancelName()">
                        cancel
                    </button>
                    <button id="name-save" class="save-small-deactivate" onclick="saveName()">
                        save
                    </button>
                </div>


                <div class="row">
                    <div class="column-1"><h4>Contact</h4><h4>:</h4></div> 
                    <div id="contact" class="column-2"></div>  
                    <button id="contact-edit" class="edit" onclick="editContact()">
                        Edit
                    </button> 
                </div>
                <div id="contact-saveC" class="btn-cnt">
                    <button id="contact-cancel" class="cancel-small-deactivate" onclick="cancelContact()">
                        cancel
                    </button>
                    <button id="contact-save" class="save-small-deactivate" onclick="saveContact()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>Address</h4><h4>:</h4></div> 
                    <div id="add" class="column-2"></div>  
                    <button id="add-edit" class="edit" onclick="editAdd()">
                        Edit
                    </button> 
                </div>
                <div id="add-saveC" class="btn-cnt">
                    <button id="add-cancel" class="cancel-small-deactivate" onclick="cancelAdd()">
                        cancel
                    </button>
                    <button id="add-save" class="save-small-deactivate" onclick="saveAdd()">
                        save
                    </button>
                </div>


            </div>

            <div class="button-container">
                <a href="<?php echo URL?>Admin/employeeAccounts">
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
    <script  src="<?php echo URL?>public/js/Admin/editEmployee.js"></script>
    <script  src="<?php echo URL?>public/js/Admin/deleteEmployee.js"></script>


</body>
</html>