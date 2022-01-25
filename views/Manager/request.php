<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/header.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/main/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/requests/structure.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/requests/containers.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/requests/tableStyle.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="header">

        <?php require_once APPROOT."/../views/common/header.php"; ?>
        
        
    </div>
    
    <!--body content of the page starts here-->
    <div class="main-container">
    <?php require_once APPROOT."/../views/common/ManagerSidebar.php"; ?>
        <div class="container">
            <!--Header-->
            <div class="topic"><h1>Requests</h1></div>
            <div class="link-set">
                <div class="session-link" id="sessionlink" onclick="viewSessions()">Sessions</div>
                <div class="exam-link" id="examLink" onclick="viewExams()">Exams</div>
            </div>
            <h3 id="request-counter"></h3>

            <div class="body-container">

                <div class="request-container">
                    <div class="table" id="tableRows">

                        
                    </div>
                </div> 
                <div class="details-container">
                    <div class="details" id="detailsList">

                        
                    
                    </div>
                    <div class="button-container" id="buttonContainer">

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/manager/requestsView.js"></script>
</body>
</html>