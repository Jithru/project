function validate(){

    const nic=document.getElementById('nic').value;
    const otp=document.getElementById('otpcode').value;
    // console.log("farzan !!")
    if(nic.length==0 || otp.length==0){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="NIC or OTP can't be empty";
    }else{
        let httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function(){
            console.log("onreadystatechange");
            if( httpreq.readyState === 4 && httpreq.status === 200){

                // console.log(httpreq.responseText);
                if(httpreq.responseText=="1"){
                    window.location.href='http://localhost/project/Staff/signupPassword';   
                }
                else{
                    document.getElementById("msgDiv").classList.replace("message","message-active");
                    document.getElementById("msgDiv").innerHTML="OTP Doesn't Match";
                }
            }
        }

        const data=[nic,otp];
        

        let url = "http://localhost/project/Staff/signupLogic/" + data;

        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send();
    }
    
    
}

function studentValidate(){

    const nic=document.getElementById('nic').value;
    const otp=document.getElementById('otpcode').value;
    // console.log("farzan !!")
    if(nic.length==0 || otp.length==0){
        document.getElementById("msgDiv").classList.replace("message","message-active");
        document.getElementById("msgDiv").innerHTML="NIC or OTP can't be empty";
    }else{
        let httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function(){
            console.log("onreadystatechange");
            if( httpreq.readyState === 4 && httpreq.status === 200){

                // console.log(httpreq.responseText);
                if(httpreq.responseText=="1"){
                    window.location.href='http://localhost/project/User/signupPassword';   
                }
                else{
                    document.getElementById("msgDiv").classList.replace("message","message-active");
                    document.getElementById("msgDiv").innerHTML="OTP Doesn't Match";
                }
            }
        }

        const data=[nic,otp];
        

        let url = "http://localhost/project/User/signupLogic/" + data;

        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send();
    }
    
    
}