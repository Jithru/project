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
    function getVehicleClasses($classA,$classAauto,$classB1,$classB,$exam){
        if($exam=="false"){
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
                
            return $total;
        }
        else{
            $total=0;
            if($classA=="true"){
                $result=$this->db->runQuery("SELECT extra_charges_for_extra_day FROM vehicle_classes WHERE vehicle_class='A'");
                $total=$total+doubleval($result[0]['extra_charges_for_extra_day']);
                // $total=$total+500;
            }
            if($classAauto=="true"){
                $result=$this->db->runQuery("SELECT extra_charges_for_extra_day FROM vehicle_classes WHERE vehicle_class='A-Auto'");
                $total=$total+doubleval($result[0]['extra_charges_for_extra_day']);
                // $total=$total+750;
            }
            if($classB1=="true"){
                $result=$this->db->runQuery("SELECT extra_charges_for_extra_day FROM vehicle_classes WHERE vehicle_class='B1'");
                $total=$total+doubleval($result[0]['extra_charges_for_extra_day']);
                // $total=$total+250;
            }
            if($classB=="true"){
                $result=$this->db->runQuery("SELECT extra_charges_for_extra_day FROM vehicle_classes WHERE vehicle_class='B'"); 
                $total=$total+doubleval($result[0]['extra_charges_for_extra_day']);
                // $total=$total+650;
            }
                
            return $total;
        }
        // $total=0;
        // if($classA=="true"){
        //     $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='A'");
        //     $total=$total+doubleval($result[0]['initial_charge']);
        // }
        // if($classAauto=="true"){
        //     $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='A-Auto'");
        //     $total=$total+doubleval($result[0]['initial_charge']);
        // }
        // if($classB1=="true"){
        //     $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B1'");
        //     $total=$total+doubleval($result[0]['initial_charge']);
        // }
        // if($classB=="true"){
        //     $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B'"); 
        //     $total=$total+doubleval($result[0]['initial_charge']);
        // }
            
        // return $total;
    }
    function getPackages(){
        $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) group by package_id");
        return $result;
    }
    function addStudent($nic,$address,$gender,$dob,$contact,$initPrice,$packagePrice,$district,$city,$div_sec,$police,$occupation,$type,$initName,$fullName){
        //if($selectMethod=="Written"){
        //    $totalAmount=doubleval($initPrice)+doubleval($packagePrice);
        //}
        //else if($selectMethod=="Trial"){
            
        //}
        $totalAmount=doubleval($initPrice)+doubleval($packagePrice);
        $date=date('Y-m-d');
        $OTP=rand(100000,999999);
        $initPassword=rand(100000,999999);
        $result=$this->db->runQuery("SELECT(student_id) from student where nic='$nic'");
        if(empty($result[0]['student_id'])){
            $result=$this->db->runQuery("SELECT(student_id) from student where contact='$contact'");
            if(empty($result[0]['contact'])){
                $result=$this->db->runQuery("INSERT INTO student(nic,address,arival_date,gender,dob,contact,total_amount,district,city,div_sec,police_station,occupation,type,init_name,full_name) VALUES('$nic','$address','$date','$gender','$dob','$contact',$totalAmount,'$district','$city','$div_sec','$police','$occupation','$type','$initName','$fullName')");

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
        $result=$this->db->runQuery("INSERT INTO package_assigning VALUES('$studentId','$packageId','$receptionistId')");
        return $result;
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
        $result=$this->db->runQuery("INSERT INTO medical_report VALUES('$studentId','$medicalNo','$issuedDate')");
    }
    function addLernerPermitDetails($nic,$lPermit,$issDate,$endDate){
        $lPermit=intval($lPermit);
        $st_id = $this->db->runQuery("SELECT (student_id) FROM student WHERE nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        $result=$this->db->runQuery("INSERT INTO learner_permit VALUES ('$studentId','$lPermit','$issDate','$endDate')");
        return $result;
    }
    function addLicenseDetails($nic,$license,$issDate,$endDate){
        $license = intval($license);
        $st_id = $this->db->runQuery("SELECT (student_id) FROM student WHERE nic='$nic'");
        $studentId=intval($st_id[0]['student_id']);
        $result=$this->db->runQuery("INSERT INTO license VALUES ('$studentId','$license','$issDate','$endDate')");
        // echo $issDate;
        return $result;
    }
    //sessions 
    function session(){                                                                 //changed status->type here
        $result=$this->db->runQuery("SELECT sessions.session_id,sessions.session_title,sessions.session_date,sessions.session_time,sessions.type,employee.name,session_status.held_or_not FROM ((sessions INNER JOIN employee ON employee.employee_id=sessions.employee_id) INNER JOIN session_status ON session_status.session_id=sessions.session_id) ORDER BY sessions.session_date DESC");
        return $result;
    }
    function todSession($ssDate){
        $result=$this->db->runQuery("SELECT sessions.session_id,sessions.session_title,sessions.session_date,sessions.session_time,sessions.type,employee.name,session_status.held_or_not FROM ((sessions INNER JOIN employee ON employee.employee_id=sessions.employee_id) INNER JOIN session_status ON session_status.session_id=sessions.session_id) WHERE sessions.session_date='$ssDate'");
        return $result;
    }

    // addResult
    // function resultAll($today){
    //     $todayResult=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,exams.exam_id,exams.exam_type,exams.exam_date 
    //     FROM ((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) 
    //     INNER JOIN student ON student.student_id=exam_student_assigns.student_id) WHERE exams.exam_date='$today'");

    //     $check=$this->db->runQuery("SELECT exam_id AS participation_exam_id FROM exam_participation
    //     WHERE EXISTS (SELECT student_id FROM (exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) WHERE exams.exam_date='$today')");

    //     $result=array_merge($todayResult,$check);

    //     return $result;
    // }
    function resultAll($today){
        // $result1=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,exams.exam_id,exams.exam_type,exams.exam_date FROM ((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) WHERE exams.exam_date='$today'");
       
        // $studentResult = $stresult[0]['exam_id'];
        $result=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,exams.exam_id,exams.exam_type,exams.exam_date,exam_participation.results FROM (((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) INNER JOIN exam_participation ON (exam_participation.student_id=exam_student_assigns.student_id AND exam_participation.exam_id=exam_student_assigns.exam_id))  WHERE exams.exam_date='$today'");
        // echo $studentResult;
        // $stresult2=$this->db->runQuery("SELECT exam_participation.results AS getResults FROM exam_participation INNER JOIN exams ON exams.exam_id=exam_participation.exam_id WHERE exams.exam_date='$today'");

        // $result=array_merge($result1,$stresult2);
        return $result;
    }
    function search($today){
        // $result=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,student.student_status,student.type,exams.exam_id,exams.exam_type,exams.exam_date FROM ((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) WHERE exams.exam_date='$exDate'");
        $result=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,exams.exam_id,exams.exam_type,exams.exam_date,exam_participation.results FROM (((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) INNER JOIN exam_participation ON (exam_participation.student_id=exam_student_assigns.student_id AND exam_participation.exam_id=exam_student_assigns.exam_id))  WHERE exams.exam_date='$today'");
        return $result;
    }
    function addPass($id,$exId,$pass){
        $exStatus=$this->db->runQuery("SELECT exam_type FROM exams WHERE exam_id='$exId'");
        // $result=$this->db->runQuery("INSERT INTO exam_participation (student_id,exam_id,results) VALUES('$id','$exId','$pass')");
        //update
        $result=$this->db->runQuery("UPDATE exam_participation SET results='$pass' WHERE student_id='$id' AND exam_id='$exId'");
        // $exam = $this->db->runQuery("SELECT exams.exam_type FROM exams INNER JOIN exam_participation ON exam_participation.exam_id=exams.exam_id WHERE exam_participation.student_id='$id'");
        $extype = $exStatus[0]['exam_type'];
        if($extype=='Theory'){
            $extype="written exam passed";
        }
        else if($extype=='Practical'){
            $extype="trial exam passed";
        }
        if($pass=="Pass"){
            $result=$this->db->runQuery("UPDATE student SET student_status='$extype' WHERE student.student_id='$id'");
        }
        // $result2=$this->db->runQuery("");
        return $result;
    }

     //student list find special student
     function findStudent($findMe){
        $result=$this->db->runQuery("SELECT student_id,full_name,contact FROM student WHERE student_id LIKE '$findMe'");
        return $result;
    }
     //payment list of student
    function payMe($id){
        // $result=$this->db->runQuery("SELECT cash_payment.cpayment_id,payment_date_time,amount FROM cash_payment INNER JOIN cash_payment_submits ON cash_payment_submits.cpayment_id=cash_payment.cpayment_id WHERE cash_payment_submits.student_id='$id' UNION ALL SELECT online_payments.opayment_id,payment_date_time,amount FROM online_payments WHERE online_payments.student_id='$id' ORDER BY payment_date_time ASC");
        $cash=$this->db->runQuery("SELECT payment_date_time,amount,cash_payment.cpayment_id FROM cash_payment INNER JOIN cash_payment_submits ON cash_payment_submits.cpayment_id=cash_payment.cpayment_id WHERE cash_payment_submits.student_id='$id'");
        $online=$this->db->runQuery("SELECT payment_date_time,amount,online_payments.opayment_id FROM online_payments WHERE student_id='$id'");
        $result=array_merge($cash,$online);
        return $result;
   
    }

    // function getPaymentDetails($studentId){
        // $result_online=$this->db->runQuery("SELECT payment_date_time, amount, opayment_id FROM `online_payments` WHERE student_id='$studentId'");
        // $result_cash=$this->db->runQuery("SELECT  payment_date_time, amount,cash_payment.cpayment_id FROM cash_payment INNER JOIN cash_payment_submits ON cash_payment.cpayment_id=cash_payment_submits.cpayment_id WHERE student_id='$studentId'");  
        // $result=array_merge($result_cash,$result_online);
    //     return $result;

    // }


    function paidMethod($id){
        $result['cash']=$this->db->runQuery("SELECT cash_payment.cpayment_id,payment_date_time,amount FROM cash_payment INNER JOIN cash_payment_submits ON cash_payment_submits.cpayment_id=cash_payment.cpayment_id WHERE cash_payment_submits.student_id='$id'");
        $result['online']=$this->db->runQuery("SELECT online_payments.opayment_id,payment_date_time,amount FROM online_payments WHERE online_payments.student_id='$id'");
    //     $cash[2]['method'] = "Cash";
    //     $online[2]['method'] = "Online";
        return $result;
    }
    function payed($id){
        $cash = $this->db->runQuery("SELECT SUM(amount) AS sum_price FROM cash_payment_submits INNER JOIN cash_payment ON cash_payment.cpayment_id=cash_payment_submits.cpayment_id WHERE student_id='$id'");
        $online = $this->db->runQuery("SELECT SUM(amount) AS sum_price FROM online_payments WHERE student_id='$id'");

        $paid=0;
        $paid= intval($cash[0]['sum_price'])+intval($online[0]['sum_price']);
        return $paid;
    }
  
    function remain($id){
        //total
        $total = $this->db->runQuery("SELECT total_amount FROM student WHERE student_id='$id'");
        //paid amount
        // $cash = $this->db->runQuery("SELECT SUM(amount) AS sum_price FROM cash_payment_submits INNER JOIN cash_payment ON cash_payment.cpayment_id=cash_payment_submits.cpayment_id WHERE student_id='$id'");
        // $online = $this->db->runQuery("SELECT SUM(amount) AS sum_price FROM online_payments WHERE student_id='$id'");

        // $paid=0;
        // $paid= intval($cash[0]['sum_price'])+intval($online[0]['sum_price']);
        // $remain['remain'] = intval($total[0]['total'])-intval($paid[0]['sum_price']);
        return $total;
    }

    function addPayment($id,$amount,$reciptionistId){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        //SELECT FORMAT (200.364, 'c', 'si-LK') 
        $result = $this->db->runQuery("INSERT INTO cash_payment (payment_date_time,amount) VALUES('$date','$amount')");
        $cPaymentId=$this->db->runQuery("SELECT cpayment_id FROM cash_payment ORDER BY cpayment_id DESC LIMIT 1");
        $cPaymentId=intval($cPaymentId[0]['cpayment_id']);
    
        $result1 = $this->db->runQuery("INSERT INTO cash_payment_submits (student_id,cpayment_id,receptionist_id) VALUES('$id','$cPaymentId','$reciptionistId')");
        return $result;

        // $result=$this->db->runQuery("INSERT INTO exams(exam_type,exam_date,exam_time,employee_id) VALUES('$values[0]','$values[1]','$values[2]',$managerId)");
        // $examId=$this->db->runQuery("SELECT exam_id FROM exams ORDER BY exam_id DESC LIMIT 1");

        // $examId=intval($examId[0]['exam_id']);
        // for($i=0;$i<count($instructorsList);$i++){
        //     $result=$this->db->runQuery("INSERT INTO exam_conductor_assigns VALUES($managerId,$examId,$instructorsList[$i])");
        // }
    }
    function viewD(){
        $result=$this->db->runQuery("SELECT student_id,full_name,contact FROM student");
        return $result;
    }
    function viewDetails($id){
        $result=$this->db->runQuery("SELECT student_id,init_name,full_name,address,NIC,gender,district,city,div_sec,police_station,dob,contact,occupation,type,arival_date FROM student WHERE student_id='$id'");
        return $result;
    }
    //-----------------------------------------------------------------------part 2 ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //examPassed
    function display_examPassed(){
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM ((student INNER JOIN exam_participation ON exam_participation.student_id=student.student_id) INNER JOIN exams ON exams.exam_id=exam_participation.exam_id) WHERE exam_participation.results='Pass' AND exams.exam_type='Theory'");
        $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student_status='written exam passed'");
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student.type='written' AND student.student_status='pass'");
        return $result;
    }
    //examFailed
    function display_examFailed(){
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM ((student INNER JOIN exam_participation ON exam_participation.student_id=student.student_id) INNER JOIN exams ON exams.exam_id=exam_participation.exam_id) WHERE exam_participation.results='Fail' AND exams.exam_type='Theory'");
        $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student_status='written exam failed'");
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student.type='written' AND student.student_status='fail'");
        return $result;
    }
    //trialPassed
    function display_trialPassed(){
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM ((exam_participation INNER JOIN student ON student.student_id=exam_participation.student_id) INNER JOIN exams ON exams.exam_id=exam_participation.exam_id) WHERE (exams.exam_type='Practical' OR exams.exam_type='Trial') AND exam_participation.results='Pass'");
        $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student_status='trial exam passed'");
        // $result=$this->db->runQuery("SELECT student.student_id,student.full_name,student.contact FROM student WHERE student.type='trial' AND student.student_status='pass'");
        return $result;
    }
        //whoAmI
    function whoAmI($id){
        $result=$this->db->runQuery("SELECT student_id,full_name FROM student WHERE student_id='$id'");
        return $result;
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
    function updateMe($id,$init,$fName,$add,$nic,$gen,$dis,$city,$dds,$police,$dob,$con,$occ,$type){
        $result=$this->db->runQuery("UPDATE student SET NIC='$nic', student.address='$add', gender='$gen', dob='$dob', contact='$con',district='$dis', city='$city', div_sec='$dds', police_station='$police', occupation='$occ', student.type='$type', init_name='$init', full_name='$fName' WHERE student_id='$id'");
        return $result;
    }
    // function update_me($id,$init,$fName,$add,$nic,$gen,$dis,$city,$dds,$police,$dob,$con,$occ,$type){
    //     $result=$this->db->runQuery("UPDATE student SET NIC='$nic', student.address='$add', gender='$gen', dob='$dob', contact='$con',district='$dis', city='$city', div_sec='$dds', police_station='$police', occupation='$occ', student.type='$type', init_name='$init', full_name='$fName' WHERE student_id='$id'");
    //     return $result;
    // }
    function update_me($id,$init){
        $result=$this->db->runQuery("UPDATE student SET init_name='$init' WHERE student_id='$id'");
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
    function getDatesOfSessionsAndSessions(){
        $sessionResult=$this->db->runQuery("SELECT DISTINCT sessions.session_date as date from sessions");
        $examResult=$this->db->runQuery("SELECT DISTINCT exams.exam_date as date from exams");
        $result=array_merge($sessionResult,$examResult);
        return $result;
    }
}