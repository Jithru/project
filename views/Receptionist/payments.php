<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/payments.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/addPayment.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/addPayment_step2.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/pay.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-st" id="container-st">
        <div class="header-st">
            <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="view-st">
            
            <div class="main-st">
                <div class="part-1-st">
              <div class="st-prof-st">

                    </div>      
                    <div class="title-st">
                        <h2>Payments</h2>
                    </div>
                </div>
                <div class="part-2-st">
                    <div class="paid-st">
                        <div class="theam-st"><p>Paid:</p></div>
                        <div class="display-st"><p>Rs </p><p>12000.00</p></div>
                    </div>
                    <div class="remaining-st">
                        <div class="re-theam-st"><p>Remaining:</p></div>
                        <div class="display-st"><p>Rs </p><p>8000.00</p></div>
                    </div>
                </div>
                <div class="part-3">
                    <div class="head-cover">
                        <div class="table-head">
                            <div class="one"><h4>Date</h4></div>
                            <div class="two"><h4>Time</h4></div>
                            <div class="three"><h4>Method</h4></div>
                            <div class="four">Price</div>
                            <!-- <div class="five"></div> -->
                        </div>
                    </div>
                    <div class="table-body">
                        <div class="scroll">
                            <div class="row-1">
                                <div class="col-1"><p>09/22/2021</p></div>
                                <div class="col-2"><p>16:41</p></div>
                                <div class="col-3"><p>Cash</p></div>
                                <div class="col-4">3000.00</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1"><p>09/22/2021</p></div>
                                <div class="col-2"><p>16:41</p></div>
                                <div class="col-3"><p>Cash</p></div>
                                <div class="col-4">3000.00</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1"><p>09/22/2021</p></div>
                                <div class="col-2"><p>16:41</p></div>
                                <div class="col-3"><p>Cash</p></div>
                                <div class="col-4">3000.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part-4-st">
                    <a href="<?php echo URL?>Receptionist/studentList"><button class="close-button"  id="back">
                        <div class="plus-st"></div>
                        <div class="add-payment-st"><h3>Back</h3></div>
                    </button></a>
                    <button class="butt-st" onclick="addPayment()" id="addPayment">
                        <div class="plus-st">+</div>
                        <div class="add-payment-st"><h3>Add Payments</h3></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="add-container" id="add-container">
        <div class="form-container">
            <h1>Add Payment</h1>
            <div class="input-area">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" id="amount" placeholder="Rs.0"><br>
                <label for="re-amount">Re-enter Amount:</label>
                <input type="text" name="re-amount" id="re-amount" placeholder="Rs.0">
            </div>
            <div class="footer">
                <button class="cancel" onclick="addPayCancel()">Cancel</button>
                <button class="confirm" onclick="callConfirm()">Confirm</button>
            </div>
        </div>
    </div>
    <div class="second-container" id="second-container">
        <div class="confirm-container">
            <h1>Add Payment</h1>
            <div class="input-area-two">
                <p>The Payment you entered is Rs. 3000.00 <br>Please confirm to continue. </p>
            </div>
            <div class="footer-two">
                <button class="cancel" onclick="calladdPayment()">Cancel</button>
                <button class="confirm" onclick="callHome()">Confirm</button>
            </div>
        </div>
    </div> -->

    <script src="<?php echo URL?>public/js/common/receptionistJs/addPayment.js"></script>
    <script src="<?php echo URL?>public/js/common/receptionistJs/addPayment_step2.js"></script>
    <script src="<?php echo URL?>public/js/common/receptionistJs/payment.js"></script>
</body>
</html>