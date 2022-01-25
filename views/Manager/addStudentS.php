<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/addConductor&Vehicle&Student/addConductor&Vehicle&Student.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/addConductor&Vehicle&Student/tableStyle.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="main-content">
        <div class="addInstructor-box">
            <div class="topic">
                <h1>Add Student</h1>
            </div>
            <div class="heading-row">
                    <div class="heading-cell">
                        <div class="information">
                            <div class="one">ID</div>
                            <div class="two">Name</div>
                            <div class="three">Allocation</div>
                        </div>
                    </div>
            </div>
            <div class="table">
                <div class="row">
                    <div class="cell">
                        <div class="information">
                            <div class="one">ST1001</div>
                            <div class="two">N.R.Senevirathne</div>
                            <div class="three">0/4</div>
                        </div>
                        <div class="addButton">
                            <button id="Add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-part">
                <div class="participation-count">
                    <p>1</p><p>Participants</p>
                </div>
                <div class="button-set">
                    <a href="<?php echo URL?>Manager/addSession"><button class="cancel" id="cancel" name="cancel">Back</button></a>
                    <button class="save" id="save" name="save">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>