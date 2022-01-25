<?php
class AdminAuth extends Controller{
    function __construct(){
        parent:: __construct();
    }
    function index(){
        $this->view->render('adminLogin');
    }
    public function login($data){
        
        $user = explode(",", $data);
        $loginData = $this->model->login($user[0], $user[1]);
        if($loginData){
            // $_SESSION['userType'] = "Admin";
            $this->startSession($loginData);
        }   
    }

    public function startSession($loginData){
        $_SESSION['username'] = $loginData[0]['username'];
        $_SESSION['job_title'] = "Admin";
        echo "success,";    
    }
    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['job_title']);
        session_destroy();
        redirect('AdminAuth');
    }
    public function isLoggedIn(){
        if(isset($_SESSION['username'])){
            return true;
        } else {
            return false;
        }
    }

    public function forgotPassword(){
        $this->view->render('Admin/forgotPassword');
    }

    public function passwordReset(){
        if(isset($_SESSION['otp'])){
            $this->view->render('Admin/passwordReset');
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