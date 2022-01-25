<?php

class Report extends Controller{

    function __construct(){
        parent:: __construct();
    }

    function report(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                if($_SESSION['job_title']=='Admin'){
                    $this->view->render('Admin/reports');
                }
                else if($_SESSION['job_title']=='Manager'){
                    $this->view->render('Manager/reports');
                }
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function attendence_sessions(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/attendence_sessions');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function conductorGraphic(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/conductorGraphic');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function customerGraphic(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/customerGraphic');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function exam_participation(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/exam_participation');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    

    function sessionGraph(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/sessionGraph');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    //newly add
    function attendanceSession(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/attendanceSession');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function attendanceStudent(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/attendanceStudent');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function ConductorParticipation(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/ConductorParticipation');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function customerGrowing(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/customerGrowing');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function examParticipationDays(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/examParticipationDays');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function examParticipationStudents(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/examParticipationStudents');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    // Report

    function examParticipationStudentsReportLogic(){
        $value=$this->model->examPArticipationStudent();
        echo json_encode($value);

    }

    function sessionReport(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Admin'||$_SESSION['job_title']=='Manager'){
                $this->view->render('Report/sessionReport');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
}

