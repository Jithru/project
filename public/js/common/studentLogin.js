function check_empty_field()         
    {                                    
      if (document.getElementById("username").value == "" ||document.getElementById("password").value == "")
      {
        if(document.getElementById("username").value == "") {
            document.getElementById("username").placeholder="NIC field can't be empty";
            document.getElementById("username").style.border="2px solid red";
        } 
        if(document.getElementById("password").value== "") {
            document.getElementById("password").placeholder="Contact Number field can't be empty";
            document.getElementById("password").style.border="2px solid red";
            
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
                console.log(httpreq.responseText);
                const myArr = str.split(",", 1);
                console.log(myArr[0]);
                if(myArr[0]=='success'){
                  window.location.assign("http://localhost/project/User")
                }
                else{
                  document.getElementById("invalid-login").classList.replace("invalid-login","invalid-login-true");
                }
            }
        }
    
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const data=[username,password];
    
        let url = "http://localhost/project/User/login/" + data;
    
        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send(); 
        // return true;                     
      }
    }

    //meka main login eka
//meka common eka athulata danna


    

 
