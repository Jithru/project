function getExamDetails(){

    const rowTheory=document.getElementById("theory-details");
    const rowTrail=document.getElementById("trail-details");
    let httpreq=new XMLHttpRequest();

    httpreq.onreadystatechange=function(){
        if (httpreq.status===200 && httpreq.readyState===4){
            const obj= JSON.parse(httpreq.responseText);
            console.log("hi");
            console.log(obj);



            for(var i=0;i<obj.length;i++){

                var insName=obj[i].name.replace(/_+/g, ',');
                insName = insName.replace(/-+/g, ' ');

                if(obj[i].exam_type=="Practical"){
 
                    rowTrail.innerHTML+='<div class="theory-box"><div class="row"><div class="cel-1"><h4>Date</h4><h4>:</h4></div><div class="cel-2">'+obj[i].exam_date+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Time</h4><h4>:</h4></div><div class="cel-2">'+obj[i].exam_time+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Instructor</h4><h4>:</h4></div><div class="cel-2">'+insName+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Results</h4><h4>:</h4></div><div class="cel-2">'+obj[i].results+'</div></div></div>'
                }else{
                    rowTheory.innerHTML+='<div class="trail-box"><div class="row"><div class="cel-1"><h4>Date</h4><h4>:</h4></div><div class="cel-2">'+obj[i].exam_date+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Time</h4><h4>:</h4></div><div class="cel-2">'+obj[i].exam_time+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Instructor</h4><h4>:</h4></div><div class="cel-2">'+insName+'</div></div>'+
                    '<div class="row"><div class="cel-1"><h4>Results</h4><h4>:</h4></div><div class="cel-2">'+obj[i].results+'</div></div></div>'
                 
                }


     
            }

            
            
        }
    }

    var url="http://localhost/project/Student/getExamdetailsLogic";
    httpreq.open("POST",url,true)
    httpreq.send()


}

getExamDetails();