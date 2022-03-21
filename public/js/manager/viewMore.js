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
            
            document.getElementById('stId').innerText='ST'+student[0].student_id;
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
            
            document.getElementById('edId').value='ST'+student[0].student_id;
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

function updateMe(){
    
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);
        }

    }
    // var id = document.getElementById('edId').value;
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

    window.location.href = "http://localhost/project/Manager/studentList/";
    // alert('Hell');

}

function cancelME(){
    
    document.getElementById("edit-container").classList.replace("edit-container-visible","edit-container"); 
    document.getElementById("main").classList.replace("main","main-show");
}
