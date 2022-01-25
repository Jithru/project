<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.plot.ly/plotly-2.4.2.min.js'></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/exam_participation.css">
    <title>Lead driving school</title>

</head>
<body>
    <div class="body-container">
        <div class="heading"><h1>Exam Participation & Result</h1></div>
        <div class="selectors">
            <div class="method-selector">
                <label for="method-selector-button" class="method-selector-label">Select method:</label>
                <select class="method-selector-select" name="method-selector" id="methodSelector">
                    <optgroup>
                        <option value="Annualy">Annualy</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        
                    </optgroup>
                </select>
            </div>
            <div class="date-selector">
                <label for="date-container" class="date-container-label">Select Year:</label>
                <input type="week" class="date-container" name="dateContainer" id="dateContainer" required>
            </div>
            <div class="go-button-container">
                <button class="go-button" id="go" name="go">Go</button>
            </div>
        </div>
        
        <div class="chart-n-values">
            <div class="income-chart">
                <div  id="incomeChart"></div>
            </div>
            <div class="containers">
                <div class="container1">
                    <div class="max-container">
                        <div class="topic"><h2>Maximum Participation for written exam</h2></div>
                       
                        <div class="details"><div class="day"><h3>Septhember</h3></div><div class="amount"><h3>35</h3></div></div>
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Minimum Participation for written exam</h2></div>
                        <div class="details"><div class="day"><h3>April</h3></div><div class="amount"><h3>10</h3></div></div>
                        
                    </div>
                </div>
                <div class="container1">
                    <div class="max-container">
                        <div class="topic"><h2>Maximum Participation for trail exam</h2></div>
                       
                        <div class="details"><div class="day"><h3>December</h3></div><div class="amount"><h3>40</h3></div></div>
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>Minimum Participation for trail exam</h2></div>
                        <div class="details"><div class="day"><h3>May</h3></div><div class="amount"><h3>18</h3></div></div>
                        
                    </div>
                </div>
                <div class="container2">
                    <div class="max-container">
                        <div class="topic"><h2>No. of attempts for theory exam</h2></div>
                        <div class="details"><div class="amount"><h3>298</h3></div></div>
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>No. of pass of theory exam</h2></div>
                        <div class="details"><div class="amount"><h3>267</h3></div></div> 
                    </div>
                </div>
                <div class="container3">
                    <div class="max-container">
                        <div class="topic"><h2>No. of attempts for trail exam</h2></div>
                        <div class="details"><div class="amount"><h3>300</h3></div></div>
                    </div>
                    <div class="min-container">
                        <div class="topic"><h2>No. of pass of theory exam</h2></div>
                        <div class="details"><div class="amount"><h3>280</h3></div></div>
                    </div>
                </div>

            </div>
            
           
        </div>
        <div class="button-set">
            <a href="<?php echo URL?>Report/examParticipationDays"><button class="back-button" id="back" name="back">Back</button></a>
        </div>
    </div>
    
    <script src="<?php echo URL?>public/js/Report/exam_participation .js"></script>
    

</body>
</html>