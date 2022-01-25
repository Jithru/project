<?php

class Admin_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }
    function loadJobs(){
        $jobs['Manager']='Manager';
        $jobs['Receptionist']='Receptionist';
        $jobs['Instructor']='Instructor';
        $jobs['Teacher']='Teacher';
        return $jobs;
    }
    //return truth value and usertype
    public function registerEmployee($name, $empAddress, $NIC, $Dob, $gender, $telNo, $empType,$licenseNumber) {
        $hired_date = date('Y-m-d');
        $OTP=rand(100000,999999);
        $initPassword=rand(100000,999999);
        $contact=$this->db->runQuery("SELECT contact FROM admin WHERE contact='$telNo'");
        $nic=$this->db->runQuery("SELECT nic FROM admin WHERE nic='$NIC'");
        if(empty($contact)||empty($nic)){
            
            if(empty($contact)){
                $contact=$this->db->runQuery("SELECT contact_no FROM employee WHERE contact_no='$telNo'");
            }
            if(empty($nic)){
                $nic=$this->db->runQuery("SELECT nic FROM employee WHERE nic='$NIC'");
            }
        
            if(empty($contact)||empty($nic)){
                if(empty($contact)){
                    $contact=$this->db->runQuery("SELECT contact FROM student WHERE contact='$telNo'");
                }
                if(empty($nic)){
                    $nic=$this->db->runQuery("SELECT NIC FROM student WHERE NIC='$NIC'");
                }
                
                
            }
        }

        if(empty($contact)&&empty($nic)){
            $this->db->runQuery("INSERT INTO employee (name, address, gender, dob ,hired_date, contact_no, nic, job_title) VALUES ('$name','$empAddress', '$gender', '$Dob','$hired_date','$telNo', '$NIC', '$empType')");

            $emp_Id=$this->db->runQuery("SELECT employee_id FROM employee WHERE nic='$NIC'");
            $Emp_Id=$emp_Id[0]['employee_id'];

            $this->db->runQuery("INSERT INTO employee_key (otp, employee_id) VALUES ('$OTP', '$Emp_Id')");
            $this->db->runQuery("INSERT INTO employee_private (password, employee_id) VALUES ('$initPassword', '$Emp_Id')");

            if($empType=='Manager'){
                $this->db->runQuery("INSERT INTO manager (employee_id) VALUES ('$Emp_Id')");
            }
            if($empType=='Receptionist'){
                $this->db->runQuery("INSERT INTO receptionist (employee_id) VALUES ('$Emp_Id')");
            }
            if($empType=='Instructor'){
                $this->db->runQuery("INSERT INTO instructor (employee_id , instructor_license_id) VALUES ('$Emp_Id', '$licenseNumber')");
            }
            if($empType=='Teacher'){
                $this->db->runQuery("INSERT INTO teacher (employee_id) VALUES ('$Emp_Id')");
            }

            // sendOtp($OTP);
            return "successfull,".$OTP; 
        }
        else if(!empty($contact)&&empty($nic)){
            return "contact exist";
        }
        else if(empty($contact)&&!empty($nic)){
            return "nic exist";
        }
        else{
            return "nic contact exist";
        }
    }

    public function getEmployeeDetails(){
        $result=$this->db->runQuery("SELECT employee_id,name,job_title,contact_no FROM employee");
        return $result;
    }

    public function getStudentDetails(){
        $result=$this->db->runQuery("SELECT student_id,init_name,contact FROM student");
        return $result;
    }
    //function for get students more details and store them to a session variable
    public function viewMoreStudentsDetails($id){
        $result=$this->db->runQuery("SELECT student_id,init_name,full_name,address,NIC,gender,district,city,div_sec,police_station,dob,contact,occupation,type,arival_date FROM student WHERE student_id='$id'");
        $_SESSION['result'] = $result;
        return "success";
    }

    public function getEmployeeDetailsMore($id){
        $result=$this->db->runQuery("SELECT employee_id,name,job_title,nic,contact_no,address,dob,gender,hired_date FROM employee WHERE employee_id='$id'");
        $license=[];
        if($result[0]['job_title']=='Instructor'){
            $license=$this->db->runQuery("SELECT instructor_license_id FROM instructor WHERE employee_id='$id'");
        }

        $_SESSION['empDetails'] = array_merge($result, $license);
    }

    

    function getcomplaints(){
        $result=$this->db->runQuery("SELECT complaints.submitted_date_time,complaints.description,complaints.suggestions, student.init_name from complaints INNER JOIN student on student.student_id=complaints.student_id");
        return $result;

    }
    function getreviews(){
        $result=$this->db->runQuery("SELECT reviews.submitted_date_time,reviews.idea,reviews.satisfaction,reviews.improvements, student.init_name from reviews INNER JOIN student on student.student_id=reviews.student_id");
        return $result;
    }

    //this is vehicle classes type container

    function VehicleClassesByName(){
        $VehicleClasses = array("Dual Purpose","Dual Purpose-Auto", "Motor Car" ,"Motor Car-Auto" , "Motor Tricycle" , "Motor Cycle" , "Motor Cycle-Auto" );
        return $VehicleClasses;
    }


    // this function call from controller/Asmin/addVehiclelogic()   
    function addVehiclelogic($vehicleNum,$type,$classType){
        $Classes = array("B","B-Auto", "B" ,"B-Auto" , "B1" , "A" , "A-Auto" );
        $date=date("Y-m-d h:i:sa");
        $class="";
        for($i=0;$i<sizeof($classType);$i++){
            if($type==str_replace(" ","~",$classType[$i])){
                $class=$Classes[$i];
            }
            
        }
        $class_id=$this->db->runQuery("SELECT vehicle_class_id FROM vehicle_classes WHERE '$class'=vehicle_class");
        $id= $class_id[0]['vehicle_class_id'];
        $this->db->runQuery("INSERT INTO vehicle (vehicle_no,vehicle_type,added_date_time,vehicle_class_id) VALUES ('$vehicleNum','$type','$date','$id')");
        return "successfull";

        
    }
    
    
    // function for view all vehicles (get from db)
    function loadVehicle(){
        $result = $this->db->runQuery("SELECT vehicle.vehicle_id,vehicle.vehicle_no,vehicle.vehicle_type,vehicle.added_date_time, vehicle_classes.vehicle_class from vehicle INNER JOIN vehicle_classes on vehicle.vehicle_class_id=vehicle_classes.vehicle_class_id");
        return $result;
    }

    //Init prices and extra charges
    function loadInitPrices(){
        $classes = $this->VehicleClassesByName();
        $Vclass = array(array("Dual Purpose/Motor Car","Dual Purpose-Auto/Motor Car-Auto","Motor Tricycle" , "Motor Cycle" , "Motor Cycle-Auto" ), array("B","B-Auto", "B1" , "A" , "A-Auto" ) ,array() , array(), array());
        $prices = $this->db->runQuery("SELECT vehicle_class,initial_charge,extra_charges_for_extra_day,vehicle_class_id FROM vehicle_classes");
        for($i=0;$i<sizeof($Vclass[1]);$i++){
            for($j=0;$j<sizeof($Vclass[1]);$j++)
            {
                if($Vclass[1][$i]==$prices[$j]['vehicle_class']){
                    $Vclass[2][$i]=$prices[$j]['initial_charge'];
                    $Vclass[3][$i]=$prices[$j]['extra_charges_for_extra_day'];
                    $Vclass[4][$i]=$prices[$j]['vehicle_class_id'];
                }
            }
        }

        return $Vclass;
    }
    //Packages / edit change initial prices
    function editInitPrices($details){
        $this->db->runQuery("UPDATE vehicle_classes SET initial_charge = '$details[1]' WHERE vehicle_class_id = '$details[0]'");
        return 'success';
    }
    //Packages / edit change Extra prices
    function editExtraPrices($details)
    {
        $this->db->runQuery("UPDATE vehicle_classes SET extra_charges_for_extra_day = '$details[1]' WHERE vehicle_class_id = '$details[0]'");
        return 'success';
    }
    //load Service Charges for RMV ----> initial charges
    function loadExpences(){
        $res1=$this->db->runQuery("SELECT * FROM initial_service_expenses");
        return $res1;

    }
    //load Service Charges for RMV ----> other charges
    function loadOtherExpences(){
        $res2=$this->db->runQuery("SELECT * FROM exam_failure_charges");
        return $res2;
    }
    //Edit Service Charges for RMV ----> initial charges
    function editInitCharges($data){
        $this->db->runQuery("UPDATE initial_service_expenses SET amount = '$data[1]' WHERE ischarge_id = '$data[0]'");
        return 'success';
    }
    //Edit Service Charges for RMV ----> other charges
    function editOtherCharges($data){
        $this->db->runQuery("UPDATE exam_failure_charges SET amount = '$data[1]' WHERE ef_id = '$data[0]'");
        return 'success';
    }
    //select packages for view training packages
    function getPackages(){
        $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount , packages.type from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) group by package_id");
        return $result;
    }
    //get packages for edit packages page
    function clickEditPackages($id){
        $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount , packages.type from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) where packages.package_id='$id'");
        $_SESSION['packageDetails'] = $result;
        return 'success';
    }

    

    
}

                                      