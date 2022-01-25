<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/attendance.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div class="search">
                <div class="title">
                    <h2>Attendance Report</h2>
                </div>
                <div class="search-bar">
                    <input type="text" class="search-val" placeholder="Search">
                </div>
            </div>
            <div class="aaa">
                <div class="students">
                   <h3>Sessions</h3><hr class="hr-2">
                </div>
                <div class="Session">
                    <a href="<?php echo URL?>Report/attendanceStudent"><h3>Students</h3></a>
                </div>
            </div>
            <div class="table-header">
                <div class="div-1">
                    <div class="col-names">
                        <div class="cel-1">Session Id</div>
                        <div class="cel-2">Session Name</div>
                        <div class="cel-3">Date</div>
                        <div class="cel-4">Time</div> 
                        <div class="cel-5">Assigned students</div>
                        <div class="cel-5">Participated students</div>
                    
                    </div>
                </div>
                <div class="div-2"></div>

            </div>
            <div class="table-details">
                <div class="table-container">
                    <div class="table">
                        <div class="table-row">
                            <div class="col-1">SE001</div>
                            <div class="col-2">Road Signs</div>
                            <div class="col-3">2021/10/10</div>
                            <div class="col-4">09.00am</div>
                            <div class="col-3">18</div>
                            <div class="col-3">15</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">SE001</div>
                            <div class="col-2">Road Signs</div>
                            <div class="col-3">2021/10/10</div>
                            <div class="col-4">09.00am</div>
                            <div class="col-3">18</div>
                            <div class="col-3">15</div>
                        </div>

                        <div class="table-row">
                            <div class="col-1">SE001</div>
                            <div class="col-2">Road Signs</div>
                            <div class="col-3">2021/10/10</div>
                            <div class="col-4">09.00am</div>
                            <div class="col-3">18</div>
                            <div class="col-3">15</div>
                        </div>
 
                    </div>
                    <div class="sumary">
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Total sessions</h4>
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
                                <h4>Total assigns</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <div class="tot-div">87%</div>
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
                                <div class="tot-div">360</div>
                            </div>
                        </div>
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Participation average</h4>
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
                                <a href="<?php echo URL?>Report/attendence_sessions"><button class="Graphical"> Graphical View</button></a>
                                <a href="<?php echo URL?>Report/report"><button class="back"> Back</button></a>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
</body>
</html>