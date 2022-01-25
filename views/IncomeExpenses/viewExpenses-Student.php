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
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/sidebar.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/Horizontaltab.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/viewExpences&income/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/viewExpences&income/tableStyle.css">
    <title>Expences</title>
</head>
<body>
    
    <!--body content of the page starts here-->
    <div class="main-box">
        
        <div class="container">
            <!--Header-->
            <h1>Expences</h1>
            <div class="tabs">
                <div class="Horizontal-tab">
                    <div class="tabContainer">
                    <button class="page-change-button" >Expenses of Students<hr></button>
                    <a href="<?php echo URL?>IncomeExpenses/viewExpenses"><button class="page-change-button" >Other Expenses</button></a>
                    </div>
                    
                </div>
            </div>
            
            <div class="heading">
                <div class="heading-row">
                    <div class="cell">
                    <div class="headingDetails">
                        <div class="one">Student ID</div>
                        <div class="two">Student Name</div>
                        <div class="three">Date</div>
                        <div class="four">Time</div>
                        <div class="five">Amount</div>
                        <div class="six"></div>
                    </div>
                    </div>
                </div>
            </div>
            <div id = "tablerows" class="table" >

                
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>IncomeExpenses/expenseGraphic"><button class="income-graph-button" id="incomeGraph" name="incomeGraph">Graphical view</button></a>
                <a href="<?php echo URL?>Manager/incomeExpenses"><button class="back-button" id="back" name="back">Back</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/IncomeExpenses/viewExpenses-Student.js"></script>
</body>
</html>