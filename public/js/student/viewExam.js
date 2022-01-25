function viewExamLoad(){
    console.log("hi")
    console.log(document.getElementById("idContainer").value)
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("idContainer").innerHTML="Ex_"+obj[0].exam_id
            document.getElementById("dateContainer").innerHTML=obj[0].exam_date
            document.getElementById("timeContainer").innerHTML=obj[0].exam_time
            document.getElementById("typeContainer").innerHTML=obj[0].exam_type
        }
    }
    let url="http://localhost/project/Student/getExamDetails"
    httpreq.open("POST",url,true)
    httpreq.send()
}
viewExamLoad()

function viewInstructor(){
    // var id=document.getElementById("idContainer").value
    window.location.href="http://localhost/project/Student/viewInstructor/"
}
function viewVehicle(){
    window.location.href="http://localhost/project/Student/viewVehicle/"

}
function viewStudents(){
    window.location.href="http://localhost/project/Student/viewStudent/"
}
function sendRequestsforExam(){
    console.log("hi")
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
        }
    }
    let url="http://localhost/project/Student/requestForExam/"
    httpreq.open("POST",url,true)
    httpreq.send()
}