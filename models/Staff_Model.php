<?php

class Staff_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getOTP($nic,$otpcode){
        
        $result=$this->db->runQuery("SELECT employee_key.otp FROM employee_key INNER JOIN employee on employee.employee_id=employee_key.employee_id Where employee.nic = '$nic'");
        if(empty($result)){
            return false;
        }
        if($otpcode==$result[0]['otp']){
            return true;
        }else {
            return false;
        }
    }
    function setPassword($nic,$password){
        
        $result=$this->db->runQuery("UPDATE employee_private INNER JOIN employee on employee.employee_id = employee_private.employee_id SET employee_private.password ='$password' WHERE employee.nic = '$nic'");
        return 1;
    }
    public function login($username, $password) {
        $result=$this->db->runQuery("SELECT employee.employee_id,employee.nic,employee.job_title,employee.name FROM employee INNER JOIN employee_private ON employee.employee_id=employee_private.employee_id WHERE employee.nic='$username' AND employee_private.password='$password'");
        // $result=$this->db->runQuery("SELECT nic,job_title FROM employee WHERE name='$username'");
        if(!empty($result)){
            return $result;
        }  
    }
    public function forgotPassword($nic, $contact){
        $result=$this->db->runQuery("SELECT nic,contact_no FROM employee WHERE nic='$nic' AND contact_no='$contact'");
        // echo $result[0]['nic']."SDJKFNVJKDSNFVKJNDKJNVNJDVFKNJDKFVN";
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
        $result=$this->db->runQuery("UPDATE employee_private INNER JOIN employee on employee.employee_id = employee_private.employee_id SET employee_private.password ='$password' WHERE employee.nic = '$nic'");
        unset($_SESSION['otp']);
        return "success";
    }
    
}