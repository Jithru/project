<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/customerGraph.css">
    <title>Lead driving school</title>

</head>
<body>
    <div class="body-container">
        <div class="heading"><h1>Customer Growing</h1></div>
        <div class="selectors">
            <div class="method-selector">
                <label for="method-selector-button" class="method-selector-label">Select method:</label>
                <select class="method-selector-select" name="method-selector" id="methodSelector">
                    <optgroup>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Annualy">Annualy</option>
                    </optgroup>
                </select>
            </div>
            <div class="date-selector">
                <label for="date-container" class="date-container-label">Select Week:</label>
                <input type="week" class="date-container" name="dateContainer" id="dateContainer" required>
            </div>
            <div class="go-button-container">
                <button class="go-button" id="go" name="go">Go</button>
            </div>
        </div>
        
        <div class="chart-n-values">
            <div class="income-chart">
                <canvas  id="incomeChart"></canvas>
            </div>
            <div class="containers">
                <div class="container1">
                    <div class="max-container">
                        <div class="topic"><h2>Maximum registration for theory exam</h2></div>
                        <div class="details"><div class="col-1"><h3>Thursday</h3></div><div class="col-2"><h3>10</h3></div></div>
                        <!-- <div class="details"><div class="col-1""><h3>Friday</h3></div><div class="col-2"><h3>10000.00</h3></div></div> -->
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Minimum registration for theory exam </h2></div>
                        <div class="details"><div class="col-1""><h3>Saturday</h3></div><div class="col-2"><h3>0</h3></div></div>
                        
                    </div>
                </div>
                <div class="container2">
                    <div class="max-container">
                        <div class="topic"><h2>Maximum registration for trail exam</h2></div>
                        <div class="details"><div class="col-1""><h3>Thursday</h3></div><div class="col-2"><h3>19</h3></div></div>
                        <!-- <div class="details"><div class="col-2"><h3>6642.85</h3></div></div> -->
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Minimum registration for trail exam </h2></div>
                        <!-- <div class="details"><div class="col-2"><h3>43</h3></div></div>  -->
                        <div class="details"><div class="col-1""><h3>Thursday</h3></div><div class="col-2"><h3>19</h3></div></div>
                    </div>
                </div>
                <div class="container3">
                    <div class="max-container">
                        <div class="topic"><h2>Total Registration for theory exam</h2></div>
                        <div class="details"><div class="col-2"><h3>430</h3></div></div>
                        <!-- <div class="details"><div class="col-1""><h3>Thursday</h3></div><div class="col-2"><h3>19</h3></div></div> -->
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Total Registration for trail exam</h2></div>
                        <div class="details"><div class="col-2"><h3>400</h3></div></div>
                        <!-- <div class="details"><div class="col-1""><h3>Saturday</h3></div><div class="col-2"><h3>2</h3></div></div> -->
                    </div>
                </div>
                <!-- <div class="container4">
                    <div class="max-container">
                        <div class="topic"><h2>Online Payments</h2></div>
                        <div class="details"><div class="col-2"><h3>10</h3></div></div>
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Cash Payments</h2></div>
                        <div class="details"><div class="amount"><h3>33</h3></div></div>
                    </div>
                </div> -->
            </div>
            
           
        </div>
        <div class="button-set">
        <a href="<?php echo URL?>report/customerGrowing"> <button class="back-button" id="back" name="back">Back</button></a>
        </div>
    </div>
    
    <script src="<?php echo URL?>public/js/Report/customerGraphScript.js"></script>
    

</body>
</html>