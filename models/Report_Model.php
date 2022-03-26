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
        $result=$this->db->runQuery("SELECT * FROM sessions");
        return $result;
    }

    function loadAtStudent(){
        $result=$this->db->runQuery("SELECT * FROM sessions");
        return $result;
    }

    function loadExamParticipation(){
        $result=$this->db->runQuery("SELECT * FROM sessions");
        return $result;    
    }

}
