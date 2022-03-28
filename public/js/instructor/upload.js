function newFile(){
    // alert('Hello iko');
    // document.getElementById("container").classList.replace("container","container-hidden");
    document.getElementById("box-container").classList.replace("box-container","box-container-visible");

}

function backFile(){
    document.getElementById("box-container").classList.replace("box-container-visible","box-container");
}
//  function uploadMe(){
//     alert('hello');
//     let httpreq = new XMLHttpRequest();
//     let formdata=new FormData();
//     let doc=document.getElementById('fileupload').files[0];
//     console.log(doc);
    
//     // httpreq.onreadystatechange=function(){
//     //     if(httpreq.readyState===4 && httpreq.status===200){
//     //         console.log(httpreq.responseText);
//     //         const obj=JSON.parse(httpreq.responseText)
            
//     //     }
//     // }
//     // let url="http://localhost/project/Instructor/uploadPDF"
//     // httpreq.open("POST",url,true)
//     // httpreq.send()

//     // document.getElementById("box-container").classList.replace("box-container-visible","box-container");
//     // document.getElementById("container").classList.replace("container-hidden","container");
// }
// let img=document.getElementById("uploadImage");
let changeF=document.getElementById("file");

function uploadMe(){
    document.getElementById("box-container").classList.replace("box-container-visible","box-container");
    let changeF=document.getElementById("file").files;
    console.log(changeF[0]);
    if(changeF[0].type!='application/pdf'){
        alert("File type is not valid");
    }else{
        // img.src=URL.createObjectURL(this.files[0]);

        let pdf = changeF[0];  // file from input
        let req = new XMLHttpRequest();
        let formData = new FormData(document.getElementById("form_pdf"));
        req.onreadystatechange=function(){
            if(req.readyState===4 && req.status===200){
                console.log(req.responseText)
            }
        }
        // formData.append('file', pdf);                                
        req.open("POST", 'http://localhost/project/Instructor/pdfUploading');
        req.send(formData);
    }

    window.location.reload(window.location.href);


}

function deleteMe(pdf_id){
    
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            console.log(obj);
            alert('removed');
            window.location.reload(window.location.href);
            
        }
    }
    let url="http://localhost/project/Instructor/deletePDF/"+pdf_id;
    httpreq.open("POST",url,true)
    httpreq.send()
    
}

function showPdf(){
    let httpreq=new XMLHttpRequest();

    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            const obj=JSON.parse(httpreq.responseText)
            console.log(obj);

            let row=document.getElementById("scroll");

            for(var i=0;i<obj.length;i++){
                var pdf_id=obj[i].Id;

                row.innerHTML+='<div class="row" id="row_pdf" ><div class="iconDetails"> <div class="icon"><img src="http://localhost/project/public/images/icons8-pdf-80.png" alt="pdf"></div>'+
                    '<div class="details"> <div class="file"> <div class="topic">File</div><div class="colon">:</div><div class="data">'+obj[i].file_name+'.pdf</div></div>'+
                        '<div class="date"><div class="topic">Date</div><div class="colon">:</div><div class="data">'+obj[0].date+'</div></div>'+
                        '<div class="time"><div class="topic">Time</div><div class="colon">:</div><div class="data">'+obj[0].time+'</div></div></div>'+
                    '<div class="delete"><button class="delete-btn" onclick="deleteMe('+pdf_id+')">Delete</button></div></div></div>'

            }


        }
    }

    var url="http://localhost/project/Instructor/getDetailsPdf";
    httpreq.open("POST",url,true);
    httpreq.send();


}

showPdf();