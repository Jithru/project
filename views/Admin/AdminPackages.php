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
                    <a href="<?php echo URL?>Admin/packages"> <div class="tab-1">Packages & Prices<hr class="tab-line"></div></a>
                    <a href="<?php echo URL?>Admin/initExpences"><div class="tab-2">Service Charges for RMV </div></a>
                </div>
                

                <div class="info-container">
                    <div class="topic-container">
                        <h2>Initial Prices (Without training)</h2>
                    </div>
                    <hr class="topic-line">
                    <!-- <div class="addnew-btn-container">
                        <a href="<?php echo URL?>Admin/addInitPrices"><button class="add-new">Add New</button></a>
                    </div> -->
                    <div class="table-heading-container">
                        <div class="heading-row">
                            <div class="col-1">Vehicle Type</div>
                            <div class="col-2">Vehicle class</div>
                            <div class="col-3">Price (LKR)</div>
                            <div class="col-4"></div>
                            
                        </div> 
                    </div>
                    <div class="row-container" id="Initial-Prices">
                        
                    </div>
                </div>

                <div class="info-container">
                    <div class="topic-container">
                        <h2>Training Packages</h2>
                    </div>
                    <hr class="topic-line">

                    <div class="addnew-btn-container">
                        <a href="<?php echo URL?>Admin/addPackage"><button class="add-new">Add New</button></a>
                    </div>
                    <div class="table-heading-container">
                        <div class="heading-row">
                            <div class="col-1">Package Name</div>
                            <div class="col-2">Vehicle classes</div>
                            <div class="col-3">Price (LKR)</div>
                            <div class="col-4"></div>
                            
                        </div> 
                    </div>
                    <div class="row-container" id="packages">
                        <div class="row">
                            <div class="col-1"><b class="bold-name-3">Package Name</b><b class="bold">: </b>Package 1</div>
                            <div class="col-2"><b class="bold-name-3">Vehicle classes</b><b class="bold">: </b>A,B,B1</div>
                            <div class="col-3"><b class="bold-name-3">Price (LKR)</b><b class="bold">: </b>14500.00</div>
                            <div class="col-4"><a href="<?php echo URL?>Admin/editPackages"><button class="edit">Edit</button></a></div>
                        </div>

                        <div class="row">
                            <div class="col-1"><b class="bold-name-3">Package Name</b><b class="bold">: </b>Package 1</div>
                            <div class="col-2"><b class="bold-name-3">Vehicle classes</b><b class="bold">: </b>A,B,B1</div>
                            <div class="col-3"><b class="bold-name-3">Price (LKR)</b><b class="bold">: </b>14500.00</div>
                            <div class="col-4"><a href="<?php echo URL?>Admin/editPackages"><button class="edit">Edit</button></a></div>
                        </div>

                        <div class="row">
                            <div class="col-1"><b class="bold-name-3">Package Name</b><b class="bold">: </b>Package 1</div>
                            <div class="col-2"><b class="bold-name-3">Vehicle classes</b><b class="bold">: </b>A,B,B1</div>
                            <div class="col-3"><b class="bold-name-3">Price (LKR)</b><b class="bold">: </b>14500.00</div>
                            <div class="col-4"><a href="<?php echo URL?>Admin/editPackages"><button class="edit">Edit</button></a></div>
                        </div>

                        <div class="row">
                            <div class="col-1"><b class="bold-name-3">Package Name</b><b class="bold">: </b>Package 1</div>
                            <div class="col-2"><b class="bold-name-3">Vehicle classes</b><b class="bold">: </b>A,B,B1</div>
                            <div class="col-3"><b class="bold-name-3">Price (LKR)</b><b class="bold">: </b>14500.00</div>
                            <div class="col-4"><a href="<?php echo URL?>Admin/editPackages"><button class="edit">Edit</button></a></div>
                        </div>
                    </div>
                </div>

                <div class="info-container">
                    <div class="topic-container">
                        <h2>Extra Prices(per day)</h2>
                    </div>
                    <hr class="topic-line">
                    <!-- <div class="addnew-btn-container">
                        <a href="<?php echo URL?>Admin/addExtraPrices"><button class="add-new">Add New</button></a>
                    </div> -->

                    <div class="table-heading-container">
                        <div class="heading-row">
                            <div class="col-1">Vehicle Type</div>
                            <div class="col-2">Vehicle class</div>
                            <div class="col-3">Price (LKR)</div>
                            <div class="col-4"></div>
                            
                        </div> 
                    </div>
                    <div class="row-container" id="Extra-Prices">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script  src="<?php echo URL?>public/js/Admin/packages.js"></script>
</body>
</html>