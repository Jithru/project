var today=new Date();
var date = today.getFullYear()+' - '+(today.getMonth()+1)+' - '+today.getDate();
document.getElementById("todayDate").innerHTML='Today is : '+date

let httpreq1=new XMLHttpRequest()
httpreq1.onreadystatechange=function(){
    if(httpreq1.readyState===4 && httpreq1.status===200){
        console.log(httpreq1.responseText)
        const obj=JSON.parse(httpreq1.responseText)
        var sessionIdSet=document.getElementById("sessionIdContainer")
        for(var i=0;i<obj.length;i++){
            sessionIdSet.innerHTML+='<button class="sessionLinkButton" id='+obj[i].session_id+' onclick=loadStudents('+obj[i].session_id+')>'+obj[i].session_time+'</button>'
        }
    }
}
let url1="http://localhost/project/Instructor/loadAllSessionsForToday/"
httpreq1.open("POST",url1,true)
httpreq1.send()


function loadStudents(sessionId){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            let rows=document.getElementById("tableRows")
            rows.innerHTML=""
            for(var i=0;i<obj.length;i++){
                if(obj[i].status=='present'){
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">Image</div>'+
                            '<div class="three">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="four">'+obj[i].contact+'</div>'+
                        '</div>'+
                        '<div class="Attendance-Button-set" id="attendanceButton_'+obj[i].student_id+'_'+sessionId+'">'+
                            'Present'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
                else if(obj[i].status=='absent'){
                    rows.innerHTML+='<div class="row">'+
                        '<div class="cell">'+
                            '<div class="information">'+
                                '<div class="one">Image</div>'+
                                '<div class="three">ST_'+obj[i].student_id+'</div>'+
                                '<div class="two">'+obj[i].init_name+'</div>'+
                                '<div class="four">'+obj[i].contact+'</div>'+
                            '</div>'+
                            '<div class="Attendance-Button-set" id="attendanceButton_'+obj[i].student_id+'_'+sessionId+'">'+
                                'Absent'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                }else{
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">Image</div>'+
                            '<div class="three">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="four">'+obj[i].contact+'</div>'+
                        '</div>'+
                        '<div class="Attendance-Button-set" id="attendanceButton_'+obj[i].student_id+'_'+sessionId+'">'+
                            '<button class="present" id="present_'+sessionId+'_'+obj[i].student_id+'" onclick=setPresent('+sessionId+','+obj[i].student_id+')>Present</button>'+
                            '<button class="absent" id="absent_'+sessionId+'_'+obj[i].student_id+'" onclick=setAbsent('+sessionId+','+obj[i].student_id+')>Absent</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
                
            }

        }
    }
    let url2="http://localhost/project/Instructor/loadStudentsForSession/"+sessionId
    httpreq2.open("POST",url2,true)
    httpreq2.send()
}

function setAbsent(sessionId,studentId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            var attendanceButton="attendanceButton_"+studentId+'_'+sessionId
            document.getElementById(attendanceButton).innerHTML="Absent"
            // console.log(httpreq.responseText)
            
        }
    }
    let url="http://localhost/project/Instructor/setAbsent/"+sessionId+"/"+studentId
    httpreq.open("POST",url,true)
    httpreq.send()
}
function setPresent(sessionId,studentId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            var attendanceButton="attendanceButton_"+studentId+'_'+sessionId
            document.getElementById(attendanceButton).innerHTML="Present"
            console.log(httpreq.responseText)
        }
    }
    let url="http://localhost/project/Instructor/setPresent/"+sessionId+"/"+studentId
    httpreq.open("POST",url,true)
    httpreq.send()
}
