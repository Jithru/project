function deleteEmployee(){
    alert("HI")
    let httprequest = new XMLHttpRequest();
    const username = document.getElementById('username').value
    const password = document.getElementById('passwordd').value
    console.log(password)
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                alert("The Employee you selected is deleted successfully")
                window.location.assign("http://localhost/project/Admin/employeeAccounts");
            }
            else if(httprequest.responseText=='fales'){
                document.getElementById("invalid-login").classList.replace("invalid-login","invalid-login-true");
            }
            else if(httprequest.responseText=="assigned"){
                alert("You can't delete this employee (This employee was assigned to the sessions)")
            }
            
        }
    }
    var url="http://localhost/project/Admin/deleteEmployee/"+username+"/"+password;
    httprequest.open("POST",url,true)
    httprequest.send() 
}