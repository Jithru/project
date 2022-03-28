<?php

class Instructor extends Controller{

    function __construct(){
        parent:: __construct();
    }
    function index(){
        
        $this->view->render('Conductor/profile');
    }
    function eventCalendar(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/eventCalendar');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function markAttendance(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/markAttendance');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }  
    }
    function upload(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/upload');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }  
    }
    function editprofile(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/editprofile');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function sessions(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/markGoingNotGoing');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        } 
    }
// get session relevant to conductor Id
    function markGoingNotGoingLogic(){
        
        $value=$this->model->getTodaySession();
        echo json_encode($value);
        
    }
    function profileLogic(){
        $value=$this->model->getProfileDetails();   
        echo json_encode($value);

    }
 

    function viewExam($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Instructor'){
                if($id!=''){
                    $_SESSION['viewExamIdInstructor']=$id;
                }
                $this->view->render('Conductor/viewExam');
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
            if($_SESSION['job_title']=='Instructor'){
                if($id!=''){
                    $_SESSION['viewSessionIdInstructor']=$id;
                }
                $this->view->render('Conductor/viewSession');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewStudent');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewStudentS');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewInstructor');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewInstructorS');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewVehicle');
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
            if($_SESSION['job_title']=='Instructor'){
                $this->view->render('Conductor/viewVehicleS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function getAvailableSessions(){
        $result=$this->model->getSessions($_SESSION['employee_id']);
        echo json_encode($result);
    }

    function getAvailableExams(){
        $result=$this->model->getExams($_SESSION['employee_id']);
        echo json_encode($result);
    }
    function getExamDetails(){
        $result=$this->model->getExamDetails($_SESSION['viewExamIdInstructor']);
        echo json_encode($result); 
    }
    function loadPreSelectedInstructors(){
        $result=$this->model->loadPreSelectedInstructors($_SESSION['viewExamIdInstructor']);
        echo json_encode($result);
    }
    function loadPreSelectedVehicles(){
        $result=$this->model->loadPreSelectedVehicles($_SESSION['viewExamIdInstructor']);
        echo json_encode($result);
    }
    function loadPreSelectedStudents(){
        $result=$this->model->loadPreSelectedStudents($_SESSION['viewExamIdInstructor']);
        echo json_encode($result);
    }
    //Sessions
    function getSessionDetails(){
        $result=$this->model->getSessionDetails($_SESSION['viewSessionIdInstructor']);
        echo json_encode($result); 
    }
    function loadPreSelectedInstructorsS(){
        $result=$this->model->loadPreSelectedInstructorsS($_SESSION['viewSessionIdInstructor']);
        echo json_encode($result);
    }
    function loadPreSelectedVehiclesS(){
        $result=$this->model->loadPreSelectedVehiclesS($_SESSION['viewSessionIdInstructor']);
        echo json_encode($result);
    }
    function loadPreSelectedStudentsS(){
        $result=$this->model->loadPreSelectedStudentsS($_SESSION['viewSessionIdInstructor']);
        echo json_encode($result);
    }
    function loadAllSessionsForToday(){
        $result=$this->model->loadAllSessionsForToday($_SESSION['employee_id']);
        echo json_encode($result);
    }
    function loadStudentsForSession($sessionId){
        $result=$this->model->loadStudentsForSession($sessionId);
        echo json_encode($result);
    }
    function setAbsent($sessionId,$studentId){
        $result=$this->model->setAbsent($sessionId,$studentId);
        if($result==true){
            echo $sessionId;
        }
    }
    function setPresent($sessionId,$studentId){
        $result=$this->model->setPresent($sessionId,$studentId);
        if($result==true){
            echo $sessionId;
        }
    }
    function imageUploading(){
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/project/public/images/profilePicsEmployee/";
        
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        // $_FILES["photo"]["name"]=$_SESSION['student_id'];
        // $target_file = $target_dir .$_FILES["photo"]["name"];
        $file=$_FILES["photo"]["name"];
        $tempName=$_FILES["photo"]["tmp_name"];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $path_filename_ext = $target_dir.$filename;
        $result=$this->model->imageUploading(basename($_FILES["photo"]["name"]),$_SESSION['employee_id']);
        move_uploaded_file($tempName,$target_file);
        
        // echo $target_file;
        // echo $tempName;
        echo $result;

    }
    function getDatesOfSessionsAndSessions(){
        $result=$this->model->getDatesOfSessionsAndSessions($_SESSION['employee_id']);
        echo json_encode($result);
    }

    function pdfUploading(){
        
        echo json_encode(var_dump($_FILES));
        // var_dump($_FILES);
        
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/project/public/pdf/";
        
        $target_file = $target_dir . basename($_FILES['file']["name"]);
        // $_FILES["photo"]["name"]=$_SESSION['student_id'];
        // $target_file = $target_dir .$_FILES["photo"]["name"];
        $filename=$_FILES['file']['name'];
        // $_FILES['file']['tmp_name'];
        $tempName=$_FILES['file']["tmp_name"];
        $size=$_FILES['file']['size'];
        $path = pathinfo($filename);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $path_filename_ext = $target_dir.$filename;
        $result=$this->model->pdfUploading(basename($_FILES['file']["name"]));
        // $folder = dirname(dirname(dirname(__FILE__))).'public/pdf/'.$filename;
        move_uploaded_file($tempName,$target_file);
        $result=$this->model->pdfUploading(basename($_FILES['file']["name"]));

        
        // echo $target_file;
        // echo $tempName;
        // echo $result;
    }
}