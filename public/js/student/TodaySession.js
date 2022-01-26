function viewTodaySession(){

    const row = document.getElementById("data");
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
           const obj=JSON.parse(httprequest.responseText)
           console.log(obj)
           for(var i=0; i<obj.length;i++){sessionid
            var sessionid=obj[i].session_id;
            var status=obj[i].status;

            if(status="pending"){
            row.innerHTML+=
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div>'+
            '<div class="col" id="going-col"> <button class="going" id="'+sessionid+'" onclick="going('+sessionid+')">Going</button></div>'+
            '<div class="col"><button class="notgoing" id="'+sessionid+'" onclick="notgoing('+sessionid+')">Not Going</button></div></div>'
            }else if(status="going"){
            row.innerHTML+=
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div></div>'
            }else{
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div></div>'
            }
           

        }

        }


    }
    
    var url="http://localhost/project/Student/markGoingNotGoingLogic";
    httprequest.open("POST",url,true)
    httprequest.send()
}
function going(objId){
    // console.log(objId);
    // document.getElementById(objId).classList.replace("notgoing","notgoing-click-going");
    const row = document.getElementById("data");
    var status="going";
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){
            console.log("Hi");
            window.location.href="http://localhost/project/Student/markGoingNotGoingLogic";

        }
    }

    var url_going="http://localhost/project/Student/markGoingNotGoingLogic_Going/"+status;
    httprequest.open("POST",url_going,true)
    httprequest.send()

      
}

function notgoing(objId){
    // document.getElementById(objId).classList.replace("going","going-click-notgoing"); 
}

viewTodaySession()
