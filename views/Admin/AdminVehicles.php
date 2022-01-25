<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Admin_tabel_Styling.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/tabStyling.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/layOut_common.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/Screen_fit_ui.css">
    <link  rel="stylesheet" href="<?php echo URL?>public/css/admin/popup.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/admin/buttons.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/header.css">
    <!-- <script  src="<?php echo URL?>public/js/common/header.js"></script>
    <script src="<?php echo URL?>public/js/common/sidebar.js"></script> -->
    <script src="<?php echo URL?>public/js/admin/popup.js"></script>
    <script src="popup.js"></script>
    <title>Lead driving school</title>
</head>
<body>
    <div id="pop-div" class="popup-container">
        <div class="conf-box">
            <div class="msg-container">
                <h2>Delete Package?</h2>
                deleting a Vehicles will permenently remove it from your system 
            </div>
            <div class="btn-container">
                <button class="yess" onclick="cancel()">
                    No, keep Vehicles 
                </button >
                    
                <button class="no" onclick="yesDelete()">
                    Yes, Delete Vehicles
                </button>
            </div>
        </div>
     </div>
     <div id="pop-div2" class="popup-container2">
        <div class="conf-box2">
            <div class="input-container">
                <label for="">Password :</label>
                <input type="text"> 
            </div>
            <div class="btn-container2">
                <button class="yess" onclick="cancel2()">
                    Cancel 
                </button >
                    
                <button class="no">
                    Confirm
                </button>
            </div>
        </div>
     </div>
    <div class="box-1">
    <?php require_once APPROOT."/../views/common/header.php"; ?>
        <div class="box-2">
          <?php require_once APPROOT."/../views/common/AdminSidebar.php"; ?>
            <div class="container-1">
                <div class="title-container">
                   Vehicles
                </div>

                <div class="add-new-search-container">
                   <a href="<?php echo URL?>Admin/addVehicle"><button class="add-new">Add Vehicle</button></a> 
                   <input type="search" placeholder='&#xf002; Search'>
                </div>

                <div class="table-heading-container">
                    <div class="heading-row">
                        <div class="coll-1">Vehicle ID</div>
                        <div class="coll-2">Vehicle Type</div>
                        <div class="coll-3">Vehicle class</div>
                        <div class="coll-4">Vehicle Number</div>
                        <div class="coll-5">Added Date</div>
                        <div class="coll-6"></div>
                    </div> 
                </div>


                <div class="row-container" id="rows">

                </div>

                

            </div>
        </div>
    </div>
    
    
    <script src="<?php echo URL?>public/js/admin/vehicles.js"></script>
    
</body>


</html>