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
            $result=$this->db->runQuery("SELECT * FROM sessions");
            return $result;
        }
        else if($method=="Weekly"){
            $startDate=date('Y-m-d',strtotime($period));
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
            $result=$this->db->runQuery("SELECT * FROM sessions");
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

            $result=$this->db->runQuery("SELECT * FROM sessions");
            return $result;
        }
        else{
            $result=$this->db->runQuery("SELECT * FROM sessions");
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

    //edit
    function reportSession($method,$period){
        if($method=="Annualy"){
            $startDate=$period.'-01-01';
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));

            $result[0]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS theory FROM sessions WHERE sessions.type='Theory' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[1]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_theory FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[2]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS practical FROM sessions WHERE sessions.type='Practical' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[3]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_prac  FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            
            return $result;
        }
        else if($method=="Weekly"){
            $startDate=date('Y-m-d',strtotime($period));
            $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));

            $result[0]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS theory FROM sessions WHERE sessions.type='Theory' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[1]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_theory FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[2]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS practical FROM sessions WHERE sessions.type='Practical' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[3]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_prac  FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            
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

            $result[0]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS theory FROM sessions WHERE sessions.type='Theory' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[1]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_theory FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[2]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS practical FROM sessions WHERE sessions.type='Practical' sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            $result[3]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_prac  FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 sessions.session_date>='$startDate' and sessions.session_date <= '$endDate' GROUP BY sessions.session_date");
            
            return $result;
        }
        else{
            // $result[0]=$this->db->runQuery("SELECT session_date FROM sessions WHERE sessions");
            $result[0]=$this->db->runQuery("SELECT sessions. session_date, COUNT(sessions.session_id) AS theory FROM sessions WHERE sessions.type='Theory' GROUP BY sessions.session_date");
            // $result[1]=$this->db->runQuery("SELECT COUNT(type) AS theory FROM sessions WHERE sessions.type='Theory' GROUP BY sessions.session_date");
            $result[1]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_theory FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 GROUP BY sessions.session_date");
            // $result[2]=$this->db->runQuery("SELECT COUNT(held_or_not) AS held_theory FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1");
            $result[2]=$this->db->runQuery("SELECT sessions.session_date, COUNT(sessions.session_id) AS practical FROM sessions WHERE sessions.type='Practical' GROUP BY sessions.session_date");
            // $result[3]=$this->db->runQuery("SELECT COUNT(type) AS practical FROM sessions WHERE sessions.type='Practical'");
            $result[3]=$this->db->runQuery("SELECT sessions.session_date, COUNT(held_or_not) AS held_prac  FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1 GROUP BY sessions.session_date");
            // $result[4]=$this->db->runQuery("SELECT COUNT(held_or_not) AS held_prac  FROM session_status INNER JOIN sessions ON sessions.session_id=session_status.session_id WHERE held_or_not=1");
            return $result;
        }
    }

}
