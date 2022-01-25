<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/ConductorParticipation.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div class="search">
                <div class="title">
                    <h2>Conductor Participation</h2>
                </div>
                <div class="search-bar">
                    <input type="text" class="search-val" placeholder="Search">
                </div>
            </div>
            <div class="table-header">
                <div class="div-1">
                    <div class="col-names">
                        <div class="cel-1">ID</div>
                        <div class="cel-2">Name </div>
                        <div class="cel-3">Role</div>
                        <div class="cel-4">Total Assignment</div>
                        <div class="cel-5">Participation</div>
                    </div>
                </div>
                <div class="div-2"></div>

            </div>
            <div class="table-details">
                <div class="table-container">
                    <div class="table">
                        <div class="table-row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
                        </div>
                        <div class="table-row">
                            <div class="col-1">INS001</div>
                            <div class="col-2">N.R. Senevirathne de silva</div>
                            <div class="col-3">30</div>
                            <div class="col-4">20</div>
                            <div class="col-5">20</div>
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
                            <a href="<?php echo URL?>Report/conductorGraphic"><button class="Graphical"> Graphical View</button></a>
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