function viewTodaySession(){

    const row = document.getElementById("data");
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
           const obj=JSON.parse(httprequest.responseText)
           console.log(obj)
           for(var i=0; i<obj.length;i++){
            var sessionid=obj[i].session_id;
            var status=obj[i].status;
            var going="going";
            var notgoing="notgoing";
            console.log(status);

            if(status=="pending"){
            row.innerHTML+=
            '<div class="row" ><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div>'+
            '<div class="col" id="going-col"> <button class="going" id="'+sessionid+'" onclick="going_status('+sessionid+')">Going</button></div>'+
            '<div class="col"><button class="notgoing" id="'+sessionid+'" onclick="notgoing_status('+sessionid+')">Not Going</button></div></div>'
            
            }
            else if (status=="going"){
                console.log("go");
                row.innerHTML+='<div class="row" id="going_row'+sessionid+'"><div class="col">'+obj[i].session_id +'</div>'+
                '<div class="col">'+obj[i].session_title+'</div>'+
                '<div class="col">'+obj[i].session_date+'</div>'+
                '<div class="col">'+obj[i].session_time+'</div>'+
                '<div class="col">Going</div>'+
                '<div class="col"></div></div>'
                document.getElementById("going_row"+sessionid).style.border="2px solid red";
            }
            else if(status=="notgoing"){
                console.log("Not");
                row.innerHTML+= '<div class="row" id="notgoing_row'+sessionid+'"><div class="col">'+obj[i].session_id +'</div>'+
                '<div class="col">'+obj[i].session_title+'</div>'+
                '<div class="col">'+obj[i].session_date+'</div>'+
                '<div class="col">'+obj[i].session_time+'</div>'+
                '<div class="col"></div>'+
                '<div class="col">Not Going</div></div>'
                document.getElementById("notgoing_row"+sessionid).style.border="2px solid green";
            }
            else{
                alert("No data to show");
            }
           

        }

        }


    }
    
    var url="http://localhost/project/Student/markGoingNotGoingLogic";
    httprequest.open("POST",url,true)
    httprequest.send()
}
function going_status(objId){
    // document.getElementById("going").style.display="none";
    const row = document.getElementById("data");
    
    var status="going";
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText);
                console.log("Hi");
                window.location.reload("http://localhost/project/Student/markGoingNotGoing");  
            
                     
        }
    }
    const data=[status,objId];

    var url_going="http://localhost/project/Student/markGoingNotGoingLogic_Going/"+data;
    httprequest.open("POST",url_going,true)
    httprequest.send()

      
}

function notgoing_status(objId){
    var status="notgoing";
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if(httprequest.readyState===4 && httprequest.status===200){
                console.log("Hi");
                window.location.href="http://localhost/project/Student/markGoingNotGoing";  
            
                     
        }
    }
    const data=[status,objId];
    var url_Notgoing="http://localhost/project/Student/markGoingNotGoingLogic_NotGoing/"+data;
    httprequest.open("POST",url_Notgoing,true);
    httprequest.send(); 
}

viewTodaySession()
