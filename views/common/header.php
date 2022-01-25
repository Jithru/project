<link rel="stylesheet" href="<?php echo URL?>public/css/common/header.css">
<script src="<?php echo URL?>public/js/common/header.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="abc-header">
        <div class="header-container">
            <div class="reverse">
                <button class="sidebar-button" onclick="activeSB()">
                <i class="fa fa-bars" aria-hidden="true" id="bars"></i>
                </button>
                <div class="header-logo">
                <img src="<?php echo URL?>public/images/logo.png" alt="">
                </div>
            </div>
            <div class="header-com-name">
                <h1></h1>
            </div>
            
               <div class="username"><?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?></div> 
               
            <div class="header-profile">
                <img src="<?php echo URL?>public/images/profpic.png" alt="">
            </div>
        </div>
</div>