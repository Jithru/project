<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/viewConductor&Vehicle&Student.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/tableStyle.css">
    <title>Lead driving school</title>

</head>
<body>
    <div class="main-content">
        <div class="addInstructor-box">
            <div class="topic">
                <h1>Instructors</h1>
            </div>
            <div class="heading-row">
                    <div class="heading-cell">
                        <div class="information">
                            <div class="one">ID</div>
                            <div class="two">Name</div>
                            <div class="three">Role</div>
                        </div>
                    </div>
            </div>
            <div class="table" id="tableRows">

            </div>
            <div class="bottom-part">
            <div class="button-set">
                    <a href="<?php echo URL?>Receptionist/viewExam"><button class="cancel" id="cancel" name="cancel">Back</button></a>
                </div>
                <div class="participation-count">
                    <p id="count"></p><p>Participants</p>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/receptionist/viewInstructor.js"></script>
</body>
</html>