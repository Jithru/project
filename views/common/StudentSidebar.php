<link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> 
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div class="sidebar">

    <div class="nav-list">
        <a class="list-item" href="<?php echo URL?>Student/" class="<?php echo (getLink()=="http://localhost/project/Student/")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf007</span>
            <span class="link-name">Profile</span>
        </a>
        
        <a class="list-item" href="<?php echo URL?>Student/eventCalendar" class="<?php echo (getLink()=="http://localhost/project/Student/eventCalendar")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf073</span>
            <span class="link-name">Event Calendar</span>
        </a>
        <a class="list-item" href="<?php echo URL?>Student/payments" class="<?php echo (getLink()=="http://localhost/project/Student/payments")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf0d6</span>
            <span class="link-name">Payment Details</span>
        </a>
        
        <a class="list-item" href="<?php echo URL?>Student/examdetails" class="<?php echo (getLink()=="http://localhost/project/Student/examdetails")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf02d</span>
            <span class="link-name">Exam Details</span>
        </a>
        <a class="list-item" href="<?php echo URL?>Student/markGoingNotGoing" class="<?php echo (getLink()=="http://localhost/project/Student/markGoingNotGoing")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf0c0</span>
            <span class="link-name">Sessions</span>
        </a>
        
        <!-- <a class="list-item" href="<?php echo URL?>student/makepayments">
            <span class="link-icon">&#xf09d</span>
            <span class="link-name">Pay Online</span>
        </a> -->

        <a class="list-item" href="<?php echo URL?>Student/complaints" class="<?php echo (getLink()=="http://localhost/project/Student/complaints")?"list-item-active":"list-item";?>">
            <span class="link-icon">&#xf010</span>
            <span class="link-name">Reviews & Complaints</span>
        </a>

        <!-- <a class="list-item" href="#">
            <span class="link-icon">&#xf010</span>
            <span class="link-name">About Us</span>
        </a> -->

        <a class="list-item" href="<?php echo URL?>User/logout">
            <span class="link-icon">&#xf08b</span>
            <span class="link-name">Log Out</span>
        </a>
    </div>
</div>