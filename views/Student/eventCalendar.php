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
    
    

    <title>Event Calendar</title>
</head>
<body>
<div class="confirmation-box" id="confirmation2">
          <div class="box-body">
              <div class="popup-content-box">
                  <p>You have already been sent maximum amount of requests :)</p>
                      <div class="popup-button-set">
                          <button class="popup-confirm" name="confirm" id="confirm-got">Got it</button>   
                      </div>
              </div>
          </div>
    </div>
    <div class="confirmation-box" id="confirmation">
          <div class="box-body">
              <div class="popup-content-box">
                  <p>Are you sure about sending request?</p>
                      <div class="popup-button-set">
                          <button class="popup-confirm" name="confirm" id="confirm" on>I'm sure</button>
                          <button class="popup-cancel" name="cancel" id="cancel" onclick="cancel()">I have to recheck</button>   
                      </div>
              </div>
          </div>
      </div>
    <div class="header">
      
    <?php require_once APPROOT."/../views/common/header.php"; ?>
        <!--this is the side bar content--> 
    </div>
    <!--body content of the page starts here-->
    <div class="main-container" id="main">
    <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>
    
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
                  <button class="page-change-button" id="sessionBtn">Assigned Sessions</button>
                  <button class="page-change-button" id="examBtn">Assigned Exams</button>
                  <button class="page-change-button" id="requestSessionBtn">Sessions</button>
                  <button class="page-change-button" id="requestExamBtn">Exams</button>
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
    <script src="<?php echo URL?>public/js/student/calendarUtil.js"></script>
    <script src="<?php echo URL?>public/js/common/calendarscript.js"></script> 
    <script src="<?php echo URL?>public/js/student/viewSessionsExams.js"></script> 
</body>
</html>