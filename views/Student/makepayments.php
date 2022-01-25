<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo URL?>public/css/student/makepayments.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div class="div-1">
                <h2>Make Payments</h2>
            </div>
            <div class="div-2">
                <div class="col-1">
                    <h3>Paying Amount(Rs.)</h3>
                </div>
                <div class="col-2">
                    <h3>:</h3>
                </div>
                <div class="col-3">
                    <input type="number" class="amount">
                </div>
            </div>
            <div class="div-3">
                <div class="col-1">
                    <h3>Method of payment</h3>
                </div>
                <div class="col-2">
                    <h3>:</h3>
                </div>
                <div class="col-3">
                    <select class="methods">
                        <option value="Visa">Visa</option>
                        <option value="Master">Master</option>
                        <option value="Amex">Amex</option>
                        <option value="eZ Cash">eZ Cash</option>
                      </select>
                </div> 
            </div>
            <div class="div-4">
                <div class="col-1">
                    <h3>Total Amount(Rs.)</h3>
                </div>
                <div class="col-2">
                    <h3>:</h3>
                </div>
                <div class="col-3">
                    <div class="total"></div>
                </div>
            </div>
            <div class="div-5">
                <div class="div-button">
                   <a href="<?php echo URL?>Student/payments"> <button class="Back">Back</button></a>
                </div>
                <div class="div-button">
                    <button class="Cancel">Cancel</button>
                </div>
                <div class="div-button">
                    <button class="pay">Pay</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>