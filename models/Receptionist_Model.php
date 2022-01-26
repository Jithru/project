<?php

class Receptionist_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }
    function registerWritten(){
        
    }
    function registerTrail(){

    }
    function registerLicense(){
        
    }
    function getVehicleClasses($classA,$classAauto,$classB1,$classB,$classBauto){
        $total=0;
        if($classA=="true"){
            $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='A'");
            $total=$total+doubleval($result[0]['initial_charge']);
        }
        if($classAauto=="true"){
            $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='A-Auto'");
            $total=$total+doubleval($result[0]['initial_charge']);
        }
        if($classB1=="true"){
            $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B1'");
            $total=$total+doubleval($result[0]['initial_charge']);
        }
        if($classB=="true"){
            $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B'");
            $total=$total+doubleval($result[0]['initial_charge']);
        }
        if($classBauto=="true"){
            $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B-Auto'");
            $total=$total+doubleval($result[0]['initial_charge']);
        }
            
        return $total;
    }
    function getPackages(){
        $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) group by package_id");
        return $result;
    }
    function addStudent($nic,$address,$gender,$dob,$contact,$initPrice,$packagePrice,$district,$city,$div_sec,$police,$occupation,$type,$initName,$fullName){
        $totalAmount=doubleval($initPrice)+doubleval($packagePrice);
        $date=date('Y-m-d');
        $OTP=rand(100000,999999);
        $initPassword=rand(100000,999999);
        $result=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        if(empty($result[0]['student_id'])){
            $result=$this->db->runQuery("SELECT(student_id) from student where contact='$contact'");
            if(empty($result[0]['contact'])){
                $result=$this->db->runQuery("INSERT INTO student(nic,address,arival_date,gender,dob,contact,total_amount,district,city,div_sec,police_station,occupation,type,init_name,full_name) values('$nic','$address','$date','$gender','$dob','$contact',$totalAmount,'$district','$city','$div_sec','$police','$occupation','$type','$initName','$fullName')");

                $studentId=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
                $student_Id=$studentId[0]['student_id'];

                $this->db->runQuery("INSERT INTO student_key (otp, student_id) VALUES ('$OTP', '$student_Id')");
                $this->db->runQuery("INSERT INTO student_private (password, student_id) VALUES ('$initPassword', '$student_Id')");
                $message=$OTP;
            }else{
                $message="Contact Exist";
            }  
        }else{
            $message="NIC Exist";
        }
        return $message;
    }


    function addInitExpenses($nic,$vehicleClasses,$receptionistId){
        $vehicleClassesArray=explode(',',$vehicleClasses);
        $count=0;
        for($i=0;$i<count($vehicleClassesArray);$i++){
            if($vehicleClassesArray[$i]=="true"){
                $count++;
            }
        }
        $st_id=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        $result=$this->db->runQuery("INSERT INTO initial_service_expenses_submits(student_id,ischarge_id,receptionist_id,date_time) VALUES($studentId,$count,$receptionistId,'$date')");
    }


    function assignPackages($nic,$packageId,$receptionistId){
        $st_id=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        $packageId=intval($packageId);
        $result=$this->db->runQuery("INSERT INTO package_assigning VALUES($studentId,$packageId,$receptionistId)");
    }
    function assginVehicleClasses($nic,$classArray){
        $st_id=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        $assignedClassesArray=explode(',',$classArray);
        for($i=0;$i<count($assignedClassesArray);$i++){
            $vc_id=$this->db->runQuery("SELECT vehicle_class_id FROM vehicle_classes WHERE vehicle_class='$assignedClassesArray[$i]'"); 
            $vehicleClassId=intval($vc_id[0]['vehicle_class_id']);
            $result=$this->db->runQuery("INSERT INTO requested_vehicle_classes VALUES($studentId,$vehicleClassId)");
        }
        
    }

    function getStudentDetails(){
        $result=$this->db->runQuery("SELECT student_id,full_name,contact FROM student");
        return $result;
    }

    public function getEmployeeDetailsMore($id){
        $result=$this->db->runQuery("SELECT student_id,init_name,full_name,address,NIC,gender,district,city,div_sec,police_station,dob,contact,occupation,type,arival_date FROM student WHERE student_id='$id'");
        return $result;
    }

    public function addMedicalDetails($nic,$medicalNo,$issuedDate){
        $st_id=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        $result=$this->db->runQuery("INSERT INTO medical_report VALUES($studentId,'$medicalNo','$issuedDate')");
    }
    function getSessions(){
        $result=$this->db->runQuery("SELECT Session_id,session_title,session_date,session_time,type FROM sessions");
        return $result;
    }

    function getExams(){
        $result=$this->db->runQuery("SELECT Exam_id,exam_date,exam_time,exam_type FROM exams");
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
}