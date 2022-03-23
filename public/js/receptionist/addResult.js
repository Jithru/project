function todayAll(){
    // alert('Hello');
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){

        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const result = JSON.parse(httpreq.responseText);

            const row = document.getElementById("scroll");
           

            for(var i=0;i<result.length; i++){
                
                var myName=result[i].full_name.replace(/_+/g, ',');
                myName = myName.replace(/-+/g, ' ');
                myName=myName.replace(/~+/g, '/');

                if(result[i].exam_type=='Theory' || result[i].exam_type=='Written'){
                    var exType = "Written";
                }
                else if(result[i].exam_type=='Practical' || result[i].exam_type=='Trial'){
                    var exType = "Trial";
                }
                // console.log(result[i].participation_exam_id);
                
                if(result[i].results == "pending" ){
                    row.innerHTML += 
                    '<div class="row-1"><div class="col-1"><p>'+result[i].student_id+
                    '</p></div><div class="col-2"><p>'+myName+
                    '</p></div><div class="col-3"><p>'+exType+
                    '</p></div><div class="col-4"><button class="pass" id="pass'+result[i].student_id+','+result[i].exam_id+'" onclick="pass('+result[i].student_id+','+result[i].exam_id+')">Passed</button></div><div class="col-5"><button class="fail"  id="fail'+result[i].student_id+result[i].exam_id+'" onclick="fail('+result[i].student_id+','+result[i].exam_id+')">Failed</button></div></div>';

                }
                else{
                    row.innerHTML += 
                    '<div class="row-1"><div class="col-1"><p>'+result[i].student_id+
                    '</p></div><div class="col-2"><p>'+myName+
                    '</p></div><div class="col-3"><p>'+exType+
                    '</p></div><div class="col-6"><p><b>Done</b></p></div></div>';

                }
            }   
        }
    }
    var today = new Date();
    var today_date = today.getDate();
    if(today_date<10){
        today_date="0"+today_date
    }
    var presentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today_date;

    let url = "http://localhost/project/Receptionist/resultAll/"+presentDate;

    httpreq.open( "POST" , url  , true);
    httpreq.send();
    
}
todayAll();

function pass(id,exId){
    // alert(id);
    // document.getElementById("pass").property.style.background="red";
    // changeButton();
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            //const result = JSON.parse(httpreq.responseText);
            
        }
    }
    var pass="Pass";
    var send = [id,exId,pass];
    let url = "http://localhost/project/Receptionist/addPass/"+send;
    //alert(id);
    window.location.href = "http://localhost/project/Receptionist/addResult/";
    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
function changeButton(){
    document.getElementById("pass").style.backgroundColor="red";
}
function fail(id,exId){
    // alert(id);
    // alert(exId);
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            //const result = JSON.parse(httpreq.responseText);
            
        }
    }
    var fail = "Fail";
    var send = [id,exId,fail];
    let url = "http://localhost/project/Receptionist/addPass/"+send;
    //alert(id);
    window.location.href = "http://localhost/project/Receptionist/addResult/";
    httpreq.open( "POST" , url  , true);
    httpreq.send();

}

//search buttons
function passSearch(id,exId){
    alert(id);
    // document.getElementById("pass").property.style.background="red";
    // changeButton();
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            //const result = JSON.parse(httpreq.responseText);
            
        }
    }
    var pass="Pass";
    var send = [id,exId,pass];
    let url = "http://localhost/project/Receptionist/addPass/"+send;
    //alert(id);
    // window.location.href = "http://localhost/project/Receptionist/addResult/";
    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
function changeButton(){
    document.getElementById("pass").style.backgroundColor="red";
}
function failSearch(id,exId){
    alert(id);
    // alert(exId);
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            //const result = JSON.parse(httpreq.responseText);
            
        }
    }
    var fail = "Fail";
    var send = [id,exId,fail];
    let url = "http://localhost/project/Receptionist/addPass/"+send;
    //alert(id);
    // window.location.href = "http://localhost/project/Receptionist/addResult/";
    httpreq.open( "POST" , url  , true);
    httpreq.send();

}
function search(){
    var date = document.getElementById("date").value;
    
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){

        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const selectDate = JSON.parse(httpreq.responseText);

            const rows = document.getElementById("scroll");
            rows.innerHTML =""
            
            for(var i=0;i<selectDate.length; i++){

                var myName=selectDate[i].full_name.replace(/_+/g, ',');
                myName = myName.replace(/-+/g, ' ');
                myName=myName.replace(/~+/g, '/');

                if(selectDate[i].exam_type=='Written' || selectDate[i].exam_type=='written'){
                    var exType = "Written";
                }
                else if(selectDate[i].exam_type=='Trial' || selectDate[i].exam_type=='trial'){
                    var exType = "Trial";
                }
                
                // rows.innerHTML +='<div class="row-1"><div class="col-1"><p>'+selectDate[i].student_id+
                // '</p></div><div class="col-2"><p>'+myName+'</p></div><div class="col-3"><p>'+
                // exType+'</p></div><div class="col-4"><button class="pass" id="pass'+selectDate[i].student_id+','+selectDate[i].exam_id+'" onclick="pass('+selectDate[i].student_id+','+selectDate[i].exam_id+')">Passed</button></div><div class="col-5"><button class="fail"  id="fail'+selectDate[i].student_id+selectDate[i].exam_id+'" onclick="fail('+selectDate[i].student_id+','+selectDate[i].exam_id+')">Failed</button></div></div>';
            
                if(selectDate[i].results == "pending" ){
                    rows.innerHTML += 
                    '<div class="row-1"><div class="col-1"><p>'+selectDate[i].student_id+
                    '</p></div><div class="col-2"><p>'+myName+
                    '</p></div><div class="col-3"><p>'+exType+
                    '</p></div><div class="col-4"><button class="pass" id="pass'+selectDate[i].student_id+','+selectDate[i].exam_id+'" onclick="passSearch('+selectDate[i].student_id+','+selectDate[i].exam_id+')">Passed</button></div><div class="col-5"><button class="fail"  id="fail'+selectDate[i].student_id+selectDate[i].exam_id+'" onclick="failSearch('+selectDate[i].student_id+','+selectDate[i].exam_id+')">Failed</button></div></div>';

                }
                else{
                    rows.innerHTML += 
                    '<div class="row-1"><div class="col-1"><p>'+selectDate[i].student_id+
                    '</p></div><div class="col-2"><p>'+myName+
                    '</p></div><div class="col-3"><p>'+exType+
                    '</p></div><div class="col-6"><p><b>Done</b></p></div></div>';

                }
            }   
        }
    }

    let url = "http://localhost/project/Receptionist/search/"+date;
    // alert(date);

    httpreq.open( "POST" , url  , true);
    httpreq.send();
  
}

