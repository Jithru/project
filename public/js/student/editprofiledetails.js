
    function editPhone(){
        document.getElementById("phone").removeAttribute('readonly');
        document.getElementById("hidden-phone").classList.replace("row-hidden-phone","row-hidden-phone-active");
        document.getElementById("editphone").classList.replace("Edit","Edit-active");
        

    }

    function savephone(){
        var phone=document.getElementById("phone").value;

        if(phone.length==0){
            document.getElementById("phone").placeholder="Password field can not be empty"; 
            document.getElementById("phone").style.border="2px solid red";      
        }else if(phone.length !=10){
            document.getElementById("phone").value="";
            document.getElementById("phone").placeholder="Contact number not valid"; 
            document.getElementById("phone").style.border="2px solid red";    
        }else{

            let httpreq=new XMLHttpRequest();
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    
                }
            }

        }

    }

    function cancelPhone(){
        var phone=document.getElementById("phone").value;
        document.getElementById("hidden-phone").classList.replace("row-hidden-phone-active","row-hidden-phone");
        document.getElementById("editphone").classList.replace("Edit-active","Edit");
        document.getElementById("phone").value=phone;
        document.getElementById("phone").readOnly="true";
    }


    // Image upload button
    function editImage(){
        document.getElementById("hidden-Image").classList.replace("row-hidden-Image","row-hidden-Image-active");
        document.getElementById("editImage").classList.replace("Edit","Edit-active");
        

    }


    async function upluploadFile() {
            let formData = new FormData(); 
            formData.append("file", file.files[0]);
            await fetch('/upload.php', {
              method: "POST", 
              body: formData
            }); 
            alert('The file has been uploaded successfully.');
            
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

            

        }

    })




    

    //password change
    function popupPwd(){
        document.getElementById("container-pwd").classList.replace("container-pwd","container-pwd-active");
        document.getElementById("curruentPwd").value="";
        document.getElementById("newPwd").value="";
        document.getElementById("rePwd").value="";
    }
    function backPopup(){
        document.getElementById("container-pwd").classList.replace("container-pwd-active","container-pwd");
    }   

    function cancel(){
        document.getElementById("curruentPwd").value="";
        document.getElementById("newPwd").value="";
        document.getElementById("rePwd").value="";
    }

    function submitPwd(){
        
        var crntpwd= document.getElementById("curruentPwd").value;
        var newPwd=document.getElementById("newPwd").value;
        var rePwd=document.getElementById("rePwd").value;


        if(crntpwd.length==0){
            document.getElementById("curruentPwd").placeholder="Password field can not be empty"; 
            document.getElementById("curruentPwd").style.border="2px solid red";
        }
        if(newPwd.length==0){
            document.getElementById("newPwd").placeholder="Password field can not be empty"; 
            document.getElementById("newPwd").style.border="2px solid red";
        }
            if(rePwd.length==0){
            document.getElementById("rePwd").placeholder="Password field can not be empty"; 
            document.getElementById("rePwd").style.border="2px solid red";     

        }
        else{
        
            let httpreq=new XMLHttpRequest();

            httpreq.onreadystatechange=function(){
                if(httpreq.readyState === 4 && httpreq.status === 200){
                    console.log(httpreq.responseText);
                    if(httpreq.responseText=="success"){
                        if(newPwd==rePwd){
                            updatePwd(newPwd);
                        }
                        else{
                            document.getElementById('newPwd').value="";
                            document.getElementById('rePwd').value="";  
                            document.getElementById("rePwd").placeholder="Password does not match"; 
                            document.getElementById("rePwd").style.border="2px solid red";
                        }

                    }
                    else{
                        document.getElementById('curruentPwd').value="";
                        document.getElementById('curruentPwd').placeholder="Incorrect password";
                        document.getElementById('curruentPwd').style.border="2px solid red";
                    }
                }
            }

            let url="http://localhost/project/Student/validate/"+ crntpwd;
            httpreq.open("POST",url,true);
            httpreq.send();

        }

    }

    function updatePwd(newPwd){
        let httpreq=new XMLHttpRequest();

        httpreq.onreadystatechange=function(){
            if(httpreq.readyState===4 && httpreq.status===200){
                console.log(httpreq.responseText);
                if(httpreq.responseText=="updated"){
                    alert("You have update your password");
                    document.getElementById("curruentPwd").value="";
                    document.getElementById("newPwd").value="";
                    document.getElementById("rePwd").value="";
                    document.getElementById("container-pwd").classList.replace("container-pwd-active","container-pwd");
                }
            }
        }

        let url = "http://localhost/project/Student/updatePasswordLogic/" + newPwd;
        httpreq.open("POST",url,true);
        httpreq.send();

    }