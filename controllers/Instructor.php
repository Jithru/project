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

    function markGoingNotGoingLogic(){
        
        $value=$this->model->getTodaySession();
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
}