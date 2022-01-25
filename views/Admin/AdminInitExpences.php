<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/tabStyling.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/Admin_packages.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/layOut_common.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/header.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/responsive_pack.css">
    
    <script  src="<?php echo URL?>public/js/common/header.js"></script>
    <script src="<?php echo URL?>public/js/common/sidebar.js"></script>
    <title>Lead driving school</title>
</head>
<body>
    <div class="box-1">
    <?php require_once APPROOT."/../views/common/header.php"; ?>
        <div class="box-2">
          <?php require_once APPROOT."/../views/common/AdminSidebar.php"; ?>
          
            <div class="container-1">
                
                
                <div class="title-container">
                    <h1>Packages & Prices</h1>
                </div>
                
                
                <div class="tab-container">
                    <a href="<?php echo URL?>Admin/packages"> <div class="tab-1">Packages & Prices</div></a>
                    <a href="<?php echo URL?>Admin/initExpences"><div class="tab-2">Service Charges for RMV <hr class="tab-line"></div></a>
                </div>
                

                <div class="info-container">
                    <div class="topic-container">
                        <h2>Initial Charges</h2>
                    </div>
                    <hr class="topic-line">
                    <!-- <div class="addnew-btn-container">
                        <button class="add-new">Add New</button>
                    </div> -->

                    <div class="table-heading-container">
                        <div class="heading-row">
                            <div class="col-1">Number of Vehicles</div>
                            <div class="col-2"></div>
                            <div class="col-3">Price (LKR)</div>
                            <div class="col-4"></div>
                            
                        </div> 
                    </div>
                    <div class="row-container" id="Initial-Charges">

                    </div>
                </div>

                <div class="info-container">
                    <div class="topic-container">
                        <h2>Other charges</h2>
                    </div>
                    <hr class="topic-line">
                    <!-- <div class="addnew-btn-container">
                        <button class="add-new">Add New</button>
                    </div> -->
                    <div class="table-heading-container">
                        <div class="heading-row">
                            <div class="column-1">Task</div>
                            <div class="col-3">Price (LKR)</div>
                            <div class="col-4"></div>
                            
                        </div> 
                    </div>
                    <div class="row-container" id="Other-charges">
                    
                    </div>
                </div>

                

            </div>
        </div>
    </div>
    <script  src="<?php echo URL?>public/js/Admin/expences.js"></script>
</body>
</html>