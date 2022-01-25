<?php
class User extends Controller{
    function __construct(){
        parent:: __construct();
    }
    function index(){
        if(isset($_SESSION['job_title'])){

            if($_SESSION['job_title']=='student'){
                // $this->view->render('Conductor/profile');
                redirect('Student');
            }

            else if($_SESSION['job_title']=='Receptionist'){
                redirect('Receptionist');
            }
            
            
            else if($_SESSION['job_title']=='Instructor'){
                redirect('Instructor');
            }

            else if($_SESSION['job_title']=='Manager'){
                redirect('Manager');
            }

            else if($_SESSION['job_title']=='Admin'){
                redirect('Admin');
            }
            
            else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function signup(){
        $this->view->render('studentSignup');
        
    }
    public function loginPage(){
        $this->view->render('studentLogin');
    }

    function signupLogic($data){
        $values = explode(",", $data);
        $result= $this->model->getOTP($values[0],$values[1]);

        echo $result;
        if($result==true){
            $_SESSION['nic']=$values[0];
        }
    }
    function signupPassword(){
        $this->view->render('studentSignupPassword'); 
    }
    function signupPasswordLogic($data){
        $values = explode(",", $data);
        if($values[0]==$values[1]){
            $this->model->setPassword($_SESSION['nic'],$values[0]);
            echo "completed";
        }
    }

    public function login($data){
        
        $user = explode(",", $data);
        $loginData = $this->model->login($user[0], $user[1]);
        if(isset($loginData['nic'])){
            $this->startSession($loginData);
        }   
    }

    
    public function startSession($loginData){
        $_SESSION['nic'] = $loginData['nic'];
        $_SESSION['job_title'] = $loginData['job_title'];
        $_SESSION['name'] = str_replace("-", " ", $loginData['name']);
        if(isset($loginData['employee_id'])){
            $_SESSION['employee_id'] = $loginData['employee_id'];
        }
        if(isset($loginData['student_id'])){
            $_SESSION['student_id'] = $loginData['student_id'];
        }
        if(isset($loginData['admin_key'])){
            $_SESSION['admin_key'] = $loginData['admin_key'];
        }
        
        echo "success,";    
    }
    public function logout(){
        unset($_SESSION['nic']);
        unset($_SESSION['job_title']);
        unset($_SESSION['name']);
        if(isset($loginData['employee_id'])){
            unset($_SESSION['employee_id']);
        }
        if(isset($loginData['student_id'])){
            unset($_SESSION['student_id']);
        }
        if(isset($loginData['admin_key'])){
            unset($_SESSION['admin_key']);
        }
        session_destroy();
        redirect('/');
    }
    public function isLoggedIn(){
        if(isset($_SESSION['nic'])){
            return true;
        } else {
            return false;
        }
    }

    public function forgotPassword(){
        $this->view->render('common/forgotPassword');
    }

    public function forgotPasswordOTP(){
        $this->view->render('common/forgotPasswordOTP');
    }

    public function passwordReset(){
        if(isset($_SESSION['otp'])){
            $this->view->render('common/passwordReset');
        }
        else{
            $this->view->render('error');
        }
        
    }

    public function forgotPasswordLogic($data){ 
        $user = explode(",", $data);
        $results=$this->model->forgotPassword($user[0],$user[1]);
        if($results){
            $this->sendOtp();
        } 
        // echo "success";
    }

    public function sendOtp(){
        
        echo 'success,';
        $this->model->otp();
    }
    public function compareOTP($data){
        // echo "klkl";
        $otp = explode(",", $data);
        $this->model->compareOTP($otp[0]);
    }

    public function passwordResetLogic($data){
        
        $password = explode(",", $data);
        $reset=$this->model->passwordReset($password[0]);
        echo $reset;
    }


}