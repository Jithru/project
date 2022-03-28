var stId;

function ViewMore(id){
    //alert('HI');
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            var address = student[0].address.replace(/_+/g, ',');
            address = address.replace(/-+/g, ' ');
            address = address.replace(/~+/g, '/');
            
            document.getElementById('stId').innerText='ST_'+student[0].student_id;
            document.getElementById('initName').innerText=student[0].init_name;
            document.getElementById('fName').innerText=student[0].full_name;
            document.getElementById('address').innerText=student[0].address;
            document.getElementById('nic').innerText=student[0].NIC; 
            if(student[0].gender=='m'){
                document.getElementById('gen').innerText="Male";
            }
            else if(student[0].gender=='f'){
                document.getElementById('gen').innerText="Female";
            }
            
            document.getElementById('dist').innerText=student[0].district;
            document.getElementById('city').innerText=student[0].city;
            document.getElementById('divSec').innerText=student[0].div_sec;
            document.getElementById('police').innerText=student[0].police_station; 
            document.getElementById('dob').innerText=student[0].dob;
            document.getElementById('contact').innerText=student[0].contact;
            document.getElementById('occ').innerText=student[0].occupation;
            document.getElementById('type').innerText=student[0].type;
            document.getElementById('date').innerText=student[0].arival_date; 
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+id;

    

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    stId=id;

    document.getElementById("container").classList.replace("container","container-hidden")
    // document.getElementById("box-1").style.visibility="none"
    document.getElementById("main").classList.replace("main","main-show")
    // document.getElementById("main").style.visibility="visible"
}

function editMe(){
    console.log(stId);

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            var address = student[0].address.replace(/_+/g, ',');
            address = address.replace(/-+/g, ' ');
            address = address.replace(/~+/g, '/');
            
            document.getElementById('edId').value='ST_'+student[0].student_id;
            document.getElementById('edInit').value=student[0].init_name;
            document.getElementById('edfName').value=student[0].full_name;
            document.getElementById('edAdd').value=student[0].address;
            document.getElementById('edNIC').value=student[0].NIC; 
            if(student[0].gender=='m'){
                document.getElementById('edGen').value="Male";
            }
            else if(student[0].gender=='f'){
                document.getElementById('edGen').value="Female";
            }
            // if(student[0].gender=='m'){
            //     document.getElementById('edMale').checked;
            // }
            // else if(student[0].gender=='f'){
            //     document.getElementById('edFemale').checked;
            // }
            
            document.getElementById('edDis').value=student[0].district;
            document.getElementById('edCity').value=student[0].city;
            document.getElementById('edDS').value=student[0].div_sec;
            document.getElementById('edPolice').value=student[0].police_station; 
            document.getElementById('edDob').value=student[0].dob;
            document.getElementById('edCon').value=student[0].contact;
            document.getElementById('edOcc').value=student[0].occupation;
            document.getElementById('edType').value=student[0].type;
            // document.getElementById('date').value=student[0].arival_date; 
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("edit-container").classList.replace("edit-container","edit-container-visible"); 
}
//change
// function editMe(){
//     console.log(stId);

//     let httpreq = new XMLHttpRequest();
//     httpreq.onreadystatechange = function(){
//         console.log("onreadystatechange");
//         if( httpreq.readyState === 4 && httpreq.status === 200){

//             console.log(httpreq.responseText);
//             const student = JSON.parse(httpreq.responseText);

//             var studentName=student[0].full_name.replace(/_+/g, ',');
//             studentName = studentName.replace(/-+/g, ' ');
//             studentName=studentName.replace(/~+/g, '/');

//             var address = student[0].address.replace(/_+/g, ',');
//             address = address.replace(/-+/g, ' ');
//             address = address.replace(/~+/g, '/');
            
//             document.getElementById('edId').value='ST'+student[0].student_id;
//             document.getElementById('edInit').value=student[0].init_name;
//             document.getElementById('edfName').value=student[0].full_name;
//             document.getElementById('edAdd').value=student[0].address;
//             document.getElementById('edNIC').value=student[0].NIC; 
//             if(student[0].gender=='m'){
//                 document.getElementById('edGen').value="Male";
//             }
//             else if(student[0].gender=='f'){
//                 document.getElementById('edGen').value="Female";
//             }
            
//             document.getElementById('edDis').value=student[0].district;
//             document.getElementById('edCity').value=student[0].city;
//             document.getElementById('edDS').value=student[0].div_sec;
//             document.getElementById('edPolice').value=student[0].police_station; 
//             document.getElementById('edDob').value=student[0].dob;
//             document.getElementById('edCon').value=student[0].contact;
//             document.getElementById('edOcc').value=student[0].occupation;
//             document.getElementById('edType').value=student[0].type;
//         }
//     }
//     let url = "http://localhost/project/Receptionist/viewM/"+stId;

    

//     httpreq.open( "POST" , url  , true);
//     httpreq.send();

//     document.getElementById("toEdit-container").classList.replace("toEdit-container-visible","toEdit-container"); 

    // document.getElementById("main").classList.replace("main-show","main");
    // document.getElementById("edit-container").classList.replace("edit-container","edit-container-visible"); 
// }

function updateMe(){
   
    var flag=true;
    //st id
    var initName=document.getElementById("edInit").value;
    if(initName.length==0){
        document.getElementById("edInit").placeholder="Name with Initials can not be empty"
        document.getElementById("edInit").style.border="2px solid red"
        flag=false;
    }
    var fullName=document.getElementById("edfName").value;
    if(fullName.length==0){
        document.getElementById("edfName").placeholder="Full Name can not be empty"
        document.getElementById("edfName").style.border="2px solid red"
        flag=false;
    }
    var pmtAddress=document.getElementById("edAdd").value; 
    if(pmtAddress.length==0){
        document.getElementById("edAdd").placeholder="Address can not be empty"
        document.getElementById("edAdd").style.border="2px solid red"
        flag=false;
    }
    var nic=document.getElementById("edNIC").value; 
    if(nic.length==0){
        document.getElementById("edNIC").placeholder="NIC can not be empty"
        document.getElementById("edNIC").style.border="2px solid red"
        flag=false;
    }
   //NIC
    if(nic.length>0){
        if(nic.length==10){
            if(nic.charAt(9)=='V' || nic.charAt(9)=='v'){
                for(var j=0;j<nic.length-1;j++){
                    if(isNaN(nic.charAt(j))){
                        document.getElementById("edNIC").value="nic is not valid"
                        document.getElementById("edNIC").style.border="2px solid red"
                        flag=false;
                        break;
                    }
                }
            }else{
                document.getElementById("edNIC").value="nic is not valid"
                document.getElementById("edNIC").style.border="2px solid red"
                flag=false;
            }
        }else if(nic.length==12){
                if(isNaN(nic)){
                    document.getElementById("edNIC").value="nic is not valid"
                    document.getElementById("edNIC").style.border="2px solid red"
                    flag=false;
                }
        }else{
            document.getElementById("edNIC").value="this nic is not valid"
            document.getElementById("edNIC").style.border="2px solid red"
            flag=false
        }
    }
    //
    var city=document.getElementById("edCity").value;
    if(city.length==0){
        document.getElementById("edCity").placeholder="This feild can not be empty"
        document.getElementById("edCity").style.border="2px solid red"
        flag=false;
    }
    var district=document.getElementById("edDis").value;
    if(district.length==0){
        document.getElementById("edDis").placeholder="This feild can not be empty"
        document.getElementById("edDis").style.border="2px solid red"
        flag=false;
    }
    var divSecre=document.getElementById("edDS").value;
    if(divSecre.length==0){
        document.getElementById("edDS").placeholder="This feild can not be empty"
        document.getElementById("edDS").style.border="2px solid red"
        flag=false;
    }
    var police=document.getElementById("edPolice").value;
    if(police.length==0){
        document.getElementById("edPolice").placeholder="This feild can not be empty"
        document.getElementById("edPolice").style.border="2px solid red"
        flag=false;
    }
    //dob
    //contact
    var mobile=document.getElementById("edCon").value;
    if(mobile.length!=10){
        document.getElementById("edCon").placeholder="Please recheck the mobile number"
        document.getElementById("edCon").style.border="2px solid red"
        flag=false;
    }
    if(isNaN(mobile)){
        document.getElementById("edCon").placeholder="Please recheck the mobile number"
        document.getElementById("edCon").style.border="2px solid red"
        flag=false;
    }
    //gender....
    // if(!document.getElementById("edMale").checked && !document.getElementById("edFemale").checked){
    //     // document.getElementById("message").innerHTML="You haven't select a gender"
    //     flag=false;
    // }
    //
    var type=document.getElementById("edType").value;
    if(type.length==0){
        document.getElementById("edType").placeholder="This feild can not be empty"
        document.getElementById("edType").style.border="2px solid red"
        flag=false;
    }


    if(flag==true){
        let httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function(){
            console.log("onreadystatechange");
            if( httpreq.readyState === 4 && httpreq.status === 200){
    
                console.log(httpreq.responseText);
                const student = JSON.parse(httpreq.responseText);
            }
    
        }
      
        var init = document.getElementById('edInit').value
        var fName = document.getElementById('edfName').value;
        var add = document.getElementById('edAdd').value;
        var nic = document.getElementById('edNIC').value; 
        if(document.getElementById('edGen').value=='Male'){
            var gen = document.getElementById('edGen').value="m";
        }
        else if(document.getElementById('edGen').value=='Female'){
            var gen = document.getElementById('edGen').value="f";
        }
        
        var dis = document.getElementById('edDis').value;
        var city = document.getElementById('edCity').value;
        var dds = document.getElementById('edDS').value;
        var police=document.getElementById('edPolice').value;
        var dob = document.getElementById('edDob').value;
        var con = document.getElementById('edCon').value;
        var occ = document.getElementById('edOcc').value;
        var type = document.getElementById('edType').value;
    
        let update = [init,fName,add,nic,gen,dis,city,dds,police,dob,con,occ,type]
        let url = "http://localhost/project/Receptionist/updateMe/"+stId+"/"+update;
    
        httpreq.open( "POST" , url  , true);
        httpreq.send();
    
        window.location.href = "http://localhost/project/Receptionist/studentList/";
    
    }
}

function cancelME(){
    
    document.getElementById("edit-container").classList.replace("edit-container-visible","edit-container"); 
    document.getElementById("main").classList.replace("main","main-show");
}


// function update_me(){
//     // alert('updateMe');
//     let httpreq = new XMLHttpRequest();
//     httpreq.onreadystatechange = function(){
//         console.log("onreadystatechange");
//         if( httpreq.readyState === 4 && httpreq.status === 200){

//             console.log(httpreq.responseText);
//             const student = JSON.parse(httpreq.responseText);
//         }

//     }
  
    // var init = document.getElementById('edInit').value
    // var fName = document.getElementById('edfName').value;
    // var add = document.getElementById('edAdd').value;
    // var nic = document.getElementById('edNIC').value; 
    // if(document.getElementById('edGen').value=='Male'){
    //     var gen = document.getElementById('edGen').value="m";
    // }
    // else if(document.getElementById('edGen').value=='Female'){
    //     var gen = document.getElementById('edGen').value="f";
    // }
    
    // var dis = document.getElementById('edDis').value;
    // var city = document.getElementById('edCity').value;
    // var dds = document.getElementById('edDS').value;
    // var police=document.getElementById('edPolice').value;
    // var dob = document.getElementById('edDob').value;
    // var con = document.getElementById('edCon').value;
    // var occ = document.getElementById('edOcc').value;
    // var type = document.getElementById('edType').value;

    // let update = [init,fName,add,nic,gen,dis,city,dds,police,dob,con,occ,type]
//     let url = "http://localhost/project/Receptionist/update_me/"+stId+"/"+init;

//     httpreq.open( "POST" , url  , true);
//     httpreq.send();

//     document.getElementById("toEdit-container").classList.replace("toEdit-container-visible","toEdit-container"); 

//     window.location.href = "http://localhost/project/Receptionist/studentList/";
//     alert('Hell');

// }

function init(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            // var init_name = student[0].init_name.replace(/_+/g, ',');
            // init_name=init_name.replace(/-+/g, ' ');
            // init_name=init_name.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Name with initials";
            document.getElementById('edInit').value=student[0].init_name;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}

function fullName(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Full Name";
            document.getElementById('edInit').value=studentName;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function address()
function address(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Address";
            document.getElementById('edInit').value=student[0].address;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function nic()
function nic(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="NIC";
            document.getElementById('edInit').value=student[0].NIC;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function gender()
function gender(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Gender";
            
            if(student[0].gender=='m'){
                document.getElementById('edInit').value="Male";
            }
            else if(student[0].gender=='f'){
                document.getElementById('edInit').value="Female";
            }
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function district()
function district(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="District";
            document.getElementById('edInit').value=student[0].district;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function city()
function city(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="City";
            document.getElementById('edInit').value=student[0].city;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function disSec()
function disSec(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="District Secratary";
            document.getElementById('edInit').value=student[0].div_sec;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function police()
function police(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Near Police Station";
            document.getElementById('edInit').value=student[0].police_station;;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function dob()
// function dob(){
   
//     console.log(stId);
//     document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

//     let httpreq = new XMLHttpRequest();
//     httpreq.onreadystatechange = function(){
//         console.log("onreadystatechange");
//         if( httpreq.readyState === 4 && httpreq.status === 200){

//             console.log(httpreq.responseText);
//             const student = JSON.parse(httpreq.responseText);

//             var studentName=student[0].full_name.replace(/_+/g, ',');
//             studentName = studentName.replace(/-+/g, ' ');
//             studentName=studentName.replace(/~+/g, '/');

//             document.getElementById("theam-head").innerHTML="Date of Birth";
//             document.getElementById('edInit').value=student[0].dob;
//         }
//     }
//     let url = "http://localhost/project/Receptionist/viewM/"+stId;

//     httpreq.open( "POST" , url  , true);
//     httpreq.send();
  
// }
// function contact()
function contact(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Contact";
            document.getElementById('edInit').value=student[0].contact;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function occupation()
function occupation(){
    // alert("init");
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Occupation";
            document.getElementById('edInit').value=student[0].occupation;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
// function type()
function type(){
    console.log(stId);
    // document.getElementById("main").classList.replace("main-show","main");
    document.getElementById("toEdit-container").classList.replace("toEdit-container","toEdit-container-visible"); 

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentName=student[0].full_name.replace(/_+/g, ',');
            studentName = studentName.replace(/-+/g, ' ');
            studentName=studentName.replace(/~+/g, '/');

            document.getElementById("theam-head").innerHTML="Type";
            document.getElementById('edInit').value=student[0].type;
        }
    }
    let url = "http://localhost/project/Receptionist/viewM/"+stId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}
