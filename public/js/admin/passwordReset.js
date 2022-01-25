function passing(){
    var password = document.getElementById('enterPassword').value;
    var confirm  = document.getElementById('confirmPassword').value;
    console.log(password)
    if(password.length==0){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="password field can't be empty :(";
        
    }else if(password!=confirm){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="password and the confirmation doesn't match :(";
    }else if(password.length<8){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="please try to set a password with at least 8 characters :)";
    }else if(hasWhiteSpace(password)){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="Your password shouldn't contain white spaces :)";
    }else{
        let httpreq = new XMLHttpRequest();

        httpreq.onreadystatechange = function(){
            console.log("onreadystatechange");
            
            if( httpreq.readyState === 4 && httpreq.status === 200){
    
                console.log(httpreq.responseText);
                if(httpreq.responseText=="success"){
                    // alert('hi')
                    window.location.assign("http://localhost/project/AdminAuth") 
                      
                }
                else{
                    alert("something went wrong");
                }
            }
        }
    
        const data=[password];
        
    
        let url = "http://localhost/project/AdminAuth/passwordResetLogic/" + data;
    
        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send();
    }
}

function hasWhiteSpace(s) {
    return s.indexOf(' ') >= 0;
}