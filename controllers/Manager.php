<?php
// session_start();

class Manager extends Controller{
    
    function __construct(){
        parent:: __construct();
    }
    function index(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/profile');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function utilityExpenses(){
        $cost=$this->model->utilityExpenses();
        echo json_encode($cost);
    }
    function addExam(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/addExam');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function addExpenses(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/addExpenses');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function addExpensesLogic($data){
        $values = explode(",", $data);

        $managerId=$_SESSION['employee_id'];
        $result=$this->model->setExpenses($values[0],$values[1],doubleval($values[2]),$managerId);
        echo "inserted";
    }
    
    function validate($password){
        // echo $password;
        $managerId=$_SESSION['employee_id'];
        $result=$this->model->checkPassword($managerId,$password);
        if($result==true){
            echo "success";
        }
    }

    function addInstructor($type,$date,$time){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $_SESSION['type']=$type;
                $_SESSION['date']=$date;
                $_SESSION['time']=$time;
                $this->view->render('Manager/addInstructor');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function addInstructorS($type,$title,$date,$time){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $_SESSION['type']=$type;
                $_SESSION['title']=$title;
                $_SESSION['date']=$date;
                $_SESSION['time']=$time;
                $this->view->render('Manager/addInstructorS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function addSession(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/addSession');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    
    function addStudent(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/addStudent');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function addStudentS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/addStudentS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function addVehicle($type,$date,$time){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $_SESSION['type']=$type;
                $_SESSION['date']=$date;
                $_SESSION['time']=$time;
                $this->view->render('Manager/addVehicle');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function addVehicleS($type,$title,$date,$time){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $_SESSION['type']=$type;
                $_SESSION['title']=$title;
                $_SESSION['date']=$date;
                $_SESSION['time']=$time;
                $this->view->render('Manager/addVehicleS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }


    function changeInstructor(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeInstructor');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }

        
    }
    function changeStudent(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeStudent');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function changeVehicle(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeVehicle');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }

    function changeInstructorS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeInstructorS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function changeStudentS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeStudentS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function changeVehicleS(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/changeVehicleS');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }
    function editExam($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                if($id!=''){
                    $_SESSION['editExamId']=$id;
                }
                $this->view->render('Manager/editExam');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function editSession($id=''){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                if($id!=''){
                    $_SESSION['editSessionId']=$id;
                }
                $this->view->render('Manager/editSession');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
        
    }

    function deleteSession(){
        $result=$this->model->deleteSession($_SESSION['editSessionId']);
    }
    function deleteExam(){
        $result=$this->model->deleteExam($_SESSION['editExamId']);
    }


    function studentList(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/studentList');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function eventCalendar(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $_SESSION['editExamId']="";
                $_SESSION['editSessionId']="";
                $_SESSION['type']="noValue";
                $_SESSION['title']="";
                $_SESSION['date']="";
                $_SESSION['time']="";
                $_SESSION['selectedInstructorList']="";
                $_SESSION['selectedVehicleList']="";
                $this->view->render('Manager/eventCalendar');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function request(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/request');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function payments(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/payments');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }
    function incomeExpenses(){
        if(isset($_SESSION['job_title'])){
            if($_SESSION['job_title']=='Manager'){
                $this->view->render('Manager/income&Expenses');
            }else if($_SESSION['job_title']=='Admin'){
                $this->view->render('Admin/income&Expenses');
            }else{
                $this->view->render('error');
            }
        }
        else{
            $this->view->render('error');
        }
    }


    function addVehiclesForSessions(){
        $result=$this->model->getVehiclesForSessions();
        echo json_encode($result);
    }

    function addInstructorsForSessions(){
        $result=$this->model->getInstructorsForSessions($_SESSION['type']);
        echo json_encode($result);
    }

    function addVehiclesForExams(){
        $result=$this->model->getVehiclesForExams();
        echo json_encode($result);
    }

    function addInstructorsForExams(){
        $result=$this->model->getInstructorsForExams();
        echo json_encode($result);
    }

    function selectedInstructorsForSessions($selectedList){
        $_SESSION['selectedInstructorList']=$selectedList;
        echo "saved";
    }
    
    function selectedVehiclesForSessions($selectedList){
        $_SESSION['selectedVehicleList']=$selectedList;
        echo "saved";
    }
    function addSessionLogic($data){
        $result=$this->model->addSession($data,$_SESSION['selectedInstructorList'],$_SESSION['selectedVehicleList'],$_SESSION['employee_id']);
        $_SESSION['type']="noValue";
        $_SESSION['title']="";
        $_SESSION['date']="";
        $_SESSION['time']="";
        $_SESSION['selectedInstructorList']="";
        $_SESSION['selectedVehicleList']="";
        echo $result;
    }

    function selectedInstructorsForExams($selectedList){
        $_SESSION['selectedInstructorList']=$selectedList;
        echo "saved";
    }
    
    function selectedVehiclesForExams($selectedList){
        $_SESSION['selectedVehicleList']=$selectedList;
        echo "saved";
    }
    function addExamLogic($data){
        $result=$this->model->addExam($data,$_SESSION['selectedInstructorList'],$_SESSION['selectedVehicleList'],$_SESSION['employee_id']);
        $_SESSION['type']="noValue";
        
        $_SESSION['date']="";
        $_SESSION['time']="";
        $_SESSION['selectedInstructorList']="";
        $_SESSION['selectedVehicleList']="";
        echo $result;
    }

    function getAvailableSessions(){
        $result=$this->model->getSessions();
        echo json_encode($result);
    }

    function getAvailableExams(){
        $result=$this->model->getExams();
        echo json_encode($result);
    }

    function getExamDetails(){
        $result=$this->model->getExamDetails($_SESSION['editExamId']);
        echo json_encode($result); 
    }
    //editExam
    function saveEditedDate($date){
        $result=$this->model->saveEditedDate($date,$_SESSION['editExamId']);
    }
    function saveEditedTime($time){
        $result=$this->model->saveEditedTime($time,$_SESSION['editExamId']);
    }
    function saveEditedType($type){
        $result=$this->model->saveEditedType($type,$_SESSION['editExamId']);
    }

    function loadPreSelectedInstructors(){
        $result=$this->model->loadPreSelectedInstructors($_SESSION['editExamId']);
        echo json_encode($result);
    }
    function loadPreSelectedVehicles(){
        $result=$this->model->loadPreSelectedVehicles($_SESSION['editExamId']);
        echo json_encode($result);
    }
    function loadUnselectedInstructors(){
        $result=$this->model->loadUnselectedInstructors();
        echo json_encode($result);
    }
    function loadUnselectedVehicles(){
        $result=$this->model->loadUnselectedVehicles();
        echo json_encode($result);
    }
    function removeInstructor($employeeId){
        $result=$this->model->removeInstructor($employeeId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function addNewInstructor($employeeId){
        $result=$this->model->addNewInstructor($_SESSION['employee_id'],$employeeId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function removeVehicles($vehicleId){
        $result=$this->model->removeVehicles($vehicleId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function addNewVehicles($vehicleId){
        $result=$this->model->addNewVehicles($_SESSION['employee_id'],$vehicleId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }

    function loadPreSelectedStudents(){
        $result=$this->model->loadPreSelectedStudents($_SESSION['editExamId']);
        echo json_encode($result);
    }
    function loadUnselectedStudents(){
        $result=$this->model->loadUnselectedStudents();
        echo json_encode($result);
    }
    function addNewStudents($studentId){
        $result=$this->model->addNewStudents($_SESSION['employee_id'],$studentId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function removeStudents($studentId){
        $result=$this->model->removeStudents($studentId,$_SESSION['editExamId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }

    //edit sesisons
    function getSessionDetails(){
        $result=$this->model->getSessionDetails($_SESSION['editSessionId']);
        echo json_encode($result); 
    }

    function saveEditedTitleS($title){
        $result=$this->model->saveEditedTitleS($title,$_SESSION['editSessionId']);
    }

    function saveEditedDateS($date){
        $result=$this->model->saveEditedDateS($date,$_SESSION['editSessionId']);
    }
    function saveEditedTimeS($time){
        $result=$this->model->saveEditedTimeS($time,$_SESSION['editSessionId']);
    }
    function saveEditedTypeS($type){
        $result=$this->model->saveEditedTypeS($type,$_SESSION['editSessionId']);
    }
    function loadPreSelectedInstructorsS(){
        $result=$this->model->loadPreSelectedInstructorsS($_SESSION['editSessionId']);
        echo json_encode($result);
    }
    function loadPreSelectedVehiclesS(){
        $result=$this->model->loadPreSelectedVehiclesS($_SESSION['editSessionId']);
        echo json_encode($result);
    }
    function loadUnselectedInstructorsS(){
        $result=$this->model->loadUnselectedInstructorsS();
        echo json_encode($result);
    }
    function loadUnselectedVehiclesS(){
        $result=$this->model->loadUnselectedVehiclesS();
        echo json_encode($result);
    }
    function removeInstructorS($employeeId){
        $result=$this->model->removeInstructorS($employeeId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function addNewInstructorS($employeeId){
        $result=$this->model->addNewInstructorS($_SESSION['employee_id'],$employeeId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function removeVehiclesS($vehicleId){
        $result=$this->model->removeVehiclesS($vehicleId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function addNewVehiclesS($vehicleId){
        $result=$this->model->addNewVehiclesS($_SESSION['employee_id'],$vehicleId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function loadPreSelectedStudentsS(){
        $result=$this->model->loadPreSelectedStudentsS($_SESSION['editSessionId']);
        echo json_encode($result);
    }
    function loadUnselectedStudentsS(){
        $result=$this->model->loadUnselectedStudentsS();
        echo json_encode($result);
    }
    function addNewStudentsS($studentId){
        $result=$this->model->addNewStudentsS($_SESSION['employee_id'],$studentId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }
    function removeStudentsS($studentId){
        $result=$this->model->removeStudentsS($studentId,$_SESSION['editSessionId']);
        if($result==true){
            echo "true";
        }else{
            echo "false";
        }
    }

    function viewSessionRequests(){
        $result=$this->model->viewSessionRequests();
        echo json_encode($result);
    }
    function viewExamRequests(){
        $result=$this->model->viewExamRequests();
        echo json_encode($result);
    }
    function viewSessionRequestsFurther($studentId,$sessionId){
        $result=$this->model->viewSessionRequestsFurther($studentId,$sessionId);
        echo json_encode($result);
    }
    function viewExamRequestsFurther($studentId,$examId){
        $result=$this->model->viewExamRequestsFurther($studentId,$examId);
        echo json_encode($result);
    }
    function acceptRequestSession($studentId,$sessionId){
        $result=$this->model->acceptRequestSession($_SESSION['employee_id'],$studentId,$sessionId);
    }
    function rejectRequestSession($studentId,$sessionId){
        $result=$this->model->rejectRequestSession($studentId,$sessionId);
    }

    function acceptRequestExam($studentId,$examId){
        $result=$this->model->acceptRequestExam($_SESSION['employee_id'],$studentId,$examId);
    }
    function rejectRequestExam($studentId,$examId){
        $result=$this->model->rejectRequestExam($studentId,$examId);
    }
}