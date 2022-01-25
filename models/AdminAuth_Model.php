<?php

class AdminAuth_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password) {
        $result=$this->db->runQuery("SELECT username FROM admin WHERE username='$username' AND passwordhash='$password'");
        if(!empty($result)){
            return $result;
        }  
    }

    public function forgotPassword($nic, $contact){
        $result=$this->db->runQuery("SELECT nic,contact FROM admin WHERE nic='$nic' AND contact='$contact'");
        $_SESSION['Nic']=$result[0]['nic'];
        if(!empty($result)){
            return $result;
        }
        
    }

    public function otp(){
        $_SESSION['otp']=rand(100000,999999);
        echo $_SESSION['otp'].",".$_SESSION['Nic']; 
    }

    public function compareOTP($otp){
        if($otp==$_SESSION['otp']){
            echo 'success';
        }
    }
    public function passwordReset($password){
        $nic=$_SESSION['Nic'];
        $result=$this->db->runQuery("UPDATE admin SET  passwordhash='$password' WHERE nic = '$nic'");
        unset($_SESSION['otp']);
        return "success";
    }
    


} 