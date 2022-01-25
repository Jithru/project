<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> 
<div class="sidebar"  id="sidebar">
    <div class="nav-list">
        <a href="<?php echo URL?>Manager/" class="<?php echo (getLink()=="http://localhost/project/Manager/")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf007
            </div>
            <div class="link-name">
            Profile
            </div>
        </a>
        <a href="<?php echo URL?>Manager/eventCalendar" class="<?php echo (getLink()=="http://localhost/project/Manager/eventCalendar")?"list-item-active":"list-item";?>" >
            <div class="link-icon">
            &#xf073
            </div>
            <div class="link-name">
            Event Calendar
            </div>
        </a>
        <a href="<?php echo URL?>Manager/request" class="<?php echo (getLink()=="http://localhost/project/Manager/request")?"list-item-active":"list-item";?>" >
            <div class="link-icon">
            &#xf064
            </div>
            <div class="link-name">
            Requests
            </div>
        </a>
        <a href="<?php echo URL?>Manager/studentList" class="<?php echo (getLink()=="http://localhost/project/Manager/studentList")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf03a
            </div>
            <div class="link-name">
            List Of Students
            </div>
        </a>
        <a href="<?php echo URL?>Manager/incomeExpenses" class="<?php echo (getLink()=="http://localhost/project/Manager/incomeExpenses")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf09d
            </div>
            <div class="link-name">
            Income & Expences
            </div>
        </a>
        <a href="<?php echo URL?>Report/report" class="list-item">
            <div class="link-icon">
            &#xf080
            </div>
            <div class="link-name">
            Reports
            </div>
        </a>
        <a href="<?php echo URL?>Manager/addExpenses" class="<?php echo (getLink()=="http://localhost/project/Manager/addExpenses")?"list-item-active":"list-item";?>">
            <div class="link-icon">
            &#xf067
            </div>
            <div class="link-name">
            Expense Recording
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
