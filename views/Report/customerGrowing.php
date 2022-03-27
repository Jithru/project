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
            Customer Growing
        </div>
        
        
        
        <div class="tab-container">
            
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
                <h4>Customer Growing</h4>
            </div>
            <div class="date"></div>
        <div class="hrr"></div>
            <div class="table">
                <div class="inner-table">
                    <div class="table-head">
                        <div class="col-names">
                            <div class="col-1">Date</div>
                            <div class="col-2">No of students registered <br>for written exams</div>
                            <div class="col-3">No of students registered <br>for trial exams</div>
                            <div class="col-4">No of students registered <br>for further practices</div>
                            <div class="col-5">Total registerd count</div>
                        </div>
                    </div>
    
                    
                    <div id="table-body" class="table-body"> 
                        <div class="row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                    
                    </div>
                </div>
                
            </div>

            <div class="hrr"></div>
            <div class="summary">
                
            <div class="total">
                            <div class="tot-col-1">
                                <h4>Total Registration for theory exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>100,000</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Total Registration for trail exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>100,000</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Total Registration for further practice</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                            <h5>100,000</h5>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Total</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <h5>100,000</h5>
                            </div>
                        </div>
                

                <div class="button">
                    <a href="<?php echo URL?>Report/customerGraphic"><button class="Graphical"> Graphical View</button></a>
                    <a href="<?php echo URL?>Report/report"> <button class="back">Back</button></a>
                </div>

            </div>
            <div class="hrr"></div>

        </div>
        
        <div class="btns">

        </div>
    </div>
    <script src="<?php echo URL?>public/js/Report/costomerGrowing.js"></script>
</body>
</html>