<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/calendarStyle.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/EventCalendar/tablestyle.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/EventCalendar/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/EventCalendar/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/Horizontaltab.css">
    
    

    <title>Lead driving school</title>
</head>
<body>
    <div class="header">
      <?php require_once APPROOT."/../views/common/header.php"; ?>
    </div>
    <!--body content of the page starts here-->
    <div class="main-container" id="main">
    <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>
    
        <div class="body-container">
        <input type="hidden" id="selectedDateContainer" value="">
          <input type="hidden" id="examsContainer" value="">
          <input type="hidden" id="sessionsContainer" value="">
          <div class="container1">
            <div class="calender-buttons">
              <div class="calender">
                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h2></h2>
                        <p></p>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                </div>  
                <div class="days">
                </div> 
              </div>

            </div>
          </div>
          <div class="container2">
              <!--Header-->
              <h1>Event Calendar</h1>
              <div class="Horizontal-tab">
                <div class="tabContainer">
                <button class="page-change-button" id="sessionBtn">Sessions</button>
                  <button class="page-change-button" id="examBtn">Exams</button>
                </div>
              </div>
              <div class="heading">
                <div class="heading-row" id="headingRow">
                  <div class="cell">
                    <div class="headingDetails">
                      <div class="one">Session Id</div>
                      <div class="two">Title</div>
                      <div class="three">Type</div>
                      <div class="four">Time</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tableFixHead" id="tablerows">

                 
                  
              </div>
          </div>
        </div>
        
    </div>
    <script src="<?php echo URL?>public/js/receptionist/calendarUtil.js"></script>
    <script src="<?php echo URL?>public/js/common/calendarscript.js"></script> 
    <script src="<?php echo URL?>public/js/receptionist/viewSessionsExams.js"></script> 
</body>
</html>