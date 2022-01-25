<?php

class Receptionist extends Controller{

    function __construct(){
        parent:: __construct();
    }
    function index(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/profile');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function payments(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/payments');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    
    function eventCalendar(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/eventCalendar');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    
    function registration(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/registration');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    //<br /><b>Notice</b>:  Undefined offset: 4 in <b>C:\xampp\htdocs\project\controllers\Receptionist.php</b>
    // on line <b>60</b><br />2000
    //$cube = explode(",",$send);
    //$result=$this->model->addPass($cube[0],$cube[1],$cube[2]);
    function vehicleClassSelection($data){
        $values = explode(",",$data);
        $result=$this->model->getVehicleClasses($values[0],$values[1],$values[2],$values[3]);
        echo json_encode($result);
    }
    function packageSelection(){
        $result=$this->model->getPackages();
        $data=$result;
        echo json_encode($data);
    }
    function registerForWritten($data,$vehicleCLasses,$packageId,$classArray){
        $values = explode(",", $data);
        // echo $packageId;
        $resultMsg=$this->model->addStudent($values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14]);
        // echo json_encode($result);
        $receptionistId=$_SESSION['employee_id'];
        $result=$this->model->addInitExpenses($values[0],$vehicleCLasses,$receptionistId);
        $result=$this->model->assignPackages($values[0],$packageId,$receptionistId);
        $result=$this->model->assginVehicleClasses($values[0],$classArray);
        $result=$this->model->addMedicalDetails($values[0],$values[15],$values[16]);
        // echo $resultMsg;
        // echo json_encode($resultMsg);
        echo "nic:".$values[0]." addres:".$values[1]." gender:".$values[2]." dateofBIrth:".$values[3]. " contact:".$values[4]."  init:".$values[5]."  pack:".$values[6]." district:".$values[7]." city:".$values[8]." divsec:".$values[9]." police:".$values[10]." occupation:".$values[11]." type:".$values[12]." initName:".$values[13]." fullName:".$values[14]." medicalNo:".$values[15]." issuedDate:".$values[16];
    
    }
    function registerForTrial($data,$vehicleCLasses,$packageId,$classArray){
        $values = explode(",", $data);
        // echo $packageId;
        $resultMsg=$this->model->addStudent($values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14]);
        // echo json_encode($result);
        $receptionistId=$_SESSION['employee_id'];
        $result=$this->model->addInitExpenses($values[0],$vehicleCLasses,$receptionistId);
        $result=$this->model->assignPackages($values[0],$packageId,$receptionistId);
        $result=$this->model->assginVehicleClasses($values[0],$classArray);
        $result=$this->model->addLernerPermitDetails($values[0],$values[15],$values[16],$values[17]);
        echo json_encode($result);
    }
    function registerForLicense($data,$vehicleCLasses,$packageId,$classArray){
        $values = explode(",", $data);
        // echo $packageId;
        $resultMsg=$this->model->addStudent($values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10],$values[11],$values[12],$values[13],$values[14]);
        // echo json_encode($result);
        $receptionistId=$_SESSION['employee_id'];
        $result=$this->model->addInitExpenses($values[0],$vehicleCLasses,$receptionistId);
        $result=$this->model->assignPackages($values[0],$packageId,$receptionistId);
        $result=$this->model->assginVehicleClasses($values[0],$classArray);
        $result=$this->model->addLicenseDetails($values[0],$values[15],$values[16],$values[17]);
        echo json_encode($result);
    }
    function sessions(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/sessions');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function sessionsToday(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/sessionsToday');
            }
            else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    //----------------------------------part 1 -------------------------------------------------------------------
    //sessions
    function my_sessions(){
        $result=$this->model->session();
        echo json_encode($result);
    }
    function todaySession($ssDate){
        $result=$this->model->todSession($ssDate);
        echo json_encode($result);
        
    }
     //addResults
     function addResult(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/addResult');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function resultAll($today){
        $result = $this->model->resultAll($today);
        echo json_encode($result);
    }
    function search($exDate){
        $result=$this->model->search($exDate);
        echo json_encode($result);
    }
    function addPass($send){
        $cube = explode(",",$send);
        $result=$this->model->addPass($cube[0],$cube[1],$cube[2]);
        // $result=$this->model->addPass($cube[0],$cube[1],$cube[2]);
        echo json_encode($result);
    }
    // function addFail($send){
    //     $cube = explode(",",$send);
    //     $result=$this->model->addFail($cube[0],$cube[1]);
    //     echo json_encode($result);
    // }
    
    
}