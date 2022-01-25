<?php

class IncomeExpenses extends Controller{

    function __construct(){
        parent:: __construct();
    }
    function index(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/income&Expenses');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
        
    function viewExpenses(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/viewExpences');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function studentExpenses(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/viewExpenses-Student');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }


    function otherExpensesview(){
        
        $result=$this->model->getOtherExpenses();
        $data=$result;
        echo json_encode($data);
    }


    function viewIncome(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/viewIncome');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function incomeGraphic(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/incomeGraphic');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function expenseGraphic(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager' || $_SESSION['job_title']=='Admin'){
                $this->view->render('IncomeExpenses/expensesGraphic');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function getStudentExpenses(){
        $result=$this->model->getStudentExpenses();
        echo json_encode($result);
    }
    function acceptExpense($studentId){
        $result=$this->model->acceptExpense($studentId);
        echo $result;
    }
    function getExpensesBoxDetails(){
        $result=$this->model->getExpensesBoxDetails();
        echo $result;
    }
    function loadGraphWeek($week){
        $result=$this->model->loadGraphWeek($week);
        echo json_encode($result);
    }
    function loadGraphMonth($month){
        $result=$this->model->loadGraphMonth($month);
        echo json_encode($result);
    }
    function loadGraphAnnual($annual){
        $result=$this->model->loadGraphAnnual($annual);
        echo json_encode($result);
    }

    function loadBoxesWeek($week){
        $result['maxTotalEx']=$this->model->getMaxWeek($week);
        $result['minTotalEx']=$this->model->getMinWeek($week);
        $result['avgEx']=$this->model->getAvgWeek($week);
        $result['NoOfPayments']=$this->model->getNoOfExpensesWeek($week);
        $result['maxNoOfPayment']=$this->model->maxCountExpensesWeek($week);
        $result['minNoOfPayment']=$this->model->minCountExpensesWeek($week);
        $result['minValDates']=$this->model->minCountElementExpensesWeek($week);
        $result['maxValDates']=$this->model->maxCountElementExpensesWeek($week);
        $result['initExpenses']=$this->model->totalInitExpensesWeek($week);
        $result['otherExpenses']=$this->model->totalOtherExpensesWeek($week);
        echo json_encode($result);
    }
    function loadBoxesMonth($month){
        $result['maxTotalEx']=$this->model->getMaxMonth($month);
        $result['minTotalEx']=$this->model->getMinMonth($month);
        $result['avgEx']=$this->model->getAvgMonth($month);
        $result['NoOfPayments']=$this->model->getNoOfExpensesMonth($month);
        $result['maxNoOfPayment']=$this->model->maxCountExpensesMonth($month);
        $result['minNoOfPayment']=$this->model->minCountExpensesMonth($month);
        $result['minValDates']=$this->model->minCountElementExpensesMonth($month);
        $result['maxValDates']=$this->model->maxCountElementExpensesMonth($month);
        $result['initExpenses']=$this->model->totalInitExpensesMonth($month);
        $result['otherExpenses']=$this->model->totalOtherExpensesMonth($month);
        echo json_encode($result);
    }

    function loadBoxesAnnual($annual){
        $result['maxTotalEx']=$this->model->getMaxAnnual($annual);
        $result['minTotalEx']=$this->model->getMinAnnual($annual);
        $result['avgEx']=$this->model->getAvgAnnual($annual);
        $result['NoOfPayments']=$this->model->getNoOfExpensesAnnual($annual);
        $result['maxNoOfPayment']=$this->model->maxCountExpensesAnnual($annual);
        $result['minNoOfPayment']=$this->model->minCountExpensesAnnual($annual);
        $result['minValDates']=$this->model->minCountElementExpensesAnnual($annual);
        $result['maxValDates']=$this->model->maxCountElementExpensesAnnual($annual);
        $result['initExpenses']=$this->model->totalInitExpensesAnnual($annual);
        $result['otherExpenses']=$this->model->totalOtherExpensesAnnual($annual);
        echo json_encode($result);
    }
    function getIncomeDetails(){
        $resultOnline=$this->model->getOnlineIncomeDetails();
        $resultCash=$this->model->getCashIncomeDetails();
        echo json_encode(array_merge($resultOnline,$resultCash));
    }

    function loadIncomeGraphWeek($week){
        $result=$this->model->loadIncomeGraphWeek($week);
        echo json_encode($result);
    }
    function loadIncomeGraphMonth($month){
        $result=$this->model->loadIncomeGraphMonth($month);
        echo json_encode($result);
    }
    function loadIncomeGraphAnnual($annual){
        $result=$this->model->loadIncomeGraphAnnual($annual);
        echo json_encode($result);
    }
    function loadIncomeBoxesWeek($week){
        $result['maxTotalIn']=$this->model->getMaxIncomeWeek($week);
        $result['minTotalIn']=$this->model->getMinIncomeWeek($week);
        $result['avgIn']=$this->model->getAvgIncomeWeek($week);
        $result['NoOfPayments']=$this->model->getNoOfIncomesWeek($week);
        $result['maxNoOfPayment']=$this->model->maxCountIncomesWeek($week);
        $result['minNoOfPayment']=$this->model->minCountIncomesWeek($week);
        $result['minValDates']=$this->model->minCountElementIncomesWeek($week);
        $result['maxValDates']=$this->model->maxCountElementIncomesWeek($week);
        $result['onlinePayments']=$this->model->totalOnlineIncomesWeek($week);
        $result['cashPayments']=$this->model->totalCashIncomesWeek($week);
        echo json_encode($result);
    }
    function loadIncomeBoxesMonth($month){
        $result['maxTotalIn']=$this->model->getMaxIncomeMonth($month);
        $result['minTotalIn']=$this->model->getMinIncomeMonth($month);
        $result['avgIn']=$this->model->getAvgIncomeMonth($month);
        $result['NoOfPayments']=$this->model->getNoOfIncomesMonth($month);
        $result['maxNoOfPayment']=$this->model->maxCountIncomesMonth($month);
        $result['minNoOfPayment']=$this->model->minCountIncomesMonth($month);
        $result['minValDates']=$this->model->minCountElementIncomesMonth($month);
        $result['maxValDates']=$this->model->maxCountElementIncomesMonth($month);
        $result['onlinePayments']=$this->model->totalOnlineIncomesMonth($month);
        $result['cashPayments']=$this->model->totalCashIncomesMonth($month);
        echo json_encode($result);
    }

    function loadIncomeBoxesAnnual($annual){
        $result['maxTotalIn']=$this->model->getMaxIncomeAnnual($annual);
        $result['minTotalIn']=$this->model->getMinIncomeAnnual($annual);
        $result['avgIn']=$this->model->getAvgIncomeAnnual($annual);
        $result['NoOfPayments']=$this->model->getNoOfIncomesAnnual($annual);
        $result['maxNoOfPayment']=$this->model->maxCountIncomesAnnual($annual);
        $result['minNoOfPayment']=$this->model->minCountIncomesAnnual($annual);
        $result['minValDates']=$this->model->minCountElementIncomesAnnual($annual);
        $result['maxValDates']=$this->model->maxCountElementIncomesAnnual($annual);
        $result['onlinePayments']=$this->model->totalOnlineIncomesAnnual($annual);
        $result['cashPayments']=$this->model->totalCashIncomesAnnual($annual);
        echo json_encode($result);
    }

}