

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
            Attendance Report
        </div>
        
        
        
        <div class="tab-container">
            <a href=""> <div class="tab-1">Session<hr class="tab-line"></div></a>
            <a href="<?php echo URL?>Report/attendanceStudent"><div class="tab-2">Students</div></a>
        </div>
        
        
        
        <div class="selector">
            
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
                <h4>Attendance Report</h4>
            </div>
            <div class="date"></div>
        <div class="hrr"></div>
            <div class="table">
                <div class="inner-table">
                    <div class="table-head">
                        <div class="col-names">
                            <div class="col-1">ID</div>
                            <div class="col-2">Name </div>
                            <div class="col-3">Role</div>
                            <div class="col-4">Total Assignment</div>
                            <div class="col-5">Participation</div>
                        
                        </div>
                    </div>
    
                    
                    <div id="table-body" class="table-body"> 
                    <div class="row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                    
                    </div>
                </div>
                
            </div>

            <div class="hrr"></div>
            <div class="summary">
                
                <div class="total">
                    <div class="tot-col-1">
                        <h4>Total No. of students</h4>
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
                        <h4>Participation average per session</h4>
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
                        <h4>Total participation</h4>
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
                    <div class="tot-col-2">
                        <h4>:</h4>
                    </div>
                    <div class="tot-col-3">
                        <h5>310</h5>
                    </div>
                </div>
                

                <div class="button">
                    <a href="<?php echo URL?>Report/attendence_sessions"><button class="Graphical"> Graphical View</button></a>
                    <a href="<?php echo URL?>Report/report"><button class="back"> Back</button></a>
                </div>

            </div>
            <div class="hrr"></div>

        </div>
        
        <div class="btns">

        </div>
    </div>
    <script src="<?php echo URL?>public/js/Report/conductorPart.js"></script>
</body>
</html>