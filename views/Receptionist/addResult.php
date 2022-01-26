<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/addResult.css">

    <script src="<?php echo URL?>public/js/receptionist/addResult.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="my-content">
            <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>
            <div class="view">
                <div class="part-1">
                    <div class="topic"><h2>Add Results</h2></div>
                </div>
                <div class="part-2">
                    <div class="dateofExam">
                        <input type="date" class="date" id="date" placeholder="Exam Date">
                        <button class="btn-search" id="btn-search" onclick="search()">Search</button>
                    </div>
                    <!-- <div class="exm-type">
                        <div class="exam-type">Exam:</div>
                        <div class="exam"></div>
                    </div> -->
                </div>
                <div class="part-3">
                    <div class="table-head">
                        <div class="one"><h4>ID</h4></div>
                        <div class="two"><h4>Name</h4></div>
                        <div class="three"><h4>Exam</h4></div>
                        <div class="four"></div>
                        <div class="five"></div>
                    </div>
                    <div class="table-body" id="table-body">
                        <div class="scroll" id="scroll">
                            <!-- data -->
                            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</body>
</html>