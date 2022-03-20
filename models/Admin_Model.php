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
        // check whether contact or nic is empty or not that feched from admin table
        if(empty($contact)||empty($nic)){
            
            if(empty($contact)){
                $contact=$this->db->runQuery("SELECT contact_no FROM employee WHERE contact_no='$telNo'");
            }
            if(empty($nic)){
                $nic=$this->db->runQuery("SELECT nic FROM employee WHERE nic='$NIC'");
            }
            // check whether contact or nic is empty or not that feched from student table
            if(empty($contact)||empty($nic)){
                if(empty($contact)){
                    $contact=$this->db->runQuery("SELECT contact FROM student WHERE contact='$telNo'");
                }
                if(empty($nic)){
                    $nic=$this->db->runQuery("SELECT NIC FROM student WHERE NIC='$NIC'");
                }
                
                
            }
        }
        // check whether contact or nic is empty or not that feched from employee table
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
    //view more employee
    public function getEmployeeDetailsMore($id){
        $result=$this->db->runQuery("SELECT employee_id,name,job_title,nic,contact_no,address,dob,gender,hired_date FROM employee WHERE employee_id='$id'");
        $license=[];
        if($result[0]['job_title']=='Instructor'){
            $license=$this->db->runQuery("SELECT instructor_license_id FROM instructor WHERE employee_id='$id'");
        }
        $_SESSION['empID']=$id;
        $_SESSION['empDetails'] = array_merge($result, $license);
    }

    public function displayEmployeeDetailsforEdit(){
        $id=$_SESSION['empID'];
        $result=$this->db->runQuery("SELECT name,contact_no,address FROM employee WHERE employee_id='$id'");
        return $result;
    }

    
    //complaints function , view copmplaints
    function getcomplaints(){
        $result=$this->db->runQuery("SELECT complaints.submitted_date_time,complaints.description,complaints.suggestions, student.init_name from complaints INNER JOIN student on student.student_id=complaints.student_id");
        return $result;

    }
    // view reviews
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
        $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount , packages.type ,packages.status from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) group by package_id");
        return $result;
    }
    //get packages for edit packages page
    function clickEditPackages($id){
        $_SESSION['package_id'] = $id;
        // $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount , packages.type, packages.training_days from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) where packages.package_id='$id'");
        // $_SESSION['packageDetails'] = $result;
        return 'success';
    }
    //details for edit packages
    function editDetails(){
        $id=$_SESSION['package_id'];
        $data = $result=$this->db->runQuery("SELECT packages.package_id,GROUP_CONCAT(vehicle_classes.vehicle_class) as classes,packages.amount , packages.type, packages.training_days ,packages.status from ((package_n_vehicles inner join packages on package_n_vehicles.package_id=packages.package_id) inner join vehicle_classes on package_n_vehicles.vehicle_class_id=vehicle_classes.vehicle_class_id) where packages.package_id='$id'");;
        $class=$this->db->runQuery("SELECT vehicle_class FROM vehicle_classes");
        $results = array($class,$data);
        return $results;
    }

//edit pacckage------------------------------------------------------------------------------------------------------------------
    //function for edit pakage  name
    function editPackageName($name){
        $ID=$_SESSION['package_id'];
        $result = $this->db->runQuery("UPDATE packages SET type ='$name' WHERE package_id='$ID'");
        return "success";
    }
    //function for edit pakage  days
    function editPackageDays($days){
        $ID=$_SESSION['package_id'];
        $result = $this->db->runQuery("UPDATE packages SET training_days ='$days' WHERE package_id='$ID'");
        return "success";
    }
    //function for edit pakage price
    function editPackagePrices($price){
        $ID=$_SESSION['package_id'];
        $result = $this->db->runQuery("UPDATE packages SET amount ='$price' WHERE package_id='$ID'");
        return "success";
    }
//------------------------------------------------------------------------------------------------------------------
    ///function fo delete packages
    function deletePackage($username,$password){
        $result=$this->db->runQuery("SELECT passwordhash FROM admin WHERE username='$username'");
        if(!empty($result)){
            if(password_verify($password,
            $result[0]['passwordhash'] )){
                $ID=$_SESSION['package_id'];
                $status='deactive';
                $result = $this->db->runQuery("UPDATE packages SET status ='$status' WHERE package_id='$ID'");
                return "success";
            }
            else{return 'fales';}
        }
        else{return 'fales';}
    }
    //get vehicle classes for add package ui
    function getClasses(){
        $class=$this->db->runQuery("SELECT vehicle_class,vehicle_class_id FROM vehicle_classes");
        return  $class;
    }

    //add packages
    function addPackageLogic($details){
        $this->db->runQuery("INSERT INTO packages (type,training_days,amount,status) VALUES ('$details[0]','$details[1]','$details[2]','active')");
        $PackId=$this->db->runQuery("SELECT package_id FROM packages WHERE type='$details[0]'");
        $id = $PackId[0]['package_id'];
        $size = sizeof($details)-3;
        // echo 'abcd_________'.$details[3];
        for($i=3;$i<sizeof($details);$i++){
            // echo $i;
            $this->db->runQuery("INSERT INTO package_n_vehicles (package_id, vehicle_class_id) VALUES ('$id', '$details[$i]')");
        }
    }


    function updateEmployeeDetails($cat,$data){
        $ID=$_SESSION['empID'];
        if($cat=="name"){
            $result = $this->db->runQuery("UPDATE employee SET name ='$data' WHERE employee_id='$ID'");
        }
        else if($cat=="contact"){
            $result = $this->db->runQuery("UPDATE employee SET contact_no ='$data' WHERE employee_id='$ID'");
        }
        else if($cat=="address"){
            $result = $this->db->runQuery("UPDATE employee SET address ='$data' WHERE employee_id='$ID'");
        }
        echo "success";

    }

    

    

    
}

                                      