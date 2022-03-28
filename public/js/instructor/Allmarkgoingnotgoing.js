function viewAllSession(){


    const row = document.getElementById("data");
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText)
           const obj=JSON.parse(httprequest.responseText)
           console.log(obj)

           //Save the session IDs
           let sessionIds = [];
           obj.map(o => {
               sessionIds.push(o.session_id)
           });

           localStorage.setItem("sid", JSON.stringify(sessionIds));
           for(var i=0; i<obj.length;i++){
            var sessionid=obj[i].session_id;
            row.innerHTML+=
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col" id="date'+sessionid+'">'+obj[i].session_date+'</div>'+
            '<div class="col" id="time'+sessionid+'">'+obj[i].session_time+'</div>'+
            '<div class="col_start" id="start'+sessionid+'"><button class="start" id="startb'+sessionid+'" onclick="startTime('+sessionid+')">Start</button></div>'+
            '<div class="col_end" id="end'+sessionid+'"><button class="end" id="endb'+sessionid+'" onclick="endTime('+sessionid+')">End</button></div>'+
            '<div class="col_going" id="going'+sessionid+'"> <button class="going" id="'+sessionid+'" onclick="going('+sessionid+')">Going</button></div>'+
            '<div class="col_notgoing" id="notgoing'+sessionid+'"><button class="notgoing" id="'+sessionid+'" onclick="notgoing('+sessionid+')">Not Going</button></div></div>';


            
        }

        }


    }
    
    var url="http://localhost/project/Instructor/markGoingNotGoingLogic";
    httprequest.open("POST",url,true)
    httprequest.send()
}

function going(sessionId){
    console.log("hi...");
    document.getElementById("going"+sessionId).style.display="none";
    document.getElementById("notgoing"+sessionId).style.display="none";

    var time=document.getElementById("time"+sessionId).value;

    var today = new Date();
    var todaytime=today.getHours()+':'+today.getMinutes()+':'+today.getSeconds();


    document.getElementById("start"+sessionId).style.display="flex";
    document.getElementById("end"+sessionId).style.display="flex";
    console.log("hi");
    // console.log(document.getElementById("start"+sessionId));
    // document.getElementById("startb"+sessionId).disabled=true;
    // document.getElementById("endb"+sessionId).disabled=true;

    if(time>=todaytime){
        document.getElementById("startb"+sessionId).disabled=false;
    }else{
        document.getElementById("startb"+sessionId).disabled=true;
    }


    // window.location.href="http://localhost/project/Instructor/sessions";
    
    let httprequest=new XMLHttpRequest();
    const row = document.getElementById("data");
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText)
        //    const obj=JSON.parse(httprequest.responseText)
        //    console.log(obj)
        //    for(var i=0; i<obj.length;i++){
        //     var sessionid=obj[i].session_id;
        //     row.innerHTML+=
        //     '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
        //     '<div class="col">'+obj[i].session_title+'</div>'+
        //     '<div class="col">'+obj[i].session_date+'</div>'+
        //     '<div class="col">'+obj[i].session_time+'</div>'
        //     // '<div class="col"><button class="notgoing" id="'+sessionid+'">Not Going</button></div></div>'


            
        // }

        }


    }
    
    var url="http://localhost/project/Instructor/clickGoing/"+sessionId;
    httprequest.open("POST",url,true)
    httprequest.send()


}

function notgoing(sessionId){
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){

        }
    }

    var url="http://localhost/project/Instructor/clickNotGoing/"+sessionId;
    httprequest.open("POST",url,true);
    httprequest.send();

}

function startTime(sessionId){
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText);

        }
    }

    let data=[sessionId,8];

    var url="http://localhost/project/Instructor/updateStartTime/"+data;
    httprequest.open("POST",url,true);
    httprequest.send();

}

function endTime(sessionId){
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){

        }
    }

    data=[sessionId,8];

    var url="http://localhost/project/Instructor/updateEndTime/"+data;
    httprequest.open("POST",url,true);
    httprequest.send();

}

function runnerAgent() {
    let sid = JSON.parse(localStorage.getItem("sid"));
    if (sid !== null && document.readyState === "complete") {
        for (let i = 0; i < sid.length; i++) {
            let timeStamp = document.getElementById(`time${sid[i]}`).innerHTML;
            let hh = timeStamp.split(":")[0];
            let min = timeStamp.split(":")[1];
            let ss = timeStamp.split(":")[2];

            let dbTime = moment(`${hh}:${min}:${ss}`, "HH:mm:ss");
            let currentDate = new Date();
            let currentTime = moment(`${currentDate.getHours}:${currentDate.getMinutes}:${currentDate.getSeconds}`, "HH:mm:ss");
            //Compare times
            let isTimeValid = dbTime.isBefore(currentDate) ? true: false; //true => Disable karanna
            if(!isTimeValid){
                document.getElementById(`startb${sid[i]}`).disabled = true;
                document.getElementById(`startb${sid[i]}`).style.backgroundColor = "grey";
                document.getElementById(`startb${sid[i]}`).style.borderColor = "grey";
            }

        }
    }
}

function getConductorId(){

    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){
            const obj=JSON.parse(httprequest.responseText);
            console.log(obj);

        }
    }

    var url="http://localhost/project/Instructor/getConductorId";
    httprequest.open("POST",url,true);
    httprequest.send();

}
viewAllSession();
// runnerAgent();
setInterval(runnerAgent, 1000);