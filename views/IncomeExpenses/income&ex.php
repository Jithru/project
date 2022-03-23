    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/income&Expenses/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/Horizontaltab.css">

<div class="container">
            <!--Header-->
            <h1>Income & Expenses</h1>
            <div class="selectors">
            <div class="method-selector">
                <label for="method-selector-button" class="method-selector-label" >Select method:</label>
                <select class="method-selector-select" name="method-selector" id="methodSelector" onclick="inputSelector()">
                    
                    
                </select>
            </div>
            <div class="date-selector" id="dateSelector">

            </div>
            <div class="go-button-container">
                <button class="go-button" id="go" onclick="loadInitDetails()">Go</button>
            </div>
        </div>
            <div class="body-container">
                <div class="income-expense-box"> 
                    <div class="income-row">
                        <div class="name-field">Income</div>
                        <div class="value-field" id="incomeVal"></div>
                        <div class="view-more"><a href="<?php echo URL?>IncomeExpenses/viewIncome/"><button id="viewIncome" name="viewIncome">View more</button></div></a>
                    </div>
                    <div class="expense-row">
                        <div class="name-field">Expenses</div>
                        <div class="value-field" id="expenseVal"></div>
                        <div class="view-more"><a href="<?php echo URL?>IncomeExpenses/studentExpenses"><button id="viewExpenses" name="viewExpenses">View more</button></div></a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo URL?>public/js/IncomeExpenses/frontpage.js"></script>