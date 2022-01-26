<?php

class Student extends Controller{

    function __construct(){
        parent:: __construct();
    }

    function index(){
        
            if(isset($_SESSION['job_title'])){
                if($_SESSION['job_title']=='student'){
                    $this->view->render('Student/profile');
                }else{
                    $this->view->render('error');
                }
            }
            else{
                $this->view->render('error');
            }
            // redirect('Receptionist');
    }
    function eventCalendar(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/eventCalendar');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function complaints(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/complaints');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }

    }

    function complaintLogic($data){
        $value=explode(",",$data);
        $studentId=$_SESSION['student_id'];
        $this->model->setComplaints($value[0],$value[1],$studentId);
       
        // echo $value[0];
        // echo $value[1];
    }

    function reviewLogic($data){
        $value=explode(",",$data);
        $studentId= $_SESSION['student_id'];
        $this->model->setReview($value[0],$value[1],$value[2],$studentId);
        //methanin nawettuwe
        

    }
    function editprofile(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/editprofile');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
// homepage profile
    function profileLogic(){
        $value=$this->model->getProfileDetails();   
       echo json_encode($value);

    }

    // after click edit profile button

    // function editProfileData(){
    //     $value=$this->model->
    // }
//-------------------------->
    function validate($password){
        // echo $password;
        $studentId=$_SESSION['student_id'];
        $result=$this->model->checkPassword($studentId,$password);
        if($result==true){
            echo "success";
        }
    }

    function updatePasswordLogic($password){
        $studentId=$_SESSION['student_id'];
        $result=$this->model->updatePassword($studentId,$password);
        if($result==true){
            echo "updated";
        }

    }
//----------------------->
    function makepayments(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/makepayments');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function paymentDetails(){
        $studentId=$_SESSION['student_id'];
        $value=$this->model->getPaymentDetails($studentId);
        echo json_encode($value);
    }

    function paymentDetailsAmount(){
        $value=$this->model->getProfileDetailsAmount();   
        echo json_encode($value);
    }

    function markGoingNotGoing(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/markGoingNotGoing');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function markGoingNotGoingLogic(){
        
        $value=$this->model->getTodaySession();
        echo json_encode($value);
        
    }

    function markGoingNotGoingLogic_Going($status){
        $value=$this->model->upadateTodaySession($status);

    }

    function payments(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/payments');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function examDetails(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/examdetails');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function getExamDetailsLogic(){
        $value=$this->model->getTheoryTrailExamDetails();
        echo json_encode($value);

    }
    


    function review(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/review');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function viewExam($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='student'){
                if($id!=''){
                    $_SESSION['viewExamId']=$id;
                }
                $this->view->render('Student/viewExam');
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
            if($_SESSION['job_title']=='student'){
                if($id!=''){
                    $_SESSION['viewSessionId']=$id;
                }
                $this->view->render('Student/viewSession');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewStudent');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewStudentS');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewInstructor');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewInstructorS');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewVehicle');
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
            if($_SESSION['job_title']=='student'){
                $this->view->render('Student/viewVehicleS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function getAvailableSessions(){
        $result=$this->model->getSessions($_SESSION['student_id']);
        echo json_encode($result);
    }

    function getAvailableExams(){
        $result=$this->model->getAllExams($_SESSION['student_id']);
        echo json_encode($result);
    }
    function getAllSessions(){
        $result=$this->model->getAllSessions($_SESSION['student_id']);
        echo json_encode($result);
    }

    function getAllExams(){
        $result=$this->model->getExams($_SESSION['student_id']);
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

    //request part
    function requestExam($id){
        $result=$this->model->requestForExam($id,$_SESSION['student_id']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function requestSession($id){
        $result=$this->model->requestForSession($id,$_SESSION['student_id']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }

}