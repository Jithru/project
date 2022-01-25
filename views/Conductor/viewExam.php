<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/editSession&Exam/structure.css">
    <title>Exam</title>
</head>
<body>
<div class="main">
        <div class="form-box">
            <h1>Exam</h1>
            <div class="body-content">
                <div class="form-content">
                    <div class="id-class">
                        <label for="idNo">ID:</label>
                        <div id="idContainer"></div>
                        <div class="edit-button"></div>
                    </div>
                    <div class="type-class">
                        <label for="type">Type:</label>
                        <div id="typeContainer"></div>
                        <div class="edit-button"></div>
                    </div>
                    <div class="date-class">
                        <label for="date">Date:</label>
                        <div id="dateContainer"></div>
                        <div class="edit-button"></div>
                    </div>
                    <div class="time-class">
                        <label for="time">Time:</label>
                        <div id="timeContainer"></div>
                        <div class="edit-button"></div>
                    </div>
                    <div class="add-instructor-class">
                        <label for="add-instructor">Instructor:</label>
                        <button class="session-buttons" name="add-instructor" id="add-instructor" onclick="viewInstructor()">View Instructor</button>
                        <div class="blank"></div>
                    </div>
                    <div class="add-vehicle-class">
                        <label for="add-vehicle">Vehicle:</label>
                        <button class="session-buttons" name="add-vehicle" id="add-vehicle" onclick="viewVehicle()">View Vehicle</button>
                        <div class="blank"></div>
                    </div>

                    <div class="add-student-class">
                        <label for="add-participant">Students:</label>
                        <button class="session-buttons" name="add-participants" id="add-participants" onclick="viewStudents()">View Students</button>
                        <div class="blank"></div>
                    </div>
                </div>
                <div class="button-set">
                    <a href="<?php echo URL?>Instructor/eventCalendar"><button class="session-buttons" name="cancel" id="cancel" >Back</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/instructor/viewExam.js"></script> 
</body>
</html>