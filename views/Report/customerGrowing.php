<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/customerGrowing.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div class="search">
                <div class="title">
                    <h2>Customer Growing</h2>
                </div>
                <div class="search-bar">
                    <input type="text" class="search-val" placeholder="Search">
                </div>
            </div>
            <div class="table-header">
                <div class="div-1">
                    <div class="col-names">
                        <div class="cel-1">Date</div>
                        <div class="cel-2">No of students registered <br>theory exams</div>
                        <div class="cel-3">No of students registered <br>for theory exams</div>
                        <div class="cel-4">No of students registered <br>for theory exams</div>
                        <div class="cel-5">Total registerd count</div>
                    </div>
                </div>
                <div class="div-2"></div>

            </div>
            <div class="table-details">
                <div class="table-container">
                    <div class="table">
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">2021/10/10</div>
                            <div class="col-2">50</div>
                            <div class="col-3">30</div>
                            <div class="col-4">2</div>
                            <div class="col-5">82</div>
                        </div>
                        

                    </div>
                    <div class="sumary">
                        <div class="total">
                            <div class="tot-col-1">
                                <h4>Total Registration for theory exam</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <div class="tot-div">10,000</div>
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
                                <div class="tot-div">10,000</div>
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
                                <div class="tot-div">30,000</div>
                            </div>
                        </div>
                        <div class="total-last">
                            <div class="tot-col-1">
                                <h4>Total</h4>
                            </div>
                            <div class="tot-col-2">
                                <h4>:</h4>
                            </div>
                            <div class="tot-col-3">
                                <div class="tot-div">100,000</div>
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
                            <a href="<?php echo URL?>Report/customerGraphic"><button class="Graphical"> Graphical View</button></a>
                                <a href="<?php echo URL?>Report/report"> 
                                    <button class="back" id="back" name="back">Back</button>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
</body>
</html>