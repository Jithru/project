<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> 
<div class="sidebar"  id="sidebar">
    <div class="nav-list">
        <a href="<?php echo URL?>Instructor/" class="<?php echo (getLink()=="http://localhost/project/Instructor/")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf007
            </div>
            <div class="link-name">
            Profile
            </div>
        </a>
        <a href="<?php echo URL?>Instructor/eventCalendar" class="<?php echo (getLink()=="http://localhost/project/Instructor/eventCalendar")?"list-item-active":"list-item";?>" >
            <div class="link-icon">
            &#xf073
            </div>
            <div class="link-name">
            Event Calendar
            </div>
        </a>
        <a href="<?php echo URL?>Instructor/sessions" class="<?php echo (getLink()=="http://localhost/project/Instructor/sessions")?"list-item-active":"list-item";?>" >
            <div class="link-icon">
            &#xf0ae
            </div>
            <div class="link-name">
            Sessions
            </div>
        </a>
        <a href="<?php echo URL?>Instructor/markAttendance" class="<?php echo (getLink()=="http://localhost/project/Instructor/markAttendance")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf046
            </div>
            <div class="link-name">
            Mark Attendance
            </div>
        </a>
        <a href="<?php echo URL?>Staff/logout" class="list-item">
            <div class="link-icon">
            &#xf08b
            </div>
            <div class="link-name">
            Log out
            </div>
        </a>
    </div>
    
</div>
