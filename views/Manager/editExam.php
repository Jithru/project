<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Manager/editSession&Exam/structure.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="confirmation-box" id="confirmation">
          <div class="box-body">
              <div class="popup-content-box">
                  <p>Are you sure you want to delete this?</p>
                      <div class="popup-button-set">
                          <button class="popup-confirm" name="confirm" id="confirm">I'm sure</button>
                          <button class="popup-cancel" name="cancel" id="cancel">I have to recheck</button>   
                      </div>
              </div>
          </div>
      </div>
    <div class="main">
        <div class="form-box">
            <input type="hidden" id="idContainer" value="<?php echo isset( $_SESSION['editExamId'])? $_SESSION['editExamId']:"";?>">
            <div class="topic-header"><h1>Exam</h1></div>
            <div class="body-content">
                <div class="form-content">
                    <div class="box" id="box">
                        <div class="msg" id="msg"></div>
                    </div>
                    <div class="type-class">
                        <label for="type">Type:</label>
                        <div class="input-and-button">
                        <select name="type" id="type" class="type">
                            <optgroup>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>
                            </optgroup>
                        </select>
                        <div class="edit-button"><button  class="edit" id="editType" onclick="changeType()" >Edit</button></div>
                        </div>
                    </div>
                        <div class="save-and-cancel" id="typeSaveCancel">
                            <div class="save-button" id="saveTypeButton"><button  class="save" id="saveType" onclick="saveType()">Save</button></div>
                            <div class="cancel-button" id="cancelTypeButton"><button  class="cancel" id="cancelType" onclick="cancelType()">Cancel</button></div>
                        </div>
                    <div class="date-class">
                        <label for="date">Date:</label>
                        <div class="input-and-button">
                        <input type="date" class="text-class" id="dateContainer" value="">
                        <div class="edit-button"><button  class="edit" id="editDate" onclick="changeDate()">Edit</button></div>
                        </div>
                    </div>
                    
                        <div class="save-and-cancel" id="dateSaveCancel">
                            <div class="save-button" id="saveDateButton"><button  class="save" id="saveDate" onclick="saveDate()">Save</button></div>
                            <div class="cancel-button" id="cancelDateButton"><button  class="cancel" id="cancelDate" onclick="cancelDate()">Cancel</button></div>
                        </div>

                    <div class="time-class">
                        <label for="time">Time:</label>
                        <div class="input-and-button">
                        <input type="time" class="text-class" id="timeContainer" value="">
                        <div class="edit-button"><button  class="edit" id="editTime" onclick="changeTime()">Edit</button></div>
                        </div>
                    </div>

                        <div class="save-and-cancel" id="timeSaveCancel">
                            <div class="save-button" id="saveTimeButton"><button  class="save" id="saveTime" onclick="saveTime()">Save</button></div>
                            <div class="cancel-button" id="cancelTimeButton"><button  class="cancel" id="cancelTime" onclick="cancelTime()">Cancel</button></div>
                        </div>

                    <div class="add-instructor-class">
                        <label for="add-instructor">Instructor:</label>
                        <button class="session-buttons" name="add-instructor" id="add-instructor" onclick="changeInstructorLoad()">ADD INSTRUCTOR</button>
                        <div class="blank"></div>
                    </div>
                    <div class="add-vehicle-class">
                        <label for="add-vehicle">Vehicle:</label>
                        <button class="session-buttons"name="add-vehicle" id="add-vehicle" onclick="changeVehicleLoad()">ADD VEHICLE</button>
                        <div class="blank"></div>
                    </div>

                    <div class="add-student-class">
                        <label for="add-participant">Add Students:</label>
                        <button class="session-buttons" name="add-participants" id="add-participants" onclick="changeStudentLoad()">ADD STUDENTS</button>
                        <div class="blank"></div>
                    </div>
                </div>
                <div class="button-set">
                    <a href="<?php echo URL?>Manager/eventCalendar"><button class="session-buttons" name="cancel" id="cancel" >CANCEL</button></a>
                    <button class="session-buttons" id="delete" onclick="deleteExam()">DELETE</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/manager/editExam.js"></script> 
</body>
</html>