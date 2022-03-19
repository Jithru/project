<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Mid_Box_Layout.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Edit_Employee.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="mid-box-container-1">
        <div class="mid-box-container-2">
            <div class="title-container">
                <h1>Edit Employee</h1>
            </div>
            <div class="details-container">
                
                <div class="row">
                    <div class="column-1"><h4>Name</h4><h3>:</h3></div> 
                    <div class="column-2">Gihan Sandaruwan Weerasinghe</div> 
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
                    <div class="column-1"><h4>Job title</h4><h4>:</h4></div> 
                    <div class="column-2">Manager</div>  
                    <button id="job-edit" class="edit" onclick="editJob()">
                        Edit
                    </button>  
                </div>
                <div id="job-saveC" class="btn-cnt">
                    <button id="job-cancel" class="cancel-small-deactivate" onclick="cancelJob()">
                        cancel
                    </button>
                    <button id="job-save" class="save-small-deactivate" onclick="saveJob()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>NIC</h4><h4>:</h4></div> 
                    <div class="column-2">980210324v</div>  
                    <button id="nic-edit" class="edit" onclick="editNIC()">
                        Edit
                    </button> 
                </div>
                <div id="nin-saveC" class="btn-cnt">
                    <button id="nic-cancel" class="cancel-small-deactivate" onclick="cancelNIC()">
                        cancel
                    </button>
                    <button id="nic-save" class="save-small-deactivate" onclick="saveNIC()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>Contact</h4><h4>:</h4></div> 
                    <div class="column-2">0778560822</div>  
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
                    <div class="column-2">No-177 danture,Pilimathalawa,kandy</div>  
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




                <div class="row">
                    <div class="column-1"><h4>Date of birth</h4><h4>:</h4></div> 
                    <div class="column-2">1998/01/21</div>  
                    <button id="dob-edit" class="edit" onclick="editDOB()">
                        Edit
                    </button> 
                </div>
                <div id="dob-saveC" class="btn-cnt">
                    <button id="dob-cancel" class="cancel-small-deactivate" onclick="cancelDOB()">
                        cancel
                    </button>
                    <button id="dob-save" class="save-small-deactivate" onclick="saveDOB()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>Gender</h4><h4>:</h4></div> 
                    <div class="column-2">Male</div> 
                    <button id="gender-edit" class="edit" onclick="editGender()">
                        Edit
                    </button>  
                </div>
                <div id="gender-saveC" class="btn-cnt">
                    <button id="gender-cancel" class="cancel-small-deactivate" onclick="cancelGender()">
                        cancel
                    </button>
                    <button id="gender-save" class="save-small-deactivate" onclick="saveGender()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>Hiring Date</h4><h4>:</h4></div> 
                    <div class="column-2">2020-02-20</div> 
                    <button id="hDate-edit" class="edit" onclick="editHdate()">
                        Edit
                    </button> 
                </div>
                <div id="hDate-saveC" class="btn-cnt">
                    <button id="hDate-cancel" class="cancel-small-deactivate" onclick="cancelHdate()">
                        cancel
                    </button>
                    <button id="hDate-save" class="save-small-deactivate" onclick="saveHdate()">
                        save
                    </button>
                </div>




                <div class="row">
                    <div class="column-1"><h4>Licence-No</h4><h4>:</h4></div> 
                    <div class="column-2">E-162049898</div>  
                    <button id="licence-edit" class="edit" onclick="editLicence()">
                        Edit
                    </button>
                </div>
                <div id="licence-saveC" class="btn-cnt">
                    <button id="licence-cancel" class="cancel-small-deactivate" onclick="cancelLicence()">
                        cancel
                    </button>
                    <button id="licence-save" class="save-small-deactivate" onclick="saveLicence()">
                        save
                    </button>
                </div>

            </div>




            <div class="button-container">
                <a href="<?php echo URL?>Admin/employeeAccounts">
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

    <!-- <script src="<?php echo URL?>public/js/admin/popup.js"></script> -->
    <script  src="<?php echo URL?>public/js/Admin/editEmployee.js"></script>
    <script  src="<?php echo URL?>public/js/Admin/deleteEmployee.js"></script>


</body>
</html>