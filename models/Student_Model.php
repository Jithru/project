<?php

class Student_Model extends Model{

    function __construct()
    { 
        parent::__construct();
    }

    function getProfileDetails(){
        $nic=$_SESSION['student_id'];
        $result=$this->db->runQuery("SELECT * from student where student_id = '$nic'");
        return $result;
    }

    function getProfileDetailsAmount(){
        $nic=$_SESSION['student_id'];
        $result=$this->db->runQuery("SELECT total_amount from student where student_id = '$nic'");
        return $result;
    }

    function editProfiledetails(){
  

    }

    //---------------------->
    function checkPassword($studentId,$password){
        $result=$this->db->runQuery("SELECT student_private.password FROM student_private INNER JOIN student on student.student_id=student_private.student_id Where student.student_id = '$studentId'");
        
        if(!empty($result)){
            if(password_verify($password,
            $result[0]['password'] )){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function updatePassword($studentId,$password){
        $hash_password = password_hash($password,PASSWORD_DEFAULT, array('cost' => 9));
        $result=$this->db->runQuery("UPDATE student_private INNER JOIN student on student.student_id = student_private.student_id SET student_private.password ='$hash_password' WHERE student_private.student_id = '$studentId'");
        return true;

    }

//------------------------------------->

    function setComplaints($description,$suggestion,$studentId)
    {
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');  
        $result=$this->db->runQuery("INSERT INTO complaints(submitted_date_time,description,suggestions,student_id) VALUES('$date','$description','$suggestion',$studentId)");
    
    }

    function setReview($idea,$satisfy,$improvement,$studentId){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        $result=$this->db->runQuery("INSERT INTO reviews(submitted_date_time,idea,improvements,student_id,satisfaction) VALUES('$date','$idea','$improvement',$studentId,'$satisfy')");
    
    }
    function getTodaySession(){
        $date=date("Y-m-d");
        $result=$this->db->runQuery("SELECT sessions.session_id , sessions.session_title, sessions.session_date, sessions.session_time,session_participation.status FROM sessions INNER JOIN session_participation ON sessions.session_id=session_participation.session_id WHERE session_date='2021-11-18'");
        return $result;
    }

    function upadateTodaySession($status){
        $id=$_SESSION['student_id'];
        $result=$this->db->runQuery("UPDATE session_participation SET status='$status' WHERE student_id='$id'");
        return true;

    }

    //------------>
    function getSessions($studentId){
        $result=$this->db->runQuery("SELECT sessions.Session_id,sessions.session_title,sessions.session_date,sessions.session_time,sessions.type FROM sessions INNER join session_student_assigns on session_student_assigns.session_id=sessions.session_id where session_student_assigns.student_id=$studentId");
        return $result;
    }

    function getExams($studentId){
        $result=$this->db->runQuery("SELECT exams.Exam_id,exams.exam_date,exams.exam_time,exams.exam_type FROM exams INNER JOIN exam_student_assigns on exam_student_assigns.exam_id=exams.exam_id where exam_student_assigns.student_id=$studentId");
        return $result;
    }
    function getAllExams($studentId){
        $result=$this->db->runQuery("SELECT exams.Exam_id,exams.exam_date,exams.exam_time,exams.exam_type FROM exams");
        return $result;
    }
    function getAllSessions($studentId){
        $result=$this->db->runQuery("SELECT Session_id,session_title,session_date,session_time,type FROM sessions");
        return $result;
    }
    
    function getExamDetails($id){
        $id=intval($id);
        $result=$this->db->runQuery("SELECT * FROM exams where Exam_id=$id");
        return $result;
    }

    function getTheoryTrailExamDetails(){
        $studentId=$_SESSION['student_id'];
        $result=$this->db->runQuery("SELECT exam_type,exam_date,exam_time,name,results FROM exams INNER JOIN exam_participation ON exams.exam_id=exam_participation.exam_id INNER JOIN employee ON employee.employee_id= exams.employee_id WHERE exam_participation.student_id='54'");
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

    //requesting part
    function requestForExam($examId,$studentId){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        $studentId=intval($studentId);
        $examId=intval($examId);

        $stdCount=$this->db->runQuery("SELECT Count(student_id) as count_std from  exam_student_assigns where student_id=$studentId");
        $stdCount=intval($stdCount[0]['count_std']);
        if($stdCount<4){
            $result=$this->db->runQuery("INSERT INTO exam_request (student_id,exam_id,date_time) VALUES ($studentId,$examId,'$date')");
            return true;
        }else{
            return false;
        }

    }
    function requestForSession($sessionId,$studentId){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        $studentId=intval($studentId);
        $sessionId=intval($sessionId);
        $stdCount=$this->db->runQuery("SELECT Count(student_id) as count_std from  session_student_assigns where student_id=$studentId");
        $stdCount=intval($stdCount[0]['count_std']);
        if($stdCount<20){
            $result=$this->db->runQuery("INSERT INTO session_request (student_id,session_id,date_time) VALUES ($studentId,$sessionId,'$date')");
            return true;
        }
        else{
            return false;
        }

    }
    //---------------------------->

    function getPaymentDetails($studentId){
        $result_online=$this->db->runQuery("SELECT payment_date_time, amount, opayment_id FROM `online_payments` WHERE student_id='$studentId'");
        $result_cash=$this->db->runQuery("SELECT  payment_date_time, amount,cash_payment.cpayment_id FROM cash_payment INNER JOIN cash_payment_submits ON cash_payment.cpayment_id=cash_payment_submits.cpayment_id WHERE student_id='$studentId'");  
        $result=array_merge($result_cash,$result_online);
        return $result;

    }

}