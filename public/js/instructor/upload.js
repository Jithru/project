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


}

function deleteMe(){
    alert('removed');
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            
        }
    }
    let url="http://localhost/project/Instructor/deletePDF"
    httpreq.open("POST",url,true)
    httpreq.send()
}