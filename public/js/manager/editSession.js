function editSessionLoad(){
    console.log("hi")
    console.log(document.getElementById("idContainer").value)
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            obj[0].session_title = obj[0].session_title.replace(/-/g, " ");
            document.getElementById("titleContainer").value=obj[0].session_title
            document.getElementById("dateContainer").value=obj[0].session_date
            document.getElementById("timeContainer").value=obj[0].session_time
            document.getElementById("type").value=obj[0].type
            document.getElementById("titleContainer").disabled=true
            document.getElementById("type").disabled=true
            document.getElementById("dateContainer").disabled=true
            document.getElementById("timeContainer").disabled=true
        }
    }
    let url="http://localhost/project/Manager/getSessionDetails"
    httpreq.open("POST",url,true)
    httpreq.send()
}
editSessionLoad()

var time=""
var date=""
var type=""
var title=""

function changeTitle(){
    title=document.getElementById("titleContainer").value
    document.getElementById("titleContainer").disabled=false
    document.getElementById("editTitle").style.visibility='hidden'
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("titleSaveCancel").style.display='flex'
}
function changeDate(){
    date=document.getElementById("dateContainer").value
    document.getElementById("dateContainer").disabled=false
    document.getElementById("editTitle").style.visibility='hidden'
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("dateSaveCancel").style.display='flex'
}

function changeTime(){
    time=document.getElementById("timeContainer").value
    document.getElementById("timeContainer").disabled=false
    document.getElementById("editTitle").style.visibility='hidden'
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("timeSaveCancel").style.display='flex'
}

function changeType(){
    type=document.getElementById("type").value
    document.getElementById("type").disabled=false
    document.getElementById("editTitle").style.visibility='hidden'
    document.getElementById("editDate").style.visibility='hidden'
    document.getElementById("editType").style.visibility='hidden'
    document.getElementById("editTime").style.visibility='hidden'
    document.getElementById("typeSaveCancel").style.display='flex'
}


function cancelTitle(){
    document.getElementById("titleContainer").value=title
    document.getElementById("titleContainer").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("titleSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}
function cancelTime(){
    document.getElementById("timeContainer").value=time
    document.getElementById("timeContainer").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("timeSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function cancelDate(){
    document.getElementById("dateContainer").value=date
    document.getElementById("dateContainer").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("dateSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function cancelType(){
    document.getElementById("type").value=type
    document.getElementById("type").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("typeSaveCancel").style.display='none'
    // document.getElementById("box").classList.replace("box-active","box")
}

function saveTitle(){
    var newTitle=document.getElementById("titleContainer").value 
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){

        }
    }
    let url="http://localhost/project/Manager/saveEditedTitleS/"+newTitle.replace(/\s+/g, '-');
    httpreq.open("POST",url,true)
    httpreq.send()
    document.getElementById("titleContainer").value=newTitle
    document.getElementById("titleContainer").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("titleSaveCancel").style.display='none'
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
            let url="http://localhost/project/Manager/saveEditedTimeS/"+newTime
            httpreq.open("POST",url,true)
            httpreq.send()
            document.getElementById("timeContainer").value=newTime
            document.getElementById("timeContainer").disabled=true
            document.getElementById("editTitle").style.visibility='visible'
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
        let url="http://localhost/project/Manager/saveEditedDateS/"+newDate
        httpreq.open("POST",url,true)
        httpreq.send()
        document.getElementById("dateContainer").value=newDate
        document.getElementById("dateContainer").disabled=true
        document.getElementById("editTitle").style.visibility='visible'
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
    let url="http://localhost/project/Manager/saveEditedTypeS/"+type
    httpreq.open("POST",url,true)
    httpreq.send()
    document.getElementById("type").value=type
    document.getElementById("type").disabled=true
    document.getElementById("editTitle").style.visibility='visible'
    document.getElementById("editDate").style.visibility='visible'
    document.getElementById("editType").style.visibility='visible'
    document.getElementById("editTime").style.visibility='visible'
    document.getElementById("typeSaveCancel").style.display='none'

}


function changeInstructorLoad(){
    window.location.href="http://localhost/project/Manager/changeInstructorS/"
}
function changeVehicleLoad(){
    window.location.href="http://localhost/project/Manager/changeVehicleS/"
}
function changeStudentLoad(){
    window.location.href="http://localhost/project/Manager/changeStudentS/"
}
function deleteSession(){
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
        let url="http://localhost/project/Manager/deleteSession"
        httpreq.open("POST",url,true)
        httpreq.send()
        document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box")
    });
}