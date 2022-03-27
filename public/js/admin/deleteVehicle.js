function deleteVehicle(){
    let httprequest = new XMLHttpRequest();
    const username = document.getElementById('username').value
    const password = document.getElementById('passwordd').value
    if(username==""||password==""){
        if(username==""){
            document.getElementById('username').placeholder="This field can't be empty";
            document.getElementById('username').style.border="2px solid red";
        }
        if(password==""){
            document.getElementById('passwordd').placeholder="This field can't be empty";
            document.getElementById('passwordd').style.border="2px solid red";
        }
    }
    else{
        console.log(password)
        httprequest.onreadystatechange = function(){
            if (httprequest.readyState===4 && httprequest.status===200){
                console.log(httprequest.responseText)
                if(httprequest.responseText=="success"){
                    alert("The package you selected is deleted successfully")
                    window.location.assign("http://localhost/project/Admin/vehicles");
                }
                else if(httprequest.responseText=='fales'){
                    document.getElementById("errp").classList.replace("errp","invalid-login-true");
                }
                else if(httprequest.responseText=="assigned"){
                    alert("You can't delete this employee (This vehicle was assigned to the sessions)")
                }
                
            }
        }
        var url="http://localhost/project/Admin/deleteVehicle/"+username+"/"+password; 
        httprequest.open("POST",url,true)
        httprequest.send()
    } 
}