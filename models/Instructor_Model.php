<?php
class Instructor_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getTodaySession(){
        $date=date("Y-m-d");
        $result=$this->db->runQuery("SELECT session_id , session_title, session_date, session_time FROM sessions WHERE session_date='2021-11-18'");
        return $result;

    }
    function getProfileDetails(){
        $nic=$_SESSION['employee_id'];
        $result=$this->db->runQuery("SELECT * from employee where employee_id = '$nic'");
        return $result;
    }
    function getSessions($employeeId){
        $result=$this->db->runQuery("SELECT sessions.Session_id,sessions.session_title,sessions.session_date,sessions.session_time,sessions.type FROM sessions INNER join session_conductor_assigns on session_conductor_assigns.session_id=sessions.session_id where session_conductor_assigns.conductor_id=$employeeId");
        return $result;
    }

    function getExams($employeeId){
        $result=$this->db->runQuery("SELECT exams.Exam_id,exams.exam_date,exams.exam_time,exams.exam_type FROM exams INNER JOIN exam_conductor_assigns on exam_conductor_assigns.exam_id=exams.exam_id where exam_conductor_assigns.conductor_id=$employeeId");
        return $result;
    }
    function getExamDetails($id){
        $id=intval($id);
        $result=$this->db->runQuery("SELECT * FROM exams where Exam_id=$id");
        return $result;
    }
    function loadPreSelectedInstructors($examId){
        $result=$this->db->runQuery("SELECT employee.employee_id,employee.name,employee.job_title from ((((employee 
        INNER JOIN instructor on instructor.employee_id=employee.employee_id) 
        INNER JOIN conductor on conductor.employee_id=instructor.employee_id)
        INNER JOIN exam_conductor_assigns on exam_conductor_assigns.conductor_id=conductor.employee_id)
        INNER JOIN exams on exams.exam_id=exam_conductor_assigns.exam_id)
        where exams.exam_id=$examId");
        return $result;
    }
    function loadPreSelectedVehicles($examId){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no,vehicle_classes.vehicle_class from (((vehicle INNER JOIN exam_vehicle_assigns on exam_vehicle_assigns.vehicle_id=vehicle.vehicle_id) INNER JOIN exams on exams.exam_id=exam_vehicle_assigns.exam_id) INNER JOIN vehicle_classes on vehicle_classes.vehicle_class_id=vehicle.vehicle_class_id) WHERE exams.exam_id=$examId");
        return $result;
    }

    function loadPreSelectedStudents($examId){
        $result=$this->db->runQuery("SELECT count(exam_student_assigns.student_id) AS total_assigns,exam_student_assigns.student_id,GROUP_CONCAT(exam_student_assigns.exam_id) AS exam_IDs,student.init_name FROM ((exam_student_assigns LEFT JOIN student on student.student_id=exam_student_assigns.student_id) LEFT JOIN exams on exams.exam_id=exam_student_assigns.exam_id) GROUP BY exam_student_assigns.student_id,student.init_name");
        return $result;
    }

    //Sessions
    function getSessionDetails($id){
        $id=intval($id);
        $result=$this->db->runQuery("SELECT * FROM sessions where Session_id=$id");
        return $result;
    }
    function loadPreSelectedInstructorsS($sessionId){
        $result=$this->db->runQuery("SELECT employee.employee_id,employee.name,employee.job_title from ((((employee 
        INNER JOIN instructor on instructor.employee_id=employee.employee_id) 
        INNER JOIN conductor on conductor.employee_id=instructor.employee_id)
        INNER JOIN session_conductor_assigns on session_conductor_assigns.conductor_id=conductor.employee_id)
        INNER JOIN sessions on sessions.session_id=session_conductor_assigns.session_id)
        where sessions.session_id=$sessionId");
        return $result;
    }
    function loadPreSelectedVehiclesS($sessionId){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no,vehicle_classes.vehicle_class from (((vehicle INNER JOIN session_vehicle_assigns on session_vehicle_assigns.vehicle_id=vehicle.vehicle_id) INNER JOIN sessions on sessions.session_id=session_vehicle_assigns.session_id) INNER JOIN vehicle_classes on vehicle_classes.vehicle_class_id=vehicle.vehicle_class_id)WHERE sessions.session_id=$sessionId");
        return $result;
    }
    function loadPreSelectedStudentsS($sessionId){
        $result=$this->db->runQuery("SELECT count(session_student_assigns.student_id) AS total_assigns,session_student_assigns.student_id,GROUP_CONCAT(session_student_assigns.session_id) AS session_IDs,student.init_name FROM ((session_student_assigns LEFT JOIN student on student.student_id=session_student_assigns.student_id) LEFT JOIN sessions on sessions.session_id=session_student_assigns.session_id) GROUP BY session_student_assigns.student_id,student.init_name");
        return $result;
    }

    function loadAllSessionsForToday($conductorId){
        // $todayDate=date("Y-m-d");
        $result=$this->db->runQuery("SELECT sessions.session_id,session_time FROM sessions INNER JOIN session_conductor_assigns on session_conductor_assigns.session_id=sessions.session_id WHERE session_conductor_assigns.conductor_id=$conductorId and sessions.session_date='2021-11-18'");
        return $result;
    }
    function loadStudentsForSession($sessionId){
        $result=$this->db->runQuery("SELECT student.student_id,student.init_name,student.profile_pic,student.contact,session_participation.status from ((student INNER JOIN session_participation on session_participation.student_id=student.student_id) INNER JOIN sessions on sessions.session_id=session_participation.session_id) WHERE session_participation.session_id=$sessionId AND session_participation.status='going' OR session_participation.status='absent' OR session_participation.status='present'");
        // $result=$this->db->runQuery("SELECT student.student_id,student.init_name,student.contact from ((student INNER JOIN session_participation on session_participation.student_id=student.student_id) INNER JOIN sessions on sessions.session_id=session_participation.session_id) WHERE session_participation.session_id='4' AND session_participation.status='going'");
        return $result;
    }
    function setAbsent($sessionId,$studentId){
        $result=$this->db->runQuery("UPDATE session_participation SET status='absent' WHERE student_id=$studentId AND session_id=$sessionId");
        $result=$this->db->runQuery(" DELETE FROM session_student_assigns WHERE student_id=$studentId and session_id=$sessionId");
        return true;
    }
    function setPresent($sessionId,$studentId){
        $result=$this->db->runQuery("UPDATE session_participation SET status='present' WHERE student_id=$studentId AND session_id=$sessionId");
        return true;
    }
    function getDatesOfSessionsAndSessions($instructorId){
        $sessionResult=$this->db->runQuery("SELECT DISTINCT sessions.session_date as date from sessions INNER join session_conductor_assigns on session_conductor_assigns.session_id=sessions.session_id where session_conductor_assigns.conductor_id=$instructorId");
        $examResult=$this->db->runQuery("SELECT DISTINCT exams.exam_date as date from exams INNER join exam_conductor_assigns on exam_conductor_assigns.exam_id=exams.exam_id where exam_conductor_assigns.conductor_id=$instructorId");
        $result=array_merge($sessionResult,$examResult);
        return $result;
    }
    function imageUploading($file,$employeeId){
        $result=$this->db->runQuery("UPDATE employee SET profile_pic='$file' WHERE employee_id=$employeeId");
        // return $studentId;
    }
}