function viewSession(){
    console.log("hi")
    
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            obj[0].session_title = obj[0].session_title.replace(/-/g, " ");
            document.getElementById("idContainer").innerHTML="SE_"+obj[0].session_id
            document.getElementById("titleContainer").innerHTML=obj[0].session_title
            document.getElementById("dateContainer").innerHTML=obj[0].session_date
            document.getElementById("timeContainer").innerHTML=obj[0].session_time
            document.getElementById("typeContainer").innerHTML=obj[0].type
        }
    }
    let url="http://localhost/project/Instructor/getSessionDetails"
    httpreq.open("POST",url,true)
    httpreq.send()
}
viewSession()

function viewInstructor(){
    // var id=document.getElementById("idContainer").value
    window.location.href="http://localhost/project/Instructor/viewInstructorS/"
}
function viewVehicle(){
    window.location.href="http://localhost/project/Instructor/viewVehicleS/"

}
function viewStudents(){
    window.location.href="http://localhost/project/Instructor/viewStudentS/"
}