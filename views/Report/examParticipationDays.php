<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <title>Lead driving school</title>
</head>
<body>
    <div class="box-1">
        
        <div class="title">
        Exam Participation & Result
        </div>
        
        
        
        <div class="tab-container">
            <a href="<?php echo URL?>Report/examParticipationStudents"> <div class="tab-1">Students<hr class="tab-line"></div></a>
            <a href=""><div class="tab-2">Days</div></a>
        </div>
        
        
        
        <div class="selector">
            
            <div class="method-selector">
                <label for="method-selector-button" class="method-selector-label">Select method:</label>
                <select class="method-selector-select" name="method-selector" id="methodSelector" onchange="selectMethod()">
                    <optgroup>
                        <option value="Annualy">Annualy</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        
                    </optgroup>
                </select>
            </div>
<!-- week
month -->
            <div class="date-selector">
                <label for="date-container" class="date-container-label" id="lbl">Select Year:</label>
                <input type="number"  class="date-container" name="dateContainer" id="dateContainer" value="2022" required>
            </div>
            <div class="go-button-container">
                <button class="go-button" id="go" name="go" onclick="filter()">Go</button>
            </div>

            <div class="btn">
                <button id="print" class="print"  onclick="format()">Print</button>
                <button id="backk" class="backk">Back</button>
                <button id="downld" class="downld">Download PDF</button>
            </div>



        </div>
        
        
        
        <div id="container" class="container">
        <div class="hrr"></div>
            <div class="report-title">
                <h2>LEAD Driving School</h2>
                <h4>Exam Participation & Result</h4>
            </div>
            <div class="date"></div>
        <div class="hrr"></div>
            <div class="table">
                <div class="inner-table">
                    <div class="table-head">
                        <div class="col-names">
                        <div class="col-1">Date</div>
                        <div class="col-2">Participation for written exam</div>
                        <div class="col-3">Pass Count</div>
                        <div class="col-4">Participation for trail exam</div>
                        <div class="col-5">Pass Count</div>
                        
                        </div>
                    </div>
    
                    
                    <div id="table-body" class="table-body"> 
                        <div class="row">
                            <div class="col-1">2020/10/10</div>
                            <div class="col-2">100</div>
                            <div class="col-3">95</div>
                            <div class="col-4">120</div>
                            <div class="col-3">100</div>
                        </div>

                        <div class="row">
                            <div class="col-1">2020/11/10</div>
                            <div class="col-2">120</div>
                            <div class="col-3">115</div>
                            <div class="col-4">140</div>
                            <div class="col-3">120</div>
                        </div>

                        <div class="row">
                            <div class="col-1">2021/01/06</div>
                            <div class="col-2">90</div>
                            <div class="col-3">85</div>
                            <div class="col-4">100</div>
                            <div class="col-3">90</div>
                        </div>
                    
                    </div>
                </div>
                
            </div>

            <div class="hrr"></div>
            <div class="summary">
                
            <div class="total">
                            <div class="tot-col-1">
                                <h4>No. of attempts for theory exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>310</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>No. of passed of theory exams</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>310</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>No. of attempts for trail exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>310</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>No. of passed of trail exams</h4>
                            </div>
                            <div class="totcol-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <h5>310</h5>
                            </div>
                        </div>
                

                <div class="button">
                    <a href="<?php echo URL?>Report/exam_participation"><button class="Graphical"> Graphical View</button></a>
                    <a href="<?php echo URL?>Report/report"><button class="back"> Back</button></a>
                </div>

            </div>
            <div class="hrr"></div>

        </div>
        
        <div class="btns">

        </div>
    </div>
    <script src="<?php echo URL?>public/js/Report/exam1.js"></script>
</body>
</html>