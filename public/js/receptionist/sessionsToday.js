function todaySessions(){
    // alert("iko")
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){

        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const session = JSON.parse(httpreq.responseText);

            const row = document.getElementById("scroll-today");
            for(var i=0;i<session.length;i++){

                var title=session[i].session_title.replace(/_+/g, ',');
                title = title.replace(/-+/g, ' ');
                title=title.replace(/~+/g, '/');

                var insName=session[i].name.replace(/_+/g, ',');
                insName = insName.replace(/-+/g, ' ');
                insName=insName.replace(/~+/g, '/');

                if(session[i].held_or_not==1){
                    var status = "Started";
                }
                else if(session[i].held_or_not==0){
                    var status = "Not Started";
                }

                row.innerHTML += '<div class="row-1"><div class="col-1"><p>'+"LSN"+session[i].session_id+
                '</p></div><div class="col-2"><p>'+title+'</p></div><div class="col-3"><p>'+
                session[i].session_date+'</p></div><div class="col-4"><p>'+session[i].session_time+'</p></div><div class="col-5"><p>'+insName+'</p></div><div class="col-6"><p>'+status+'</p></div>';
            }   
        }
    }

    var today = new Date();
    var today_date = today.getDate();
    if(today_date<10){
        today_date="0"+today_date
    }
    var presentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today_date;
    
    let url = "http://localhost/project/Receptionist/todaySession/"+presentDate;
    // alert(presentDate);

    httpreq.open( "POST" , url  , true);
    httpreq.send();

}
todaySessions();