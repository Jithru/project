// Image upload button
function editImage(){
    document.getElementById("hidden-Image").classList.replace("row-hidden-Image","row-hidden-Image-active");
    document.getElementById("editImage").classList.replace("Edit","Edit-active");
    

}

function removeImage(){
    // var img=document.getElementById("uploadImage");
    // img.innerHTML="<img src="<?php echo URL?>public/images/profpic.png" alt="pp" id="uploadImage">";
}

function cancelImage(){
    // var phone=document.getElementById("phone").value;
    window.location.reload('http://localhost/project/Student/editprofile');
    document.getElementById("hidden-Image").classList.replace("row-hidden-Image-active","row-hidden-Image");
    document.getElementById("editImage").classList.replace("Edit-active","Edit");

}

let img=document.getElementById("uploadImage");
let changeF=document.getElementById("file");

changeF.addEventListener('change',function(){
    console.log(this.files[0].type);
    if(this.files[0].type!='image/png' && this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg'){
        alert("File type is not valid");
    }else{
        img.src=URL.createObjectURL(this.files[0]);

        let photo = document.getElementById("file").files[0];  // file from input
        let req = new XMLHttpRequest();
        let formData = new FormData();
        req.onreadystatechange=function(){
            if(req.readyState===4 && req.status===200){
                console.log(req.responseText)
            }
        }
        formData.append("photo", photo);                                
        req.open("POST", 'http://localhost/project/Student/imageUploading');
        req.send(formData);
    }


})


