<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/changeConductorVehicleStudent/structure.css"> 
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/changeConductorVehicleStudent/tablestyle.css"> 
    <title>Lead driving school</title>
    <div class="main-page">
        <div class="topic">
            <h1>Change Assigned conductors</h1>
        </div>
        <div class="body-content">
            <input type="hidden" id="idContainer" value="">
            <div class="left-side">
                <div class="heading">
                    <div class="heading-row">
                      <div class="heading-cell">
                        <h2>Currently selected</h2>
                      </div>
                    </div>
                </div>
                <div class="table-topic">
                    <div class="topic-row">
                        <div class="topic-cell">
                            <div class="topic-information">
                                <div class="topic-one">ID</div>
                                <div class="topic-two">Name</div>
                                <div class="topic-three">Title</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table" id="tableRows1">

                </div>
            </div>
            <div class="right-side">
                <div class="heading">
                    <div class="heading-row">
                      <div class="heading-cell">
                        
                        <h2>Currently unselected</h2>
                      </div>
                    </div>
                </div>
                <div class="table-topic">
                    <div class="topic-row">
                        <div class="topic-cell">
                            <div class="topic-information">
                                <div class="topic-one">ID</div>
                                <div class="topic-two">Name</div>
                                <div class="topic-three">Title</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table" id="tableRows2">

                </div>
            </div>
        </div>
        <div class="button-set">
            <a href="<?php echo URL?>Manager/editExam"><button class="session-buttons" name="back" id="back" >Back</button></a>
            <button class="session-buttons"name="save" id="save">Save changes</button>
        </div>    
    </div>
</head>
<body>
<script src="<?php echo URL?>public/js/manager/changeInstructor.js"></script>
</body>
</html>