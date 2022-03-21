<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/registration.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/registration2.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/reg.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="reg-form" id="reg-form">
            <div class="part-1"><h2>Registration</h2></div>
            <div class="part-3">
                <div class="row">
                    <label for="initName">Name with Initials</label> 
                    <div class="colen">:</div>
                    <input type="text"  id="initName">
                </div>
                <div class="row">
                    <label for="fullName">Full Name</label>
                    <div class="colen">:</div>
                    <input type="text" id="fullName">
                </div>
                <div class="row">
                    <label for="pmtaddress">Address</label>
                    <div class="colen">:</div>
                    <input type="text" id="pmtAddress">
                </div>
            </div>
            <div class="part-4">
                <div class="left">
                    <div class="sub-row">
                        <label for="city">City</label>
                        <div class="colen">:</div>
                        <input type="text"  id="city">
                    </div>
                    <div class="sub-row">
                        <label for="district">District</label>
                        <div class="colen">:</div>
                        <input type="text"  id="district">
                    </div>
                    <div class="sub-row">
                        <label for="divSecre">Divitional secretarial</label>
                        <div class="colen">:</div>
                        <input type="text"  id="divSecre">
                    </div>
                    <div class="sub-row">
                        <label for="police">Nearest Police station</label>
                        <div class="colen">:</div>
                        <input type="text"  id="police">
                    </div>
                </div>

                <div class="right">
                    <div class="sub-row">
                        <label for="gender">Gender</label>
                        <div class="colen_g">:</div>
                        <input type="radio" id="male" name="gender">Male <input type="radio" id="female" name="gender">Female
                    </div>
                    <div class="message-bar" id="message"></div>
                    <div class="sub-row">
                        <label for="dateofbirth">Date of birth</label>
                        <div class="colen">:</div>
                        <input type="date"  id="dateofbirth">
                    </div>
                    <div class="sub-row">
                        <label for="nic">Identity/Passport</label>
                        <div class="colen">:</div>
                        <input type="text"  id="nic">
                    </div>
                    <div class="sub-row">
                        <label for="mobile">Mobile</label>
                        <div class="colen">:</div>
                        <input type="text" placeholder="07X XXXXXXX" id="mobile">
                    </div>
                </div>
            </div>
            <div class="part-5">
                <a href="http://localhost/project/Receptionist/studentList"><button class="Back" id="back" name="back">Back</button></a>
                <button class="cancel" id="cancel" onclick="RegCancel()">Cancel</button>
                <button class="next" id="next" name="next" onclick="nextPage()">Next Page</button>
            </div>
            <div class="part-6">
                <p>1 of 2</p>
            </div>
        </div>

        <div class="reg2-f2" id="reg2-f2">
            <div class="part-1-f2"><h2>Registration</h2></div>
            <div class="part-3-f2">
                <div class="up-row-f2">
                    <label for="occ">Occupation</label>
                    <div class="colen-f2">:</div>
                    <input type="text" id="occupation" name="occupation">
                </div>
                <div class="up-row-f2">
                        <label for="exam">Nearest exam you want to attempt</label>
                        <div class="colen-f2">:</div>
                        <input type="radio" id="written" name="exam" checked="checked" onchange="changing()">Written Exam<input type="radio" id="trial" name="exam" onchange="changing()">Trial Exam<input type="radio" id="license" name="exam" onchange="changing()">I'm here for further practices
                </div>
            </div>
            <div class="part-4-f2">
                <div class="left-f2">
                    <div class="sub-row-f2">
                        <label for="medical" id="number-text">Medical No</label>
                        <div class="colen-f2">:</div>
                        <input type="text" id="medical" name="medical">
                    </div>
                    <div class="sub-row-f2">
                        <label for="initPayment">Initial Payment</label>
                        <div class="colen-f2">:</div>
                        <input type="text" id="initPayment" name="initPayment">
                    </div>
                </div>
                <div class="right-f2">
                    <div class="sub-row-f2">
                        <label for="issue" id="issued-date-text">Issued Date</label>
                        <div class="colen-f2">:</div>
                        <input type="date" id="issue" name="issue">
                    </div>
                    <div class="sub-row-f2-hidden" id="ending-date">
                        <label for="issue" id="issued-date-text">Ending Date</label>
                        <div class="colen-f2">:</div>
                        <input type="date" id="ending" name="ending">
                    </div>
                </div>
            </div>
            <div class="part-5-f2">
                <div class="tab-f2">
                    <div class="header-f2">Applied Vehicle Classes</div>
                        <div class="vehicle-box-f2">
                            <div class="check-row-f2">
                                <input type="checkbox" id="A1" name="vehicle" value="A1">
                                <label for="vehicle1"> A1</label>
                            </div>
                            <div class="check-row-f2">
                                <input type="checkbox" id="A" name="vehicle" value="A">
                                <label for="vehicle2"> A</label>
                            </div>
                            <div class="check-row-f2">
                                <input type="checkbox" id="B1" name="vehicle" value="B1">
                                <label for="vehicle3"> B1</label>
                            </div>
                            <div class="check-row-f2">
                                <input type="checkbox" id="B" name="vehicle" value="B">
                                <label for="vehicle3"> B</label>
                            </div>
                        </div>
                        <button class="calculate-total" id="calculate" onclick="loadVehicleClasses()">calculate total</button>
                    </div>
                <div class="crosul-container-f2" id="packages">

                <input type="hidden" id="package-id-container" value="0">
                <input type="hidden" id="package-amount-container" value="0">

                <div class="crosul-title-f2" id="packageContainer">Traning Packages</div>
                    <div class="crosul-f2">
                        <div class="scroll-f2" id="scroll">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="part-6-f2">
                <button class="previous-f2" id="previous-f2" name="previous-f2"  onclick="pre()">Previous</button>
                <button class="cancel-f2" id="cancel-f2" name="cancel-f2"  onclick="cancelf2()">Cancel</button>
                <button class="save-f2" id="save-f2" name="save-f2"  onclick="SaveData()">Save</button>
            </div>
            <div class="part-7-f2"><p>2 of 2</p></div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/receptionist/registration.js"></script>
</body>
</html>