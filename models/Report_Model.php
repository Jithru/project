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

    function loadAtSession(){
        $result[0]=$this->db->runQuery("SELECT * FROM sessions");
        // return $result[0][4]['session_id'];
        $assignCount=0;
        $participationCount=0;
        for($i=0;sizeof($result[0]);$i++){
            $result[1][$i]['assignCount']=$this->db->runQuery("SELECT COUNT(student_id) AS assignCount FROM session_student_assigns WHERE session_id='$result[0][4]['session_id']'");
        }

        return $result;
    }

}
