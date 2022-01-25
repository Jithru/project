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
                    <a href="<?php echo URL?>IncomeExpenses/studentExpenses"><button class="page-change-button" >Expenses of Students</button></a>
                    <button class="page-change-button" >Other Expenses<hr></button>
                    </div>
                    
                </div>
            </div>
            
            <div class="heading">
                <div class="heading-row">
                    <div class="cell">
                    <div class="headingDetails">
                        <div class="one">Expense ID</div>
                        <div class="two">Expense</div>
                        <div class="three">Accepted Manager</div>
                        <div class="four">Date</div>
                        <div class="five">Time</div>
                        <div class="six">Amount</div>
                    </div>
                    </div>
                </div>
            </div>
            <div id = "tablerows" class="table" onload="loadTable()">
                
            </div>
            <div class="button-container">
                <a href="<?php echo URL?>IncomeExpenses/expenseGraphic"><button class="income-graph-button" id="incomeGraph" name="incomeGraph">Graphical view</button></a>
                <a href="<?php echo URL?>Manager/incomeExpenses"><button class="back-button" id="back" name="back">Back</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/IncomeExpenses/viewExpenses.js"></script>
</body>
</html>