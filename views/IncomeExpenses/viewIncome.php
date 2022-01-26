<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/Manager/css/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/Manager/css/main/sidebar.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/viewExpences&income/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/viewExpences&income/tableStyle.css">
    <title>Income</title>
</head>
<body>
    
    <!--body content of the page starts here-->
    <div class="main-box">
        
        <div class="container">
            <!--Header-->
            <h1>Income</h1>

            <div class="heading">
                <div class="heading-row">
                    <div class="cell">
                    <div class="headingDetails">
                        <div class="one">Income ID</div>
                        <div class="two">Income</div>
                        <div class="three">Student name</div>
                        <div class="four">Date</div>
                        <div class="five">Time</div>
                        <div class="six">Amount</div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="table">
                <div class="row">
                    <div class="cell">
                        <div class="information">
                            <div class="one">In_1</div>
                            <div class="two">Partial Payment</div>
                            <div class="three">Roshan Senevirathne</div>
                            <div class="four">2021-10-16</div>
                            <div class="five">8:15:22</div>
                            <div class="six">1000</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cell">
                        <div class="information">
                            <div class="one">In_2</div>
                            <div class="two">Partial Payment</div>
                            <div class="three">Roshan Senevirathne</div>
                            <div class="four">2021-10-16</div>
                            <div class="five">8:15:22</div>
                            <div class="six">1000</div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>IncomeExpenses/incomeGraphic"><button class="income-graph-button" id="incomeGraph" name="incomeGraph">Graphical view</button></a>
                <a href="<?php echo URL?>Manager/incomeExpenses"><button class="back-button" id="back" name="back">Back</button></a>
            </div>
        </div>
    </div>
</body>
</html>