function viewAllSession(){


    const row = document.getElementById("data");
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText)
           const obj=JSON.parse(httprequest.responseText)
           console.log(obj)
           for(var i=0; i<obj.length;i++){
            var sessionid=obj[i].session_id;
            row.innerHTML+=
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div>'+
            '<div class="col" id="going-col"> <button class="going" id="'+sessionid+'" onclick="going('+sessionid+')">Going</button></div>'+
            '<div class="col"><button class="notgoing" id="'+sessionid+'" onclick="notgoing('+sessionid+')">Not Going</button></div></div>'


            
        }

        }


    }
    
    var url="http://localhost/project/Instructor/markGoingNotGoingLogic";
    httprequest.open("POST",url,true)
    httprequest.send()
}

function going(sessionId){
    let httprequest=new XMLHttpRequest();
    httprequest.onreadystatechange=function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText)
           const obj=JSON.parse(httprequest.responseText)
           console.log(obj)
           for(var i=0; i<obj.length;i++){
            var sessionid=obj[i].session_id;
            row.innerHTML+=
            '<div class="row"><div class="col">'+obj[i].session_id +'</div>'+
            '<div class="col">'+obj[i].session_title+'</div>'+
            '<div class="col">'+obj[i].session_date+'</div>'+
            '<div class="col">'+obj[i].session_time+'</div>'+
            '<div class="col"><button class="notgoing" id="'+sessionid+'">Not Going</button></div></div>'


            
        }

        }


    }
    
    var url="http://localhost/project/Instructor/clickGoing";
    httprequest.open("POST",url,true)
    httprequest.send()


}

function notgoing(sessionId){

}
viewAllSession()