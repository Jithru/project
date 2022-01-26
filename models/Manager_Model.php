<?php
class Manager_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }
    function utilityExpenses(){
        $cost['PetrolCost']='Petrol Cost';
        $cost['ElectricityBill']='Electricity Bill';
        $cost['WaterBill']='Water Bill';
        $cost['Tyre']='Tyre Replacement';
        $cost['Other']='Other Expenses';
        return $cost;
    }
    function checkPassword($managerId,$password){
        $result=$this->db->runQuery("SELECT employee_private.password FROM employee_private INNER JOIN employee on employee.employee_id=employee_private.employee_id Where employee.employee_id = '$managerId'");
        if(!empty($result)){
            if(password_verify($password,
            $result[0]['password'] )){
                return true;
            }else{
                return false;
            }

        // if(empty($result)){
        //     return false;
        // }else if($password!=$result[0]['password']){
        //     return false;
        // }else{
        //     return true;
        // }
        }else{
            return false;
        }
    }
    function setExpenses($title,$discription,$amount,$managerId){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        
        $result=$this->db->runQuery("INSERT INTO other_expenses(title,description,recorded_date_time,amount,employee_id) VALUES('$title','$discription','$date',$amount,$managerId)");
        
    }

    function getVehiclesForSessions(){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_no,vehicle_classes.vehicle_class,vehicle.vehicle_type FROM vehicle INNER JOIN vehicle_classes ON vehicle_classes.vehicle_class_id=vehicle.vehicle_class_id");
        return $result;
    }
    function getVehiclesForExams(){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_no,vehicle_classes.vehicle_class,vehicle.vehicle_type FROM vehicle INNER JOIN vehicle_classes ON vehicle_classes.vehicle_class_id=vehicle.vehicle_class_id");
        return $result;
    }

    function getInstructorsForSessions($type){
        if($type=="Theory"){
            $role="Teacher";
        }else if($type=="Practical"){
            $role="Instructor";
        }
        $result=$this->db->runQuery("SELECT employee_id,name,job_title FROM employee where job_title='$role'");
        return $result;
    }
    function getInstructorsForExams(){
        $result=$this->db->runQuery("SELECT employee_id,name,job_title FROM employee where job_title='Instructor' OR job_title='Teacher'");
        return $result;
    }
    function addSession($data,$instructors,$vehicles,$managerId){
        $values=explode(",",$data);
        $instructorsList=explode(",",$instructors);
        $vehiclesList=explode(",",$vehicles);
        $result=$this->db->runQuery("INSERT INTO sessions(session_title,session_date,session_time,type,employee_id) VALUES('$values[0]','$values[1]','$values[2]','$values[3]',$managerId)");
        $sessionId=$this->db->runQuery("SELECT session_id FROM sessions ORDER BY session_id DESC LIMIT 1");
        $sessionId=intval($sessionId[0]['session_id']);
        for($i=0;$i<count($instructorsList);$i++){
            $result=$this->db->runQuery("INSERT INTO session_conductor_assigns VALUES($managerId,$sessionId,$instructorsList[$i])");
        }
        for($i=0;$i<count($vehiclesList);$i++){
            $result=$this->db->runQuery("INSERT INTO session_vehicle_assigns VALUES($managerId,$sessionId,$vehiclesList[$i])");
        }
        return $instructors;
    }
    function addExam($data,$instructors,$vehicles,$managerId){
        $values=explode(",",$data);
        $instructorsList=explode(",",$instructors);
        $vehiclesList=explode(",",$vehicles);
        $result=$this->db->runQuery("INSERT INTO exams(exam_type,exam_date,exam_time,employee_id) VALUES('$values[0]','$values[1]','$values[2]',$managerId)");
        $examId=$this->db->runQuery("SELECT exam_id FROM exams ORDER BY exam_id DESC LIMIT 1");
        $examId=intval($examId[0]['exam_id']);
        for($i=0;$i<count($instructorsList);$i++){
            $result=$this->db->runQuery("INSERT INTO exam_conductor_assigns VALUES($managerId,$examId,$instructorsList[$i])");
        }
        for($i=0;$i<count($vehiclesList);$i++){
            $result=$this->db->runQuery("INSERT INTO exam_vehicle_assigns VALUES($managerId,$examId,$vehiclesList[$i])");
        }
        return $data;
    }
    function getSessions(){
        $result=$this->db->runQuery("SELECT Session_id,session_title,session_date,session_time,type FROM sessions");
        return $result;
    }

    function getExams(){
        $result=$this->db->runQuery("SELECT Exam_id,exam_date,exam_time,exam_type FROM exams");
        return $result;
    }

    function deleteSession($sessionId){
        $result=$this->db->runQuery("DELETE FROM session_student_assigns WHERE session_id=$sessionId");
        $result=$this->db->runQuery("DELETE FROM session_vehicle_assigns WHERE session_id=$sessionId");
        $result=$this->db->runQuery("DELETE FROM session_conductor_assigns WHERE session_id=$sessionId");
        $result=$this->db->runQuery("DELETE FROM session_request WHERE session_id=$sessionId");
        $result=$this->db->runQuery("DELETE FROM sessions WHERE session_id=$sessionId");
    }
    function deleteExam($examId){
        $result=$this->db->runQuery("DELETE FROM exam_student_assigns WHERE exam_id=$examId");
        $result=$this->db->runQuery("DELETE FROM exam_vehicle_assigns WHERE exam_id=$examId");
        $result=$this->db->runQuery("DELETE FROM exam_conductor_assigns WHERE exam_id=$examId");
        $result=$this->db->runQuery("DELETE FROM exam_request WHERE exam_id=$examId");
        $result=$this->db->runQuery("DELETE FROM exams WHERE Exam_id=$examId");
    }

    function getExamDetails($id){
        $id=intval($id);
        $result=$this->db->runQuery("SELECT * FROM exams where Exam_id=$id");
        return $result;
    }

    function saveEditedDate($date,$examId){
       $result=$this->db->runQuery("UPDATE exams SET exam_date='$date' where  Exam_id=$examId");
       return true;
    }
    function saveEditedTime($time,$examId){
        $result=$this->db->runQuery("UPDATE exams SET exam_time='$time' where  Exam_id=$examId");
        return true;
    }
    function saveEditedType($type,$examId){
        $result=$this->db->runQuery("UPDATE exams SET exam_type='$type' where  Exam_id=$examId");
        return true;
    }

    //change instructors,vehicles,students
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
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no from ((vehicle INNER JOIN exam_vehicle_assigns on exam_vehicle_assigns.vehicle_id=vehicle.vehicle_id) INNER JOIN exams on exams.exam_id=exam_vehicle_assigns.exam_id) WHERE exams.exam_id=$examId");
        return $result;
    }
    function loadUnselectedInstructors(){
        $result=$this->db->runQuery("SELECT employee.employee_id,employee.name,employee.job_title from ((employee 
        INNER JOIN instructor on instructor.employee_id=employee.employee_id) 
        INNER JOIN conductor on conductor.employee_id=instructor.employee_id)");
        return $result;
    }
    function loadUnselectedVehicles(){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no from vehicle");
        return $result;
    }
    function removeInstructor($employeeId,$examId){
        $result=$this->db->runQuery("DELETE FROM exam_conductor_assigns WHERE conductor_id=$employeeId AND exam_id=$examId");
        return true;
    }
    function addNewInstructor($managerId,$employeeId,$examId){
        $result=$this->db->runQuery("INSERT INTO exam_conductor_assigns VALUES($managerId,$examId,$employeeId)");
        return true;
    }
    function removeVehicles($vehicleId,$examId){
        $result=$this->db->runQuery("DELETE FROM exam_vehicle_assigns WHERE vehicle_id=$vehicleId AND exam_id=$examId");
        return true;
    }
    function addNewVehicles($managerId,$vehicleId,$examId){
        $result=$this->db->runQuery("INSERT INTO exam_vehicle_assigns VALUES($managerId,$examId,$vehicleId)");
        return true;
    }
    function loadPreSelectedStudents($examId){
        $result=$this->db->runQuery("SELECT count(exam_student_assigns.student_id) AS total_assigns,exam_student_assigns.student_id,GROUP_CONCAT(exam_student_assigns.exam_id) AS exam_IDs,student.init_name FROM ((exam_student_assigns LEFT JOIN student on student.student_id=exam_student_assigns.student_id) LEFT JOIN exams on exams.exam_id=exam_student_assigns.exam_id) GROUP BY exam_student_assigns.student_id,student.init_name");
        return $result;
    }
    function loadUnselectedStudents(){
        $result=$this->db->runQuery("SELECT count(exam_student_assigns.student_id) AS total_assigns,GROUP_CONCAT(exam_student_assigns.exam_id) AS exam_IDs,student.student_id,student.init_name FROM (exam_student_assigns RIGHT OUTER JOIN student on student.student_id=exam_student_assigns.student_id) GROUP BY student.student_id,student.init_name");
        return $result;
    }
    function addNewStudents($managerId,$studentId,$examId){
        $stdCount=$this->db->runQuery("SELECT Count(student_id) as count_std from  exam_student_assigns where student_id=$studentId");
        $stdCount=intval($stdCount[0]['count_std']);
       
        if($stdCount<4){
            $result=$this->db->runQuery("INSERT INTO exam_student_assigns VALUES($managerId,$examId,$studentId)");
            return true;
        }else{
            return false;
        }

    }
    function removeStudents($studentId,$examId){
        $result=$this->db->runQuery("DELETE FROM exam_student_assigns WHERE student_id=$studentId AND exam_id=$examId");
        return true;
    }

    //edit Sessions
    function getSessionDetails($id){
        $id=intval($id);
        $result=$this->db->runQuery("SELECT * FROM sessions where Session_id=$id");
        return $result;
    }
    function saveEditedTitleS($title,$sessionId){
        $result=$this->db->runQuery("UPDATE sessions SET session_title='$title' where  Session_id=$sessionId");
        return true;
     }
    function saveEditedDateS($date,$sessionId){
        $result=$this->db->runQuery("UPDATE sessions SET session_date='$date' where  Session_id=$sessionId");
        return true;
     }
     function saveEditedTimeS($time,$sessionId){
         $result=$this->db->runQuery("UPDATE sessions SET session_time='$time' where  Session_id=$sessionId");
         return true;
     }
     function saveEditedTypeS($type,$sessionId){
         $result=$this->db->runQuery("UPDATE sessions SET type='$type' where  Session_id=$sessionId");
         return true;
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
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no from ((vehicle INNER JOIN session_vehicle_assigns on session_vehicle_assigns.vehicle_id=vehicle.vehicle_id) INNER JOIN sessions on sessions.session_id=session_vehicle_assigns.session_id) WHERE sessions.session_id=$sessionId");
        return $result;
    }
    function loadUnselectedInstructorsS(){
        $result=$this->db->runQuery("SELECT employee.employee_id,employee.name,employee.job_title from ((employee 
        INNER JOIN instructor on instructor.employee_id=employee.employee_id) 
        INNER JOIN conductor on conductor.employee_id=instructor.employee_id)");
        return $result;
    }
    function loadUnselectedVehiclesS(){
        $result=$this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_type,vehicle.vehicle_no from vehicle");
        return $result;
    }
    function removeInstructorS($employeeId,$sessionId){
        $result=$this->db->runQuery("DELETE FROM session_conductor_assigns WHERE conductor_id=$employeeId AND session_id=$sessionId");
        return true;
    }
    function addNewInstructorS($managerId,$employeeId,$sessionId){
        $result=$this->db->runQuery("INSERT INTO session_conductor_assigns VALUES($managerId,$sessionId,$employeeId)");
        return true;
    }
    function removeVehiclesS($vehicleId,$sessionId){
        $result=$this->db->runQuery("DELETE FROM session_vehicle_assigns WHERE vehicle_id=$vehicleId AND session_id=$sessionId");
        return true;
    }
    function addNewVehiclesS($managerId,$vehicleId,$sessionId){
        $result=$this->db->runQuery("INSERT INTO session_vehicle_assigns VALUES($managerId,$sessionId,$vehicleId)");
        return true;
    }
    function loadPreSelectedStudentsS($sessionId){
        $result=$this->db->runQuery("SELECT count(session_student_assigns.student_id) AS total_assigns,session_student_assigns.student_id,GROUP_CONCAT(session_student_assigns.session_id) AS session_IDs,student.init_name FROM ((session_student_assigns LEFT JOIN student on student.student_id=session_student_assigns.student_id) LEFT JOIN sessions on sessions.session_id=session_student_assigns.session_id) GROUP BY session_student_assigns.student_id,student.init_name");
        return $result;
    }
    function loadUnselectedStudentsS(){
        $result=$this->db->runQuery("SELECT count(session_student_assigns.student_id) AS total_assigns,GROUP_CONCAT(session_student_assigns.session_id) AS session_IDs,student.student_id,student.init_name FROM (session_student_assigns RIGHT OUTER JOIN student on student.student_id=session_student_assigns.student_id) GROUP BY student.student_id,student.init_name");
        return $result;
    }
    function addNewStudentsS($managerId,$studentId,$sessionId){
        $stdCount=$this->db->runQuery("SELECT Count(student_id) as count_std from  session_student_assigns where student_id=$studentId");
        $stdCount=intval($stdCount[0]['count_std']);
        
        if($stdCount<20){
            $result=$this->db->runQuery("INSERT INTO session_student_assigns VALUES($managerId,$sessionId,$studentId)");
            return true;
        }else{
            return false;
        }
    }
    function removeStudentsS($studentId,$sessionId){
        $result=$this->db->runQuery("DELETE FROM session_student_assigns WHERE student_id=$studentId AND session_id=$sessionId");
        return true;
    }
    function viewSessionRequests(){
        $result=$this->db->runQuery("Select session_request.student_id,session_request.session_id,student.init_name FROM student INNER join session_request on session_request.student_id=student.student_id order by session_request.date_time");
        return $result;
    }
    function viewExamRequests(){
        $result=$this->db->runQuery("Select exam_request.student_id,exam_request.exam_id,student.init_name FROM student INNER join exam_request on exam_request.student_id=student.student_id order by exam_request.date_time");
        return $result;
    }

    function viewSessionRequestsFurther($studentId,$sessionId){
        $studentId=intval($studentId);
        $sessionId=intval($sessionId);
        $result=$this->db->runQuery("SELECT student.init_name,sessions.session_title,sessions.type,sessions.session_date,sessions.session_time,session_request.date_time,count(session_student_assigns.student_id) as total_assigns FROM (((student INNER JOIN session_request on session_request.student_id=student.student_id) INNER JOIN sessions on session_request.session_id=sessions.session_id) LEFT JOIN session_student_assigns on session_student_assigns.student_id=student.student_id) WHERE session_request.student_id=$studentId and session_request.session_id=$sessionId");
        return $result;
    }
    function viewExamRequestsFurther($studentId,$examId){
        $studentId=intval($studentId);
        $sessionId=intval($examId);
        $result=$this->db->runQuery("SELECT student.init_name,exams.exam_type,exams.exam_date,exams.exam_time,exam_request.date_time,count(exam_student_assigns.student_id) as total_assigns FROM (((student INNER JOIN exam_request on exam_request.student_id=student.student_id) INNER JOIN exams on exam_request.exam_id=exams.exam_id) LEFT JOIN exam_student_assigns on exam_student_assigns.student_id=student.student_id) WHERE exam_request.student_id=$studentId and exam_request.exam_id=$examId");
        return $result;
    }
    function acceptRequestSession($employeeId,$studentId,$sessionId){
        $studentId=intval($studentId);
        $sessionId=intval($sessionId);
        $employeeId=intval($employeeId);
        $result=$this->db->runQuery("DELETE from session_request WHERE student_id=$studentId and session_id=$sessionId");
        $result=$this->db->runQuery("INSERT INTO session_student_assigns VALUES($employeeId,$sessionId,$studentId)");
    }
    function rejectRequestSession($studentId,$sessionId){
        $studentId=intval($studentId);
        $sessionId=intval($sessionId);
        $result=$this->db->runQuery("DELETE from session_request WHERE student_id=$studentId and session_id=$sessionId");
    }

    function acceptRequestExam($employeeId,$studentId,$examId){
        $studentId=intval($studentId);
        $examId=intval($examId);
        $employeeId=intval($employeeId);
        $result=$this->db->runQuery("DELETE from exam_request WHERE student_id=$studentId and exam_id=$examId");
        $result=$this->db->runQuery("INSERT INTO exam_student_assigns VALUES($employeeId,$examId,$studentId)");
    }
    function rejectRequestExam($studentId,$examId){
        $studentId=intval($studentId);
        $examId=intval($examId);
        $result=$this->db->runQuery("DELETE from exam_request WHERE student_id=$studentId and exam_id=$examId");
    }

}