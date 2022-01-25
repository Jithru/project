    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/IncomeExpenses/income&Expenses/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/Horizontaltab.css">

<div class="container">
            <!--Header-->
            <h1>Income & Expenses</h1>
            <div class="Horizontal-tab">
                <div class="tabContainer">
                  <button class="page-change-button" onclick="changeFilter(event,'All')">Day</button>
                  <button class="page-change-button" onclick="changeFilter(event,'Ssessions')">Month</button>
                  <button class="page-change-button" onclick="changeFilter(event,'Exams')">Year</button>
                </div>
                <div class="date-container">
                    <Label for="date-container"class="date-label">Date</Label><input type="date" name="date" id="date">
                </div>
            </div>
            <div class="body-container">
                <div class="income-expense-box"> 
                    <div class="income-row">
                        <div class="name-field">Income</div>
                        <div class="value-field">15,000LKR</div>
                        <div class="view-more"><a href="<?php echo URL?>IncomeExpenses/viewIncome/"><button id="viewIncome" name="viewIncome">View more</button></div></a>
                    </div>
                    <div class="expense-row">
                        <div class="name-field">Expenses</div>
                        <div class="value-field">10,000LKR</div>
                        <div class="view-more"><a href="<?php echo URL?>IncomeExpenses/studentExpenses"><button id="viewExpenses" name="viewExpenses">View more</button></div></a>
                    </div>
                </div>
            </div>
        </div>