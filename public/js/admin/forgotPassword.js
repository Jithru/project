function forgot_password(){
    if (document.getElementById("nic").value == "" ||document.getElementById("Contact").value == "")
      {
            if(document.getElementById("nic").value == "") {
                document.getElementById("nic").placeholder="NIC field can't be empty";
                document.getElementById("nic").style.border="2px solid red";
            } 
            if(document.getElementById("Contact").value== "") {
                document.getElementById("Contact").placeholder="Contact Number field can't be empty";
                document.getElementById("Contact").style.border="2px solid red";
                
            }                  
      }

      else
      {
        let httpreq = new XMLHttpRequest();

        httpreq.onreadystatechange = function(){
            // console.log(document.getElementById("username").value);
            console.log("onreadystatechange");
            if( httpreq.readyState === 4 && httpreq.status === 200){
                console.log("Done");
                const str = httpreq.responseText;
                console.log(httpreq.responseText)
                const myArr = str.split(",", 1);
                console.log(myArr[0]);
                if(myArr[0]=='success'){
                  document.getElementById("otp-container").classList.replace("otp-container","otp-container-active")
                }
                else{
                  document.getElementById("err").innerText="This NIC and contact number not exist"
                }
            }
        }
    
        const nic = document.getElementById("nic").value;
        const contact = document.getElementById("Contact").value;
        const data=[nic,contact];
    
        let url = "http://localhost/project/AdminAuth/forgotPasswordLogic/" + data;
    
        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send();
        // return true;                     
      }
      
}

function otpCancel(){
    document.getElementById("otp-container").classList.replace("otp-container-active","otp-container")
}

function compareOTP(){
  let httpreq = new XMLHttpRequest();

  httpreq.onreadystatechange = function(){
      // console.log(document.getElementById("username").value);
      console.log("onreadystatechange");
      if( httpreq.readyState === 4 && httpreq.status === 200){
          console.log("Done");
          const str = httpreq.responseText;
          console.log(httpreq.responseText)
          const myArr = str.split(",", 1);
          console.log(myArr[0]);
          if(myArr[0]=='success'){
            // document.getElementById("otp-container").classList.replace("otp-container","otp-container-active")
            alert("otp matched")
            window.location.assign("http://localhost/project/AdminAuth/passwordReset");
          }

      }
    }

    const otp = document.getElementById("otp").value;
    const data=[otp];

    let url = "http://localhost/project/AdminAuth/compareOTP/" + data;

    httpreq.open( "POST" , url  , true);
    //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
    httpreq.send();
  // return true;                     

}