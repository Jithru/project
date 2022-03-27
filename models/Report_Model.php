<?php

class Report_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function examPArticipationStudent(){
        $result=$this->db->runQuery("SELECT student.student_id, student.init_name ,student.student_status,exams.exam_type,SUM(IF(exams.exam_type='Theory',1,0)) AS attemptTheory, SUM(IF(exams.exam_type='Practical',1,0)) AS attemptPractical FROM student INNER JOIN exam_participation ON exam_participation.student_id=student.student_id INNER JOIN exams ON exams.exam_id =exam_participation.exam_id GROUP BY student.student_id");
        return $result;
        
    }
    
    
    
    function loadAtSession($method,$period){
        if($method=="Annualy"){
            $startDate=$period.'-01-01';
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));
            $result[0]=$this->db->runQuery("SELECT sessions.session_id,sessions.session_title,sessions.session_date,sessions.session_time FROM sessions WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate'");
            $result[1]=$this->db->runQuery("SELECT COUNT(session_student_assigns.student_id) AS assignSTcount,sessions.session_id FROM session_student_assigns INNER JOIN sessions ON sessions.session_id =session_student_assigns.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            $result[2]=$this->db->runQuery("SELECT COUNT(session_participation.student_id) AS partSTcount,sessions.session_id FROM session_participation INNER JOIN sessions ON sessions.session_id =session_participation.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            return $result;
        }
        else if($method=="Weekly"){
            $startDate=date('Y-m-d',strtotime($period));
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
            $result[0]=$this->db->runQuery("SELECT sessions.session_id,sessions.session_title,sessions.session_date,sessions.session_time FROM sessions WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate'");
            $result[1]=$this->db->runQuery("SELECT COUNT(session_student_assigns.student_id) AS assignSTcount,sessions.session_id FROM session_student_assigns INNER JOIN sessions ON sessions.session_id =session_student_assigns.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            $result[2]=$this->db->runQuery("SELECT COUNT(session_participation.student_id) AS partSTcount,sessions.session_id FROM session_participation INNER JOIN sessions ON sessions.session_id =session_participation.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            return $result;
        }
        
        
        
        else if($method=="Monthly"){
            $parts=explode("-",$period);
            if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
                $divisor=31;
            }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
                $divisor=30;
            }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
                $divisor=29;
            }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
                $divisor=28;
            }
            $startDate=$period.'-01';
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. $divisor .' days'));

            $result[0]=$this->db->runQuery("SELECT sessions.session_id,sessions.session_title,sessions.session_date,sessions.session_time FROM sessions WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate'");
            $result[1]=$this->db->runQuery("SELECT COUNT(session_student_assigns.student_id) AS assignSTcount,sessions.session_id FROM session_student_assigns INNER JOIN sessions ON sessions.session_id =session_student_assigns.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            $result[2]=$this->db->runQuery("SELECT COUNT(session_participation.student_id) AS partSTcount,sessions.session_id FROM session_participation INNER JOIN sessions ON sessions.session_id =session_participation.session_id WHERE sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_id");
            return $result;
        }
        else{
            $result[0]=$this->db->runQuery("SELECT session_id,session_title,session_date,session_time FROM sessions");
            $result[1]=$this->db->runQuery("SELECT COUNT(session_student_assigns.student_id) AS assignSTcount,sessions.session_id FROM session_student_assigns INNER JOIN sessions ON sessions.session_id =session_student_assigns.session_id  GROUP BY sessions.session_id");
            $result[2]=$this->db->runQuery("SELECT COUNT(session_participation.student_id) AS partSTcount,sessions.session_id FROM session_participation INNER JOIN sessions ON sessions.session_id =session_participation.session_id GROUP BY sessions.session_id");
            return $result;
        }
        
        
    }

    
    
    
    function loadAtStudent($method,$period){
        if($method=="Annualy"){
            $startDate=$period.'-01-01';
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));
            $result=$this->db->runQuery("SELECT student.student_id,student.init_name,student.student_status,count(session_student_assigns.student_id) AS total_assigns from ((student INNER join session_student_assigns on session_student_assigns.student_id=student.student_id)INNER JOIN sessions on sessions.session_id=session_student_assigns.session_id) where sessions.session_date>='2021-01-01' and sessions.session_date< '2022-01-01' and student.student_id='17'");
            return $result;
        }
        else if($method=="Weekly"){
            $startDate=date('Y-m-d',strtotime($period));
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
            $result=$this->db->runQuery("SELECT student.student_id,student.init_name,student.student_status,count(session_student_assigns.student_id) AS total_assigns from ((student INNER join session_student_assigns on session_student_assigns.student_id=student.student_id)INNER JOIN sessions on sessions.session_id=session_student_assigns.session_id) where sessions.session_date>='2021-01-01' and sessions.session_date< '2022-01-01' and student.student_id='17'");
            return $result;
        }
        
        
        
        else if($method=="Monthly"){
            $parts=explode("-",$period);
            if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
                $divisor=31;
            }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
                $divisor=30;
            }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
                $divisor=29;
            }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
                $divisor=28;
            }
            $startDate=$period.'-01';
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. $divisor .' days'));

            $result=$this->db->runQuery("SELECT student.student_id,student.init_name,student.student_status,count(session_student_assigns.student_id) AS total_assigns from ((student INNER join session_student_assigns on session_student_assigns.student_id=student.student_id)INNER JOIN sessions on sessions.session_id=session_student_assigns.session_id) where sessions.session_date>='2021-01-01' and sessions.session_date< '2022-01-01' and student.student_id='17'");
            return $result;
        }
        else{
            $result[0]=$this->db->runQuery("SELECT count(session_student_assigns.student_id) AS total_assigns,student.student_id,student.init_name,student.student_status FROM ((((session_student_assigns RIGHT OUTER JOIN student on student.student_id=session_student_assigns.student_id) LEFT JOIN package_assigning on package_assigning.student_id=student.student_id) LEFT JOIN packages on packages.package_id=package_assigning.package_id) Left join session_participation on session_participation.student_id=student.student_id) GROUP BY student.student_id,student.init_name");
            
            for($i=0;$i<sizeof($result[0]);$i++){
                $id=$result[0][$i]['student_id'];
                $result[1][$i]=$this->db->runQuery("SELECT COUNT(session_participation.student_id) AS part FROM session_participation WHERE student_id='$id' AND status='present'");
            }
            return $result;
        }
    } 

    function isLeapYear($year){
        if($year%400==0){
            return true;
        }if($year%100==0){
            return false;
        }if($year%4==0){
            return true;
        }
        return false;
    }

}
