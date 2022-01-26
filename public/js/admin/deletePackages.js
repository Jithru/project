function deletePackage(){
    let httprequest = new XMLHttpRequest();
    const username = document.getElementById('username').value
    const password = document.getElementById('passwordd').value
    console.log(password)
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                alert("The package you selected is deleted successfully")
                window.location.assign("http://localhost/project/Admin/packages");
            }
            else if(httprequest.responseText=='fales'){
                document.getElementById("invalid-login").classList.replace("invalid-login","invalid-login-true");
            }
            
        }
    }
    var url="http://localhost/project/Admin/deletePackage/"+username+"/"+password;
    httprequest.open("POST",url,true)
    httprequest.send()
}