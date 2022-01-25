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
    function getVehicleClasses($classA,$classAauto,$classB1,$classB){
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
        // if($classBauto=="true"){
        //     $result=$this->db->runQuery("SELECT initial_charge FROM vehicle_classes WHERE vehicle_class='B-Auto'");
        //     $total=$total+doubleval($result[0]['initial_charge']);
        // }
            
        return $total;
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
    function addLernerPermitDetails($nic,$lPermit,$issDate,$endDate){
        $lPermit=intval($lPermit);
        $id = $this->db->runQuery("SELECT (student_id) FROM student WHERE nic='$nic'");
        $studentId=intval($id[0]['student_id']);
        $result=$this->db->runQuery("INSERT INTO learner_permit VALUES ('$studentId','$lPermit','$issDate','$endDate')");
        return $result;
    }
    function addLicenseDetails($nic,$license,$issDate,$endDate){
        $license = intval($license);
        $id = $this->db->runQuery("SELECT (student_id) FROM student WHERE nic='$nic'");
        $studentId=intval($id[0]['student_id']);
        $result=$this->db->runQuery("INSERT INTO license VALUES ('$studentId','$license','$issDate','$endDate')");
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
    function search($exDate){
        // $result=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,student.student_status,student.type,exams.exam_id,exams.exam_type,exams.exam_date FROM ((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) WHERE exams.exam_date='$exDate'");
        $result=$this->db->runQuery("SELECT exam_student_assigns.student_id,student.full_name,exams.exam_id,exams.exam_type,exams.exam_date,exam_participation.results FROM (((exam_student_assigns INNER JOIN exams ON exams.exam_id=exam_student_assigns.exam_id) INNER JOIN student ON student.student_id=exam_student_assigns.student_id) INNER JOIN exam_participation ON  (exam_participation.student_id=exam_student_assigns.student_id AND exam_participation.exam_id=exam_student_assigns.exam_id))  WHERE exams.exam_date='$exDate'");
        return $result;
    }
    function addPass($id,$exId,$pass){
        $exStatus=$this->db->runQuery("SELECT exam_type FROM exams WHERE exam_id='$exId'");
        // $result=$this->db->runQuery("INSERT INTO exam_participation (student_id,exam_id,results) VALUES('$id','$exId','$pass')");
        //update
        $result=$this->db->runQuery("UPDATE exam_participation SET results='$pass' WHERE student_id='$id' AND exam_id='$exId'");
        // $exam = $this->db->runQuery("SELECT exams.exam_type FROM exams INNER JOIN exam_participation ON exam_participation.exam_id=exams.exam_id WHERE exam_participation.student_id='$id'");
        $extype = $exStatus[0]['exam_type'];
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
    
}