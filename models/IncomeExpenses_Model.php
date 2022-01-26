<?php

class IncomeExpenses_Model extends Model{
    function __construct()
    {
        parent::__construct();
    } 

    function getOtherExpenses(){
        $result=$this->db->runQuery("SELECT other_expenses.oexpense_id,other_expenses.title,other_expenses.description,other_expenses.recorded_date_time,other_expenses.amount,employee.name from ((other_expenses INNER JOIN manager on manager.employee_id=other_expenses.employee_id) INNER JOIN employee on employee.employee_id=manager.employee_id)");
        return $result;
    }

    function getStudentExpenses(){
        $result=$this->db->runQuery("SELECT initial_service_expenses_submits.student_id,student.init_name,initial_service_expenses_submits.date_time,initial_service_expenses_submits.status,initial_service_expenses.amount from((student INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.student_id=student.student_id) INNER JOIN initial_service_expenses on initial_service_expenses.ischarge_id=initial_service_expenses_submits.ischarge_id) order by initial_service_expenses_submits.student_id");
        return $result;
    }
    function acceptExpense($studentId){
        $studentId=intval($studentId);
        $result=$this->db->runQuery("UPDATE initial_service_expenses_submits SET status='accepted' WHERE student_id=$studentId");
        return $studentId;
    }
    function loadGraphWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        // $startTime=$startdate.' 00:00:00';
        // $i=5;
        // $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);

        }
        return $totalAmount;
    }

    function loadGraphMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();


        for($i=0;$i<31;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return $totalAmount;
    }

    function loadGraphAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return $totalAmount;
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
    function getMaxWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);

        }
        return max($totalAmount);
    }

    function getMinWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);

        }
        return min($totalAmount);
    }

    function getAvgWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);

        }
        return array_sum($totalAmount)/7;
    }

    function getNoOfExpensesWeek($week){
        $startDate=date('Y-m-d',strtotime($week));
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $weekAmount=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        $studentAmount=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");
        $totalAmount=0;
        $totalAmount=intval($weekAmount[0]['totalCount'])+intval($studentAmount[0]['totalCount']);
        return $totalAmount;
    }

    function maxCountExpensesWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return max($totalAmount);
    }


    function minCountElementExpensesWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $minval= min($totalAmount);
        $minvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$minval){
                array_push($minvalArr,($i+1));
            }
        }
        return $minvalArr;
    }

    function maxCountElementExpensesWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $maxval= max($totalAmount);
        $maxvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$maxval){
                array_push($maxvalArr,($i+1));
            }
        }
        return $maxvalArr;
    }

    function minCountExpensesWeek($week){
        $startdate=date('Y-m-d',strtotime($week));
        $weekAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<7;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $weekAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time < '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($weekAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return min($totalAmount);
    }

    function totalInitExpensesWeek($week){
        $startDate=date('Y-m-d',strtotime($week));
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $studentAmount=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");
        
        return intval($studentAmount[0]['total']);

    }

    function totalOtherExpensesWeek($week){
        $startDate=date('Y-m-d',strtotime($week));
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 7 .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $weekAmount=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        return intval($weekAmount[0]['total']);

    }

    function getMaxMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return max($totalAmount);
    }

    function getMinMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return min($totalAmount);
    }
    function getAvgMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        return array_sum($totalAmount)/$divisor;
    }
    function getNoOfExpensesMonth($month){
        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        $startDate=$month.'-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. $divisor .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $monthAmount=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        $studentAmount=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");
        $totalAmount=0;
        $totalAmount=intval($monthAmount[0]['totalCount'])+intval($studentAmount[0]['totalCount']);
        return $totalAmount;
    }
    function  maxCountExpensesMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }

        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return max($totalAmount);
    }
    function minCountExpensesMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }

        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return min($totalAmount);
    }

    function minCountElementExpensesMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $minval= min($totalAmount);
        $minvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$minval){
                array_push($minvalArr,($i+1));
            }
        }
        return $minvalArr;

    }

    function maxCountElementExpensesMonth($month){
        $startdate=$month.'-01';
        $monthAmount=array();
        $totalAmount=array();
        $studentAmount=array();

        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        for($i=0;$i<$divisor;$i++){
            $date=date('Y-m-d', strtotime($startdate. ' + '. $i .' days'));
            $startTime=$date.' 00:00:00';
            $endTime=$date.' 11:59:59';

            $monthAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startTime' and recorded_date_time <= '$endTime'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startTime' and initial_service_expenses_submits.date_time <='$endTime' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($monthAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $maxval= max($totalAmount);
        $maxvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$maxval){
                array_push($maxvalArr,($i+1));
            }
        }
        return $maxvalArr;

    }

    function totalInitExpensesMonth($month){
        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        $startDate=$month.'-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. $divisor .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $studentAmount=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");
        
        return intval($studentAmount[0]['total']);
    }

    function totalOtherExpensesMonth($month){
        $parts=explode("-",$month);
        if($parts[1]=="01" || $parts[1]=="03" || $parts[1]=="05" || $parts[1]=="07" || $parts[1]=="08" || $parts[1]=="10" || $parts[1]=="12"){
            $divisor=31;
        }else if($parts[1]=="04" || $parts[1]=="06" || $parts[1]=="09" || $parts[1]=="11"){
            $divisor=30;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==true){
            $divisor=29;
        }else if($parts[1]=="02" && isLeapYear($parts[0])==false){
            $divisor=28;
        }
        $startDate=$month.'-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. $divisor .' days'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $monthAmount=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        
        return intval($monthAmount[0]['total']);
    }

    function getMaxAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return max($totalAmount);
    }
    function getMinAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return min($totalAmount);
    }
    function getAvgAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['total'])+intval($studentAmount[$i][0]['total']);
        }
        return array_sum($totalAmount)/12;
    }
    function getNoOfExpensesAnnual($annual){
        $startDate=$annual.'-01-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $weekAmount=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        $studentAmount=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");
        $totalAmount=0;
        $totalAmount=intval($weekAmount[0]['totalCount'])+intval($studentAmount[0]['totalCount']);
        return $totalAmount;
    }
    function maxCountExpensesAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return max($totalAmount);
    }
    function minCountExpensesAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        return min($totalAmount);
    }
    function minCountElementExpensesAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <='$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $minval= min($totalAmount);
        $minvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$minval){
                array_push($minvalArr,($i+1));
            }
        }
        return $minvalArr;
    }
    function maxCountElementExpensesAnnual($annual){
        $startdate=$annual.'-01-01';
        $annualAmount=array();
        $totalAmount=array();
        $studentAmount=array();
        for($i=0;$i<12;$i++){
            $startDate=date('Y-m-d', strtotime($startdate. ' + '. $i .' months'));
            $endDate=date('Y-m-d', strtotime($startdate. ' + '. ($i+1) .' months'));
            $startDate=$startDate.' 00:00:00';
            $endDate=$endDate.' 00:00:00';

            $annualAmount[$i]=$this->db->runQuery("SELECT count(amount) as totalCount from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");        
            $studentAmount[$i]=$this->db->runQuery("SELECT count(initial_service_expenses.amount) as totalCount from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");

            $totalAmount[$i]=0;
            $totalAmount[$i]=intval($annualAmount[$i][0]['totalCount'])+intval($studentAmount[$i][0]['totalCount']);
        }
        $maxval= max($totalAmount);
        $maxvalArr=array();
        for($i=0;$i<count($totalAmount);$i++){
            if($totalAmount[$i]==$maxval){
                array_push($maxvalArr,($i+1));
            }
        }
        return $maxvalArr;
    }
    function totalInitExpensesAnnual($annual){
        $startDate=$annual.'-01-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $studentAmount=$this->db->runQuery("SELECT sum(initial_service_expenses.amount) as total from initial_service_expenses INNER JOIN initial_service_expenses_submits on initial_service_expenses_submits.ischarge_id=initial_service_expenses.ischarge_id WHERE initial_service_expenses_submits.date_time>='$startDate' and initial_service_expenses_submits.date_time <'$endDate' and initial_service_expenses_submits.status='Accepted'");
        
        return intval($studentAmount[0]['total']);
    }

    function totalOtherExpensesAnnual($annual){
        $startDate=$annual.'-01-01';
        $endDate=date('Y-m-d', strtotime($startDate. ' + '. 12 .' months'));
        $startDate=$startDate.' 00:00:00';
        $endDate=$endDate.' 00:00:00';
        $annualAmount=$this->db->runQuery("SELECT sum(amount) as total from other_expenses where recorded_date_time>='$startDate' and recorded_date_time < '$endDate'");
        return intval($annualAmount[0]['total']);
    }
}