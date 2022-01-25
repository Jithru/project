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
                <a href="<?php echo URL?>Report/examParticipationStudents"><h3>Students</h3></a>
                </div>
                <div class="days">
                    <h3>Days</h3><hr class="hr-2">
                </div>
            </div>
            <div class="table-header">
                <div class="div-1">
                    <div class="col-names">
                        <div class="cel-1">Date</div>
                        <div class="cel-2">Participation for written exam</div>
                        <div class="cel-3">Pass Count</div>
                        <div class="cel-4">Participation for trail exam</div>
                        <div class="cel-5">Pass Count</div>
                        <!-- <div class="cel-4">No of attempts </div> -->
                    </div>
                </div>
                <div class="div-2"></div>

            </div>
            <div class="table-details">
                <div class="table-container">
                    <div class="table">
                        <div class="table-row">
                            <div class="col-1">2020/10/10</div>
                            <div class="col-2">100</div>
                            <div class="col-3">95</div>
                            <div class="col-4">120</div>
                            <div class="col-3">100</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">2020/11/10</div>
                            <div class="col-2">120</div>
                            <div class="col-3">115</div>
                            <div class="col-4">140</div>
                            <div class="col-3">120</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">2021/01/06</div>
                            <div class="col-2">90</div>
                            <div class="col-3">85</div>
                            <div class="col-4">100</div>
                            <div class="col-3">90</div>
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
                                <div class="tot-div">310</div>
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
                                <div class="tot-div">295</div>
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
                                <div class="tot-div">360</div>
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
                                <div class="tot-div">310</div>
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
                            <a href="<?php echo URL?>Report/exam_participation"><button class="Graphical"> Graphical View</button></a>
                                <a href="<?php echo URL?>Report/report"><button class="back"> Back</button></a>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
</body>
</html>