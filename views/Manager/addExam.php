<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/addSession&Exam/structure.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="main">
        <div class="form-box">
            <div class="topic-header"><h1>Add Exam</h1></div>
            <div class="body-content">
                <div class="form-content">
                    <div class="box" id="box">
                        <div class="msg" id="msg"></div>
                    </div>
                    <!-- <div class="id-class">
                        <label for="idNo">ID:</label>
                        <input type="text" class="session-text" name="idNo" id="idNo"> 
                    </div> -->
                    <div class="type-class">
                        <label for="type">Type:</label>
                        <select name="type" id="type">
                            <optgroup>
                                <option value="noValue">Type</option>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="date-class">
                        <label for="date">Date:</label>
                    
                        <input type="date" name="date" id="date" value="<?php echo isset($_SESSION['date'])?$_SESSION['date']:"";?>">
                    </div>
                    <div class="time-class">
                        <label for="time">Time:</label>
                        <input type="time" name="time" id="time" value="<?php echo isset($_SESSION['time'])?$_SESSION['time']:"";?>" >
                    </div>
                    <div class="add-instructor-class">
                        <label for="add-instructor">Instructor:</label>
                        <button class="session-buttons" name="add-instructor" id="add-instructor" onclick="callInstructorsPage()">ADD CONDUCTOR</button>
                    </div>
                    <div class="add-vehicle-class">
                        <label for="add-vehicle">Vehicle:</label>
                        <button class="session-buttons"name="add-vehicle" id="add-vehicle" onclick="callVehiclesPage()">ADD VEHICLE</button>
                    </div>

                </div>
                
                <div class="button-set">
                    <a href="<?php echo URL?>Manager/eventCalendar"><button class="session-buttons" name="cancel" id="cancel" >CANCEL</button></a>
                    <button class="session-buttons"name="confirm" id="confirm" onclick="submitExam()">CONFIRM</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/manager/navigateCheckE.js"></script>
</body>
</html>