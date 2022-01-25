function getExamParticipationDetails(){

    let httpreq=new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if (httpreq.readyState===4 && httpreq.status===200) {
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText);
            console.log(obj)

            

            
            
        }
    }

    let url="http://localhost/project/Report/examParticipationStudentsReportLogic"
    httpreq.open("POST",url,true)
    httpreq.send()


}
getExamParticipationDetails();