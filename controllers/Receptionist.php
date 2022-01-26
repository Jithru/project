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
    function vehicleClassSelection($data){
        
        $values = explode(",", $data);

        $result=$this->model->getVehicleClasses($values[0],$values[1],$values[2],$values[3],$values[4]);
        echo $result;
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
        echo $resultMsg;
        // echo "nic:".$values[0]." addres:".$values[1]." gender:".$values[2]." dateofBIrth:".$values[3]. " contact:".$values[4]."  init:".$values[5]."  pack:".$values[6]." district:".$values[7]." city:".$values[8]." divsec:".$values[9]." police:".$values[10]." occupation:".$values[11]." type:".$values[12]." initName:".$values[13]." fullName:".$values[14]." medicalNo:".$values[15]." issuedDate:".$values[16];
    
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
    function studentList(){

        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('receptionist/studentList');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }   
    }
    
    function getStudentDetails(){
        $result=$this->model->getStudentDetails();
        echo json_encode($result);
    }

    function getEmployeeDetailsMore($id){
        $result=$this->model->getEmployeeDetailsMore($id);
        // echo "hi";
        echo json_encode($result);
    }
    function viewExam($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                if($id!=''){
                    $_SESSION['viewExamId']=$id;
                }
                $this->view->render('Receptionist/viewExam');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
        
    }
    function viewSession($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                if($id!=''){
                    $_SESSION['viewSessionId']=$id;
                }
                $this->view->render('Receptionist/viewSession');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
    }
    function viewStudent(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewStudent');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }   
    }
    function viewStudentS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewStudentS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
        
    }
    function viewInstructor(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewInstructor');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
    }
    function viewInstructorS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewInstructorS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
    }
    function viewVehicle(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewVehicle');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
    }
    function viewVehicleS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Receptionist'){
                $this->view->render('Receptionist/viewVehicleS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function getAvailableSessions(){
        $result=$this->model->getSessions();
        echo json_encode($result);
    }

    function getAvailableExams(){
        $result=$this->model->getExams();
        echo json_encode($result);
    }
    function getExamDetails(){
        $result=$this->model->getExamDetails($_SESSION['viewExamId']);
        echo json_encode($result); 
    }
    function loadPreSelectedInstructors(){
        $result=$this->model->loadPreSelectedInstructors($_SESSION['viewExamId']);
        echo json_encode($result);
    }
    function loadPreSelectedVehicles(){
        $result=$this->model->loadPreSelectedVehicles($_SESSION['viewExamId']);
        echo json_encode($result);
    }
    function loadPreSelectedStudents(){
        $result=$this->model->loadPreSelectedStudents($_SESSION['viewExamId']);
        echo json_encode($result);
    }
    //Sessions
    function getSessionDetails(){
        $result=$this->model->getSessionDetails($_SESSION['viewSessionId']);
        echo json_encode($result); 
    }
    function loadPreSelectedInstructorsS(){
        $result=$this->model->loadPreSelectedInstructorsS($_SESSION['viewSessionId']);
        echo json_encode($result);
    }
    function loadPreSelectedVehiclesS(){
        $result=$this->model->loadPreSelectedVehiclesS($_SESSION['viewSessionId']);
        echo json_encode($result);
    }
    function loadPreSelectedStudentsS(){
        $result=$this->model->loadPreSelectedStudentsS($_SESSION['viewSessionId']);
        echo json_encode($result);
    }
    
}