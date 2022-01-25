<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "<?php echo URL?>public/css/student/MarkGoingNotGoing.css">
    <title>Lead driving school</title>
<body>
    <div class="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>

        </div>


        <div class="main">
            <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>

            <div class="view">
                <div class="profile">
                    <div class="title">
                        <div class="ti-name">
                            <h1>Sessions</h1>
                        </div>
                    </div>
                </div>
                <div class="summary">
                    <div class="summary-title">
                    <div class="today">Today <br> <hr></div>
                        <div class="all">All</div>
                        
                    </div>
                </div>
                <div class="table-container">
                    <div class="table">
                        <div class="table-tiltle">
                            <div class="row-title">
                                <div class="cel">ID</div>
                                <div class="cel">Title</div>
                                <div class="cel">Date</div>
                                <div class="cel">Time</div>
                            </div>

                        </div>
                        <div class="data" id="data">

                            <!-- <div class="row">
                                <div class="col">186</div>
                                <div class="col">Traffic lights</div>
                                <div class="col">2019/10/20</div>
                                <div class="col">01.30</div>
                                <div class="col">
                                    <button class="going">Going</button>
                                </div>
                                <div class="col">
                                    <button class="notgoing">Not Going</button>
                                </div>
                            </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/student/TodaySession.js"></script>

</body>

