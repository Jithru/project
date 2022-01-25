function editExamLoad(){
    console.log("hi")
    console.log(document.getElementById("idContainer").value)
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("dateContainer").value=obj[0].exam_date
            document.getElementById("timeContainer").value=obj[0].exam_time
            document.getElementById("type").value=obj[0].exam_type
            document.getElementById("type").disabled=true
            document.getElementById("dateContainer").disabled=true
            document.getElementById("timeContainer").disabled=true
        }
    }
    let url="http://localhost/project/Manager/getExamDetails"
    httpreq.open("POST",url,true)
    httpreq.send()
}
editExamLoad()
var time=""
var date=""
var type=""
function changeDate(){
    date=document.getElementById("dateContainer").value
    document.getElementById("dateContainer").disabled=false
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("dateSaveCancel").style.display='flex'
}

function changeTime(){
    time=document.getElementById("timeContainer").value
    document.getElementById("timeContainer").disabled=false
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("timeSaveCancel").style.display='flex'
}

function changeType(){
    type=document.getElementById("type").value
    document.getElementById("type").disabled=false
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("typeSaveCancel").style.display='flex'
}

function cancelTime(){
    document.getElementById("timeContainer").value=time
    document.getElementById("timeContainer").disabled=true
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("timeSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function cancelDate(){
    document.getElementById("dateContainer").value=date
    document.getElementById("dateContainer").disabled=true
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("dateSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function cancelType(){
    document.getElementById("type").value=type
    document.getElementById("type").disabled=true
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("typeSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function saveTime(){
    var newDate=document.getElementById("dateContainer").value
    var newTime=document.getElementById("timeContainer").value
    var today=new Date();
        if(today.getDate()<10){
            var dateval="0"+today.getDate()
        }
        else{
            var dateval=today.getDate()
        }
        var day=today.getFullYear()+"-"+(today.getMonth()+1)+"-"+dateval
        var todaytime=today.getHours()+":"+today.getMinutes()

        if(day>newDate){
            document.getElementById("msg").innerHTML="The time you have selected was past"
            document.getElementById("box").classList.replace("box","box-active")
        }
        else if(day==newDate){
            if(newTime<todaytime){
                document.getElementById("msg").innerHTML="The time you have selected was past"
                document.getElementById("box").classList.replace("box","box-active")
            }
        }
        else{
            let httpreq=new XMLHttpRequest()
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    
                }
            }
            let url="http://localhost/project/Manager/saveEditedTime/"+newTime
            httpreq.open("POST",url,true)
            httpreq.send()
            document.getElementById("timeContainer").value=newTime
            document.getElementById("timeContainer").disabled=true
            document.getElementById("editDate").style.visibility='visible'
            document.getElementById("editType").style.visibility='visible'
            document.getElementById("editTime").style.visibility='visible'
            document.getElementById("timeSaveCancel").style.display='none'

        }
}

function saveDate(){
    var newDate=document.getElementById("dateContainer").value
    var today=new Date();
        if(today.getDate()<10){
            var dateval="0"+today.getDate()
        }
        else{
            var dateval=today.getDate()
        }
    var day=today.getFullYear()+"-"+(today.getMonth()+1)+"-"+dateval
    if(day>newDate){
        document.getElementById("msg").innerHTML="The date you have selected was past"
        document.getElementById("box").classList.replace("box","box-active")
    }else{
        let httpreq=new XMLHttpRequest()
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState===4 && httpreq.status===200){

            }
        }
        let url="http://localhost/project/Manager/saveEditedDate/"+newDate
        httpreq.open("POST",url,true)
        httpreq.send()
        document.getElementById("dateContainer").value=newDate
        document.getElementById("dateContainer").disabled=true
        document.getElementById("editDate").style.visibility='visible'
        document.getElementById("editType").style.visibility='visible'
        document.getElementById("editTime").style.visibility='visible'
        document.getElementById("dateSaveCancel").style.display='none'
    }    
}

function saveType(){
    var type=document.getElementById("type").value
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){

        }
    }
    let url="http://localhost/project/Manager/saveEditedType/"+type
    httpreq.open("POST",url,true)
    httpreq.send()
    document.getElementById("type").value=type
    document.getElementById("type").disabled=true
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("typeSaveCancel").style.display='none'

}
function changeInstructorLoad(){
    // var id=document.getElementById("idContainer").value
    window.location.href="http://localhost/project/Manager/changeInstructor/"
}
function changeVehicleLoad(){
    window.location.href="http://localhost/project/Manager/changeVehicle/"

}
function changeStudentLoad(){
    window.location.href="http://localhost/project/Manager/changeStudent/"
}

function deleteExam(){
    document.getElementById("confirmation").classList.replace("confirmation-box","confirmation-box-active")
    document.getElementById("cancel").addEventListener('click',function(){
        document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box")
    });
    document.getElementById("confirm").addEventListener('click',function(){
        let httpreq=new XMLHttpRequest()
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState===4 && httpreq.status===200){
                window.location.href="http://localhost/project/Manager/eventCalendar/"
            }
        }
        let url="http://localhost/project/Manager/deleteExam"
        httpreq.open("POST",url,true)
        httpreq.send()
        document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box")
    });
}