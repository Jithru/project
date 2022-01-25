<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> 
<div class="sidebar"  id="sidebar">
    <div class="nav-list">
        <a href="<?php echo URL?>Receptionist/" class="<?php echo (getLink()=="http://localhost/project/Receptionist/")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf007
            </div>
            <div class="link-name">
            Profile
            </div>
        </a>
        <a href="<?php echo URL?>Receptionist/eventCalendar" class="<?php echo (getLink()=="http://localhost/project/Receptionist/eventCalendar")?"list-item-active":"list-item";?>" >
            <div class="link-icon">
            &#xf073
            </div>
            <div class="link-name">
            Event Calendar
            </div>
        </a>

        </a>
        <a href="<?php echo URL?>Receptionist/addResult" class="<?php echo (getLink()=="http://localhost/project/Receptionist/addResult")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf0f6
            </div>
            <div class="link-name">
            Add results
            </div>
        </a>

        <a href="<?php echo URL?>Receptionist/sessions" class="<?php echo (getLink()=="http://localhost/project/Receptionist/sessions")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf0ae
            </div>
            <div class="link-name">
            Sessions
            </div>
        </a>
        <a href="<?php echo URL?>Receptionist/studentList" class="<?php echo (getLink()=="http://localhost/project/Receptionist/studentList")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf03a
            </div>
            <div class="link-name">
            Student List
            </div>
        </a>
        <a href="<?php echo URL?>User/logout" class="list-item">
            <div class="link-icon">
            &#xf08b
            </div>
            <div class="link-name">
            Log out
            </div>
        </a>
    </div>
    
</div>
