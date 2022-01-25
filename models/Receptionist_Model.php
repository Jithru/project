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
}