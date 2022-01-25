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