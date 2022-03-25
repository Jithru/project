<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/examParticipation.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div class="search">
                <div class="title">
                    <h2>Exam Participation & Result</h2>
                </div>
                <div class="search-bar">
                    <input type="text" class="search-val" placeholder="Search">
                </div>
            </div>
            <div class="aaa">
                <div class="students">
                   <h3>Students</h3><hr class="hr-1">
                </div>
                <div class="days">
                   <a href="<?php echo URL?>Report/examParticipationDays"><h3>Days</h3></a> 
                </div>
            </div>
            <div class="table-header">
                <div class="div-1">
                    <div class="col-names">
                        <div class="cel-1">Student Id</div>
                        <div class="cel-2">Student Name</div>
                        <div class="cel-3">Theory Exam</div>
                        <div class="cel-4">No of attempts </div>
                        <div class="cel-5">Trail Exam</div>
                        <div class="cel-4">No of attempts </div>
                    </div>
                </div>
                <div class="div-2"></div>

            </div>
            <div class="table-details">
                <div class="table-container">
                    <div class="table">
                        <div class="table-row">
                            <div class="col-1">ST001</div>
                            <div class="col-2">N.R Senevirathne</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">1</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">1</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">ST002</div>
                            <div class="col-2">N.G. Weerasinghe</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">1</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">1</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">ST003</div>
                            <div class="col-2">P.P Jayasundara</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">2</div>
                            <div class="col-3">passed</div>
                            <div class="col-4">1</div>
                        </div>
 
                    </div>
                    <div class="sumary">
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>No. of attempts for theory exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <div class="tot-div">130</div>
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
                                <div class="tot-div">110</div>
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
                                <div class="tot-div">150</div>
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
                                <div class="tot-div">100</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-details">
                        <div class="filter-div-1">
                            <div class="filter-row-0">
                                <div class="filter-row-title">
                                    Filter By
                                </div>
                            </div>
    
                            <div class="filter-row">
                                <div class="date">
                                    <div class="radio-date">
                                        <div class="inf-radio"><input type="radio" class="day" value="week"> </div>
                                        <div class="inf-topic">Week</div>
                                    </div>
                                    <div class="input-date">
                                        <input type="text" class="date-field">
                                    </div>
                                </div>
                            </div>
    
                            <div class="filter-row">
                                <div class="date">
                                    <div class="radio-date">
                                        <div class="inf-radio"><input type="radio" class="day" value="month"> </div>
                                        <div class="inf-topic">Month</div>
                                    </div>
                                    <div class="input-date">
                                        <input type="text" class="date-field">
                                    </div>
                                </div>
                            </div>
    
                            <div class="filter-row">
                                <div class="date">
                                    <div class="radio-date">
                                        <div class="inf-radio"><input type="radio" class="day" value="year"> </div>
                                        <div class="inf-topic">Year</div>
                                    </div>
                                    <div class="input-date">
                                        <input type="text" class="date-field">
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="filter-div-2">
                            <div class="button">
                                <!-- <button class="Graphical"> Graphical View</button> -->
                                <a href="<?php echo URL?>Report/report"><button class="back"> Back</button></a>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/Report/exam_participation_students.js"></script>
</html>














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
                <h4>Attendance Report</h4>
            </div>
            <div class="date"></div>
        <div class="hrr"></div>
            <div class="table">
                <div class="inner-table">
                    <div class="table-head">
                        <div class="col-names">
                            <div class="cel-1">Session Id</div>
                            <div class="cel-2">Session Name</div>
                            <div class="cel-3">Date</div>
                            <div class="cel-4">Time</div> 
                            <div class="cel-5">Assigned students</div>
                            <div class="cel-6">Participated students</div>
                        
                        </div>
                    </div>
    
                    
                    <div id="table-body" class="table-body"> 
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
                        </div>
                        <div class="row">
                            <div class="cel-1">SE001</div>
                            <div class="cel-2">Road Signs</div>
                            <div class="cel-3">2021/10/10</div>
                            <div class="cel-4">09.00am</div>
                            <div class="cel-5">18</div>
                            <div class="cel-6">15</div>
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
    <script src="<?php echo URL?>public/js/Report/main.js"></script>
</body>
</html>