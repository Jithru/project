function newFile(){
    // alert('Hello iko');
    // document.getElementById("container").classList.replace("container","container-hidden");
    document.getElementById("box-container").classList.replace("box-container","box-container-visible");
    

}
 function uploadMe(){
    alert('hello');
    let httpreq = new XMLHttpRequest();
    let formdata=new FormData();
    let doc=document.getElementById('fileupload').files[0];
    console.log(doc);
    
    // httpreq.onreadystatechange=function(){
    //     if(httpreq.readyState===4 && httpreq.status===200){
    //         console.log(httpreq.responseText);
    //         const obj=JSON.parse(httpreq.responseText)
            
    //     }
    // }
    // let url="http://localhost/project/Instructor/uploadPDF"
    // httpreq.open("POST",url,true)
    // httpreq.send()

    // document.getElementById("box-container").classList.replace("box-container-visible","box-container");
    // document.getElementById("container").classList.replace("container-hidden","container");
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