<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="<?php echo URL?>public/js/admin/showMe.js"></script>
    <script src="<?php echo URL?>public/js/receptionist/viewRow.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/viewRow.css">
    <script src="<?php echo URL?>public/js/receptionist/viewMore.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/viewMore.css">

    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/editDetails.css">

    <script src="<?php echo URL?>public/js/receptionist/payments.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/payments.css">

    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/boxVisible.css"> 
    
    <!-- <script src="<?php echo URL?>public/js/receptionist/addPayment.js"></script> -->
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/addPayment.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/addPayment_step2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead driving school</title>
</head>
<body>
    <!-- <button class="btt" onclick="students()">Student List</button> -->
    <div class="container" id="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="big-view">
            <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>
            <div class="main_view">
                <div class="part-1">
                    <div class="head-title"><h4>List of Student</h4></div>
                </div>
                <div class="part-2">
                    <div class="choise">
                        <div class="cl1-bttn">
                            <a class="link" href="http://localhost/project/Receptionist/studentList/"><button id="all" class="all">All</button></a>
                            <a class="link" href="http://localhost/project/Receptionist/examPassed/"><button class="exam">Exam passed</button></a>
                            <a class="link" href="http://localhost/project/Receptionist/trialPassed/"><button class="trial">Trial passed</button></a>
                            <a class="link" href="http://localhost/project/Receptionist/examFailed/"><button class="fail">Exam Failed</button></a>
                        </div>
                        <div class="cl2">
                            <input type="text" name="search" class="search" id="search" placeholder="Search by name" onkeyup="searchMe(this)">
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
                    <div class="box-1" id="box-1">
                        <div class="scroll" id="scroll">
                            
                        </div>
                    </div>
                </div>
                <div class="registerStudent-button-container">
                    <a href="http://localhost/project/Receptionist/registration/"><button class="registerStudent-button">Register Student</button></a>
                    <!-- <a href="<?php echo URL?>Receptionist/registration"><button class="registerStudent-button">Register Student</button></a> -->
                </div>
            </div>
        </div>
        
    </div>
    
<!-- edit details -->

    <div class="edit-container" id="edit-container">
        <div class="editBox">
            <div class="edit-topic">
                <h1>Details of Student</h1>
            </div>
            <div class="edit-details">
                <div class="edit-row">
                    <div class="edit-theam">Student ID</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edId" readonly="readonly">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Name with initials</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edInit">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Full Name</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edfName">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Address</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edAdd">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">NIC</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edNIC">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Gender</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edGen" readonly="readonly">
                        <!-- <input type="radio" id="edMale" name="gender">Male <input type="radio" id="edFemale" name="gender">Female -->

                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">District</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edDis">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">City</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edCity">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">District Secratary</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edDS">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Near Police Station</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edPolice">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Date of Birth</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="date" name="fName" id="edDob" readonly="readonly">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Contact</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edCon">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Occupation</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edOcc">
                    </div>
                </div>
                <div class="edit-row">
                    <div class="edit-theam">Type</div>
                    <div class="edti-colon">:</div>
                    <div class="edit-area">
                        <input type="text" name="fName" id="edType" readonly="readonly">
                    </div>
                </div>
               
                
            </div>
            <div class="edit-footer">
                <div class="edit-cancel">
                    <button class="btt-cancel" onclick="cancelME()">Cancel</button>
                </div>
                <div class="edit-save">
                    <button class="btt-save" onclick="updateMe()">Save</button>
                </div>
            </div>
        </div>
    </div>

<!-- view details -->

    <div class="main" id="main">
        <div class="box">
            <div class="topic">
                <h1>Details of Student</h1>
            </div>
           
            <div class="row-2">
                <div class="call"><h6>Student ID</h6></div>
                <div class="col">:</div>
                <div class="cell" id="stId"></div>
                <!-- <div class="bttn"></div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Name with initials</h6></div>
                <div class="col">:</div>
                <div class="cell" id="initName"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="init()">edit</button>
                </div> -->
            </div>
            
            <div class="row-2">
                <div class="call"><h6>Full Name</h6></div>
                <div class="col">:</div>
                <div class="cell" id="fName"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="fullName()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Address</h6></div>
                <div class="col">:</div>
                <div class="cell" id="address"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="address()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>NIC</h6></div>
                <div class="col">:</div>
                <div class="cell" id="nic"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="nic()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Gender</h6></div>
                <div class="col">:</div>
                <div class="cell" id="gen"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="gender()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>District</h6></div>
                <div class="col">:</div>
                <div class="cell" id="dist"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="district()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>City</h6></div>
                <div class="col">:</div>
                <div class="cell" id="city"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="city()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>District Secratary</h6></div>
                <div class="col">:</div>
                <div class="cell" id="divSec"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="disSec()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Near Police Station</h6></div>
                <div class="col">:</div>
                <div class="cell" id="police"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="police()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Date of Birth</h6></div>
                <div class="col">:</div>
                <div class="cell" id="dob"></div>
                <!-- <div class="bttn"> -->
                    <!-- <button class="editBttn" onclick="dob()">edit</button> -->
                <!-- </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Contact</h6></div>
                <div class="col">:</div>
                <div class="cell" id="contact"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="contact()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Occupation</h6></div>
                <div class="col">:</div>
                <div class="cell" id="occ"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="occupation()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Type</h6></div>
                <div class="col">:</div>
                <div class="cell" id="type"></div>
                <!-- <div class="bttn">
                    <button class="editBttn" onclick="type()">edit</button>
                </div> -->
            </div>
            <div class="row-2">
                <div class="call"><h6>Arrival Date</h6></div>
                <div class="col">:</div>
                <div class="cell" id="date"></div>
                <!-- <div class="bttn"></div> -->
            </div>
            <div class="allButtons">
                <a href="http://localhost/project/Receptionist/studentList/"><button class="back">Back</button></a>
                <button class="editMe" onclick="editMe()">Edit</button>
                <!-- <button class="bttSave" onclick="updateMe()">Save</button> -->

            </div>

        </div>
    </div>
    <!-- edit -->
    <!-- <div class="toEdit-container" id="toEdit-container">
        <div class="toEdit-box">
            <div class="theam">
                <div class="theam-head" id="theam-head">Name with initials</div>
                <div class="theam-colon">:</div>
                <div class="theam-area">
                    <input type="text" name="edInit" id="edInit">
                </div>
            </div>
            <div class="theam-update">
                <button class="update-button" onclick="editMe()" id="update_me">OK</button>
            </div>
        </div>
    </div> -->

    <!-- add payment -->

    <div class="container-st" id="container-st">
        <div class="payment-header-st">
            <!-- <div class="whoAmI" id="whoAmI"></div> -->
            <div class="title-st">
                <h2>Payments</h2>
            </div>
        </div>
      
        <div class="view-st">
            <div class="main-st">
                <div class="part-1-st">
                    <div class="st-prof-st">

                    </div>      
                    
                </div>
                <div class="part-2-st">
                    <div class="paid-st"> 
                        <div class="display-st" id="payid" >Paid Amount:</div>
                        <div class="theam-st" id="display-paid"><p></p></div>
                    </div>
                    <div class="remaining-st">
                        <div class="display-st" id="remain-balance" >Total Amount:</div>
                        <div class="theam-st" id="display-remain"><p></p></div>
                    </div>
                </div>
                <div class="part-3-st">
                    <div class="head-cover-st">
                        <div class="table-head-st">
                            <div class="one-st"><h4>Date</h4></div>
                            <div class="two-st"><h4>Time</h4></div>
                            <div class="three-st"><h4>Method</h4></div>
                            <div class="four-st"><h4>Price</h4></div>
                        </div>
                    </div>
                    <div class="table-body-st">
                        <div class="scroll-st" id="scroll-st">
                            <!-- rows -->
                        </div>
                    </div>
                </div>
                <div class="part-4-st">
                    <button class="close-button"  id="back" onclick="go_back()">
                        <div class="add-payment-st"><h3>Back</h3></div>
                    </button>
                    <button class="butt-st" onclick="addPayment()" id="addPayment">
                        <div class="plus-st">+</div>
                        <div class="add-payment-st"><h3>Add Payments</h3></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add payment -->
    <div class="add-container" id="add-container">
        <div class="form-container">
            <div class="addTopic">
                <h1>Add Payment</h1>
            </div>
            <div class="input-area">
                <div class="myRow">
                    <div class="first">Amount</div>
                    <div class="second">:</div>
                    <div class="third">
                        <input type="number" name="amount" id="amount" placeholder="Rs.0">
                    </div>
                </div>
                <div class="myRow">
                    <div class="first">Re-enter Amount</div>
                    <div class="second">:</div>
                    <div class="third">
                        <input type="number" name="re-amount" id="re-amount" placeholder="Rs.0">
                    </div>
                </div>
            </div>
            <div class="enter" id="enter"></div>
            <div class="footer">
                <button class="cancel" onclick="addPayCancel()">Cancel</button>
                <button class="confirm" onclick="callConfirm()">Confirm</button>
            </div>
        </div>
    </div>
    
    <!-- confirm -->
    <div class="second-container" id="second-container">
        <div class="confirm-container">
            <div class="title">
                <h1>Add Payment</h1>
            </div>
            <div class="input-area-two" >
                <div class="pOne">The Payment you have entered,</div>
                <div id="entered-amount" class="entered-amount"></div>
                <div class="pOne">Please confirm to continue.</div>
            </div>
            <div class="footer-two">
                <button class="cancel" onclick="callHome()">Cancel</button>
                <button class="confirm" onclick="confirmMe()">Confirm</button>
            </div>
        </div>
    </div>
    
</body>
</html>