<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/sessions.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>

        <div class="main">
            <!-- <div class="sidebar"> -->
                <!-- <ul>
                    <li class="menu-list"><a class="links" href="http://localhost/project/receptionist/profile">Profile</a></li>
                    <li class="menu-list"><a class="links" href="#">Event Calendar</a></li>
                    <li class="menu-list"><a class="links" href="http://localhost/project/receptionist/sessions">Sessions</a></li>
                    <li><a href="http://localhost/project/receptionist/payments">Payments</a></li>
                    <li class="menu-list"><a class="links" href="#">Reports</a></li>
                    <li class="menu-list"><a class="links" href="http://localhost/project/receptionist/studentList">Student list</a></li>
                    <li class="menu-list"><a class="links" href="http://localhost/project/receptionist/registration">Registration</a></li>
                    <li><a href="http://localhost/project/receptionist/addResult">Results Adding</a></li>
                    <li class="menu-list"><a class="links" href="#">About Us</a></li>
                    <li class="menu-list"><a class="links" href="#">Logout</a></li>
                </ul> -->
            <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>

            <div class="view">
                <div class="part-1">
                    <div class="topic"><b>Sessions</b></div>
                </div>
                
                <div class="part-2">
                    <div class="ava">
                        <button class="all">All</button>
                        <button class="today">Today</button>
                    </div>
                    <div class="none"></div>
                </div>
                
                <div class="part-3">
                    <div class="table-head">
                        <div class="z-row"></div>
                        <div class="one"><h4>ID</h4></div>
                        <div class="two"><h4>Title</h4></div>
                        <div class="three"><h4>Date</h4></div>
                        <div class="four"><h4>Time</h4></div>
                        <div class="five"><h4>Instructor</h4></div>
                        <div class="six"><h4></h4></div>
                    </div>
                    <div class="table-body">
                        <div class="scroll">
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">Started</div>
                            </div>
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">Started</div>
                            </div>
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">To be started</div>
                            </div>
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">To be started</div>
                            </div>
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">To be started</div>
                            </div>
                            <div class="row-1">
                                <div class="zero"></div>
                                <div class="col-1"><p>103</p></div>
                                <div class="col-2"><p>Session Title</p></div>
                                <div class="col-3"><p>09/23/2021</p></div>
                                <div class="col-4"><p>08:00</p></div>
                                <div class="col-5"><p>Mr.Saman</p></div>
                                <div class="col-6">To be started</div>
                            </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>