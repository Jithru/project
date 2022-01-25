<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/conductorGraph.css">
    <title>Lead driving school</title>

</head>
<body>
    <div class="body-container">
        <div class="heading"><h1>Conductor Participation</h1></div>
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
                        <div class="topic"><h2>Maximum Participation</h2></div>
                        <div class="details"><div class="day"><h3>Jagath</h3></div><div class="amount"><h3>10</h3></div></div>
                        
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Minimum Participation</h2></div>
                        <div class="details"><div class="day"><h3>Sunil</h3></div><div class="amount"><h3>1</h3></div></div>
                        
                    </div>
                </div>
            </div>
            
           
        </div>
        <div class="button-set">
            <a href="<?php echo URL?>report/conductorParticipation"> <button class="back-button" id="back" name="back">Back</button></a>
           
        </div>
    </div>
    
    <script src="<?php echo URL?>public/js/Report/conductorGraphScript.js"></script>
    

</body>
</html>