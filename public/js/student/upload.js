function showPdf(){
    let httpreq=new XMLHttpRequest();

    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            const obj=JSON.parse(httpreq.responseText)
            console.log(obj);

            let row=document.getElementById("scroll");
            

            for(var i=0;i<obj.length;i++){
                var pdf_id=obj[i].Id;
                var name=obj[i].file_name;

                row.innerHTML+='<div class="row" id="row_pdf" ><div class="iconDetails"> <div class="icon"><img src="http://localhost/project/public/images/icons8-pdf-80.png" alt="pdf"></div>'+
                    '<div class="details"> <div class="file"> <div class="topic">File</div><div class="colon">:</div><div class="data">'+obj[i].file_name+'.pdf</div></div>'+
                        '<div class="date"><div class="topic">Date</div><div class="colon">:</div><div class="data">'+obj[0].date+'</div></div>'+
                        '<div class="time"><div class="topic">Time</div><div class="colon">:</div><div class="data">'+obj[0].time+'</div></div></div>'+
                    '<a href="http://localhost/project/public/pdf/'+name+'.pdf" download><div class="delete"><button class="delete-btn"">Download</button></div></div></a></div>'

            }


        }
    }

    var url="http://localhost/project/Instructor/getDetailsPdf";
    httpreq.open("POST",url,true);
    httpreq.send();


}
showPdf();