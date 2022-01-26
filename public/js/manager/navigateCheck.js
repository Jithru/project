function callInstructorsPage(){
    var title=document.getElementById("title").value
    let type=document.getElementById("type").value
    var date=document.getElementById("date").value
    var time=document.getElementById("time").value 
    if(title.length==0){
        document.getElementById("msg").innerHTML="Title can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }else if(type=="noValue"){
        document.getElementById("msg").innerHTML="Select a type"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(date.length==0){
        document.getElementById("msg").innerHTML="Date can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(time.length==0){
        document.getElementById("msg").innerHTML="Time can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }else{
        window.location.href="http://localhost/project/Manager/addInstructorS/"+type+"/"+title+"/"+date+"/"+time
    }  
}

function callVehiclesPage(){
    var title=document.getElementById("title").value
    let type=document.getElementById("type").value
    var date=document.getElementById("date").value
    var time=document.getElementById("time").value 
    if(title.length==0){
        document.getElementById("msg").innerHTML="Title can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }else if(type=="noValue"){
        document.getElementById("msg").innerHTML="Select a type"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(date.length==0){
        document.getElementById("msg").innerHTML="Date can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(time.length==0){
        document.getElementById("msg").innerHTML="Time can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }else{
        window.location.href="http://localhost/project/Manager/addVehicleS/"+type+"/"+title+"/"+date+"/"+time
    }  
}

function submitSession(){
    console.log("function called");
    var title=document.getElementById("title").value
    var type=document.getElementById("type").value
    var date=document.getElementById("date").value
    var time=document.getElementById("time").value 

    if(title.length==0){
        document.getElementById("msg").innerHTML="Title can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(type=="noValue"){
        document.getElementById("msg").innerHTML="Select a type"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(date.length==0){
        document.getElementById("msg").innerHTML="Date can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else if(time.length==0){
        document.getElementById("msg").innerHTML="Time can't be empty"
        document.getElementById("box").classList.replace("box","box-active")
    }
    else{
        var today=new Date();
        if(today.getDate()<10){
            var dateval="0"+today.getDate()
        }
        else{
            var dateval=today.getDate()
        }
        var day=today.getFullYear()+"-"+(today.getMonth()+1)+"-"+dateval
        var todaytime=today.getHours()+":"+today.getMinutes()
        if(date<day){
            console.log(day)
            console.log(date)
            document.getElementById("msg").innerHTML="The day you have selected was past"
            document.getElementById("box").classList.replace("box","box-active")
        }
        else if(date==day && time<todaytime){
            document.getElementById("msg").innerHTML="The time you have selected was past"
            document.getElementById("box").classList.replace("box","box-active")
        }
        else{
            let httpreq=new XMLHttpRequest();
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    console.log(httpreq.responseText);
                }
            }
            let data=[title,date,time,type]
            let url="http://localhost/project/Manager/addSessionLogic/"+data;
            httpreq.open( "POST" , url  , true);
            httpreq.send();
        
            document.getElementById("title").value=""
            document.getElementById("type").value=""
            document.getElementById("date").value=""
            document.getElementById("time").value =""
            window.location.href="http://localhost/project/Manager/addSession"
        }
        
    }    
}