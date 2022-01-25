<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Admin_tabel_Styling.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/tabStyling.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/layOut_common.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Screen_fit_ui.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/header.css">
    <title>Lead driving school</title>
</head>
<body>

    <div class="box-1">
    <?php require_once APPROOT."/../views/common/header.php"; ?>
        <div class="box-2">
          <?php require_once APPROOT."/../views/common/AdminSidebar.php"; ?>
            <div class="container-1">
                <div class="title-container">
                    Accounts
                </div>

                <div class="tab-container">
                    <a href="<?php echo URL?>Admin/employeeAccounts"><div class="tab-1">Employees</div></a>
                    <a href="<?php echo URL?>Admin/StudentAccounts"><div class="tab-2">Students<hr class="tab-line"></div></a>
                </div>

                <div class="search-container">
                <input type="search" placeholder='&#xf002; Search'>
                </div>

                <div class="table-heading-container">
                    <div class="heading-row">
                        <div class="column-1">Student ID</div>
                        <div class="column-2">Name</div>
                        <div class="column-3">Contact</div>
                        <div class="column-4"></div>
                        
                    </div> 
                </div>
                <div class="row-container" id="row-container">
                    

                </div>

            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/Admin/studentAccount.js"></script>
</body>
</html>