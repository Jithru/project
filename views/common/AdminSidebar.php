<link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css"> 
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="sidebar" id="sidebar">

    <div class="nav-list">
        <a class="<?php echo (getLink()=="http://localhost/project/Admin")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin">
            <span class="link-icon">&#xf007</span>
            <span class="link-name">Profile</span>
        </a>
        
        <a class="<?php echo (getLink()=="http://localhost/project/Admin/staff")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/staff">
            <span class="link-icon">&#xf0c0</span>
            <span class="link-name">Staff</span>
        </a>
        <a class="<?php echo (getLink()=="http://localhost/project/Admin/packages")||(getLink()=="http://localhost/project/Admin/initExpences")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/packages">
            <span class="link-icon">&#xf0d6</span>
            <span class="link-name">Packages & prices</span>
        </a>
        
        <a class="<?php echo (getLink()=="http://localhost/project/Admin/employeeAccounts")||(getLink()=="http://localhost/project/Admin/studentAccounts")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/employeeAccounts">
            <span class="link-icon">&#xf115</span>
            <span class="link-name">Accounts</span>
        </a>
        <a class="<?php echo (getLink()=="http://localhost/project/Admin/vehicles")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/vehicles">
            <span class="link-icon">&#xf1b9</span>
            <span class="link-name">Vehicles</span>
        </a>
        
        <a class="<?php echo (getLink()=="http://localhost/project/Report/report")?"list-item-active":"list-item";?>" href="<?php echo URL?>Report/report">
            <span class="link-icon">&#xf080</span>
            <span class="link-name">Reports</span>
        </a>

        <a class="<?php echo (getLink()=="http://localhost/project/Admin/viewComlain")||(getLink()=="http://localhost/project/Admin/viewReview")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/viewComlain">
            <span class="link-icon">&#xf0e6</span>
            <span class="link-name">Complaints & Reviews</span>
        </a>

        <a class="<?php echo (getLink()=="http://localhost/project/Admin/IncomeExpenses")?"list-item-active":"list-item";?>" href="<?php echo URL?>Admin/IncomeExpenses">
            <span class="link-icon">&#xf09d</span>
            <span class="link-name">Income & Expences</span>
        </a>

        <a class="<?php echo (getLink()=="http://localhost/project/User/logout")?"list-item-active":"list-item";?>" href="<?php echo URL?>User/logout">
            <span class="link-icon">&#xf08b</span>
            <span class="link-name">Logout</span>
        </a>
    </div>
</div>