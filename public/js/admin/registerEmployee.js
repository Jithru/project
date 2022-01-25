function loadJobs(){
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log("Hi")
            console.log(httprequest.responseText)
            const obj=JSON.parse(httprequest.responseText)
            document.getElementById('empType').innerHTML='<option value="'+obj['Manager']+'">'+obj['Manager']+'</option>'
            +'<option value="'+obj['Receptionist']+'">'+obj['Receptionist']+'</option>'+'<option value="'+obj['Instructor']+'">'+obj['Instructor']+'</option>'
            +'<option value="'+obj['Teacher']+'">'+obj['Teacher']+'</option>'
            
        }
    }
    var url="http://localhost/project/Admin/loadJobs";
    httprequest.open("POST",url,true)
    httprequest.send()
}
loadJobs()


function changeLicense(){
  if(document.getElementById('empType').value=='Instructor'){
    document.getElementById('license-Number').style.visibility="visible"
  }
  else{
    document.getElementById('license-Number').style.visibility="hidden"
  }
}


function register()         
{ 
  
  var name=document.getElementById('Name').value;
  var empAddress=document.getElementById('empAddress').value;
  var NIC=document.getElementById('NIC').value;
  // var Dob=document.getElementById('Dob').value;
  var telNo=document.getElementById('telNo').value;
  var Gender=document.getElementsByName('Gender').value
  var empType=document.getElementById('empType').value;
  var licenseNumber=document.getElementById('licenseNumber').value;
  var err=document.getElementById('err');
  var flag=true;

  

  if (name == "" ||empAddress== "" || NIC== "" || Gender=="" ||telNo== "" ||empType== "")
  {
    if(name == "") {
      document.getElementById('Name').placeholder="Name field can't be empty";
      document.getElementById('Name').style.border="2px solid red";
    } 
    if(empAddress== "") {
      document.getElementById('empAddress').placeholder="Address field can't be empty";
      document.getElementById('empAddress').style.border="2px solid red";
      
    }
    if(NIC== "") {
      document.getElementById('NIC').placeholder="NIC field can't be empty";
      document.getElementById('NIC').style.border="2px solid red";
      
    }
    if(document.getElementById('male').checked) {
        var gender='m';
    }
    else if(document.getElementById('female').checked){
        var gender='f'
    }
    else{
      document.getElementById('gender-below').innerHTML="Gender field can't be empty";
    }
    if(telNo== "") {
      document.getElementById('telNo').placeholder="Contact number field can't be empty";
      document.getElementById('telNo').style.border="2px solid red";
      
    }                  
  }
  else
  {

    if(NIC.length>0){
      if(NIC.length==10){
          if(NIC.charAt(9)=='V' || NIC.charAt(9)=='v'){
              for(var j=0;j<NIC.length-1;j++){
                  if(isNaN(NIC.charAt(j))){
                      err.classList.replace("err","err-true"); 
                      err.innerHTML='This nic is not valid';
                      flag=false;
                      break;
                  }
              }
          }else{
              err.classList.replace("err","err-true"); 
              err.innerHTML='This nic is not valid';
              flag=false;
          }
      }else if(NIC.length==12){
              if(isNaN(NIC)){
                  err.classList.replace("err","err-true"); 
                  err.innerHTML='This nic is not valid';
                  flag=false;
              }
      }else{
          err.classList.replace("err","err-true"); 
          err.innerHTML='This nic is not valid';
          flag=false
      }
  }

  
  if(telNo.length!=10){
      err.classList.replace("err","err-true"); 
      err.innerHTML='Please recheck the mobile number';
      flag=false;
  }

  
      if(NIC.length==10){
          const d = new Date();
          var yearvar=parseInt(NIC.substr(0,2))
          yearvar=1900+yearvar
          console.log()
          d.setFullYear(yearvar,00,01)
          var datevar=NIC.substr(2,3)
          d.setDate(datevar - 1)
          console.log(d.toISOString().slice(0, 10))
          dateofbirth=d.toISOString().slice(0, 10)
          
      }else if(NIC.length==12){
          const d = new Date();
          var yearvar=parseInt(NIC.substr(0,4))
          d.setFullYear(yearvar,00,01)
          d.setDate(parseInt(NIC.substr(4,3)) - 1)
          console.log(d.toISOString().slice(0, 10))
          dateofbirth=d.toISOString().slice(0, 10)
      

  }
    if(flag==true){
      console.log(name+" "+empAddress+" "+NIC+" "+dateofbirth+" "+Gender+" "+telNo+" "+empType+" "+licenseNumber)
      let httpreq = new XMLHttpRequest();
      httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            // console.log("Done");
            const str = httpreq.responseText;
            console.log(httpreq.responseText);
            const myArr = str.split(",", 2);
            console.log(myArr[1]);
            
            if(myArr[0]=='successfull'){
              alert("Registration successfully")
              alert(myArr[1])
              window.location.assign("http://localhost/project/Admin/staff");
            }
            else if(myArr[0]=='contact exist'){
              err.classList.replace("err","err-true"); 
              err.innerHTML='The contact number you entered is already exist';
                
            }
            else if(myArr[0]=='nic exist'){
              err.classList.replace("err","err-true");
              err.innerHTML='The NIC you entered is already exist'; 
            }
            else if(myArr[0]=='nic contact exist'){
              err.classList.replace("err","err-true");
              err.innerHTML='The NIC and contact number you entered are already exist'; 
            }
            
        }
      }

      name=name.replace(/,+/g, '_');
      name=name.replace(/\s+/g, '-');
      name=name.replace(/\/+/g, '~');
      
      empAddress=empAddress.replace(/,+/g, '_');
      empAddress=empAddress.replace(/\s+/g, '-');
      empAddress=empAddress.replace(/\/+/g, '~');

      if(document.getElementById('male').checked) {
        Gender=document.getElementById('male').value;
      }
      else if(document.getElementById('female').checked){
        Gender=document.getElementById('female').value
      }

      // console.log(Gender)
      let Employee=[name,empAddress,NIC,dateofbirth,Gender,telNo,empType,licenseNumber];
      
      let url = "http://localhost/project/Admin/registerEmployee/"+Employee;

      httpreq.open( "POST" , url  , true);
      httpreq.send();

    }

    
  }
  
}

    
   

    

