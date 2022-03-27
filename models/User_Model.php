<?php

class User_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getOTP($nic,$otpcode){
        
        $result=$this->db->runQuery("SELECT student_key.otp FROM student_key INNER JOIN student on student.student_id=student_key.student_id Where student.nic = '$nic'");
        if(empty($result)){
            $result=$this->db->runQuery("SELECT employee_key.otp FROM employee_key INNER JOIN employee on employee.employee_id=employee_key.employee_id Where employee.nic = '$nic'");
            if(empty($result)){
                return false;
            }
            else{
                if($otpcode==$result[0]['otp']){ 
                    return true;
                }else {
                    return false;
                } 
            }
            
        }
        else{
            if($otpcode==$result[0]['otp']){ 
                return true;
            }else {
                return false;
            }
        }
    }
    function setPassword($nic,$password){
        $hash_password = password_hash($password,PASSWORD_DEFAULT, array('cost' => 9));
        $res=$this->db->runQuery("SELECT student_id FROM student where NIC='$nic'");
        
        if(!empty($res)){
            $result=$this->db->runQuery("UPDATE student_private INNER JOIN student on student.student_id = student_private.student_id SET student_private.password ='$hash_password' WHERE student.nic = '$nic'");
            return 1;
        }else{
            $res=$this->db->runQuery("SELECT employee_id FROM employee where nic='$nic'");
            if(!empty($res)){
                $result=$this->db->runQuery("UPDATE employee_private INNER JOIN employee on employee.employee_id = employee_private.employee_id SET employee_private.password ='$hash_password' WHERE employee.nic = '$nic'");
                return 1;
            }else{
                return 0;
            }
            
        }
    }

    public function login($username, $password) {

        $result=$this->db->runQuery("SELECT username,nic,admin_key,passwordhash FROM admin WHERE username='$username'");
        if(!empty($result)){
            if(password_verify($password,
            $result[0]['passwordhash'] )){
                $data['job_title']="Admin";
                $data['name']=$result[0]['username'];
                $data['nic']=$result[0]['nic'];
                $data['admin_key']=$result[0]['admin_key'];
                return $data;
            }      
        }
        else{
            unset($result);
            $result=$this->db->runQuery("SELECT employee.employee_id,employee.nic,employee.job_title,employee.name,employee_private.password FROM employee INNER JOIN employee_private ON employee.employee_id=employee_private.employee_id WHERE employee.nic='$username'");
            if(!empty($result)){
                if(password_verify($password,
                $result[0]['password'] )){
                    $data['job_title']=$result[0]['job_title'];;
                    $data['name']=$result[0]['name'];
                    $data['nic']=$result[0]['nic'];
                    $data['employee_id']=$result[0]['employee_id'];
                    return $data;
                } 
                
            }
            else{
                unset($result);
                $result=$this->db->runQuery("SELECT student.nic,student.init_name,student.student_id,student_private.password FROM student INNER JOIN student_private ON student.student_id=student_private.student_id WHERE student.nic='$username' ");
                
                if(!empty($result)){
                    if(password_verify($password,
                    $result[0]['password'] )){
                        $data['job_title']="student";
                        $data['name']=$result[0]['init_name'];
                        $data['nic']=$result[0]['nic'];
                        $data['student_id']=$result[0]['student_id'];
                        return $data;
                    } 
                    
                }
                
            } 
        }
        
        
        
        
    }
    public function forgotPassword($nic, $contact){

        $result=$this->db->runQuery("SELECT nic,contact FROM admin WHERE nic='$nic' AND contact='$contact'");
        if(!empty($result)){
            $_SESSION['NIC']=$result[0]['nic'];
            $_SESSION['user']="Admin";
            return $result;
        }
        else{
            $result=$this->db->runQuery("SELECT nic,contact_no FROM employee WHERE nic='$nic' AND contact_no='$contact'");
            if(!empty($result)){
                $_SESSION['NIC']=$result[0]['nic'];
                $_SESSION['user']="employee";
                return $result;
            }
            else{
                $result=$this->db->runQuery("SELECT NIC,contact FROM student WHERE NIC='$nic' AND contact='$contact'");
                if(!empty($result)){
                    $_SESSION['NIC']=$result[0]['NIC'];
                    $_SESSION['user']="student";
                    return $result;
                }
            }
        }
        
        
        // echo "from forgot";
        
    }

    public function otp(){
        $_SESSION['otp']=rand(100000,999999);
        echo $_SESSION['otp'].",".$_SESSION['NIC']; 

        // echo "from otp";
    }

    public function compareOTP($otp){
        if($otp==$_SESSION['otp']){
            echo 'success';
        }

        // echo "from cm otp";
    }
    public function passwordReset($password){//select ekak gahala pennanna insert una kyla
        $hash_password = password_hash($password,PASSWORD_DEFAULT, array('cost' => 9));
        $nic=$_SESSION['NIC'];
        if($_SESSION['user']=="Admin"){
            $result=$this->db->runQuery("UPDATE admin SET  passwordhash='$hash_password' WHERE nic = '$nic'");
            unset($_SESSION['otp']);
            return "success";
            // echo "from otp";
        }
        else if($_SESSION['user']=="employee"){
            $result=$this->db->runQuery("UPDATE employee_private INNER JOIN employee on employee.employee_id = employee_private.employee_id SET employee_private.password ='$hash_password' WHERE employee.nic = '$nic'");
            unset($_SESSION['otp']);
            return "success";
            // echo "from otp";
        }
        else if($_SESSION['user']=="student"){
            
            $result=$this->db->runQuery("UPDATE student_private INNER JOIN student on student.student_id = student_private.student_id SET student_private.password ='$hash_password' WHERE student.NIC = '$nic'");
            unset($_SESSION['otp']);
            return "success";
            // echo "from otp";
        }
        
    }

    
}