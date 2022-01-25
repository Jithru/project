function loadTable(){
    let httpreq = new XMLHttpRequest();

httpreq.onreadystatechange = function(){
    console.log("onreadystatechange");
    
    if( httpreq.readyState === 4 && httpreq.status === 200){

        console.log(httpreq.responseText);
        const student = JSON.parse(httpreq.responseText);
        for(var i=0;i<student.length;i++){
            
            // console.log(student[i].student_id);
        }
        
        

        const rows = document.getElementById("scroll");
        
        // console.log(employee[0].employee_id)

            
        
            for(var i=0;i<student.length;i++){

                var studentname=student[i].full_name.replace(/_+/g, ',');
                studentname = studentname.replace(/-+/g, ' ');
                studentname=studentname.replace(/~+/g, '/');

                rows.innerHTML += '<div class="row-1"><div class="col-1"><p>St_'+student[i].student_id+'</p></div><div class="col-2"><p>'+studentname+'</p></div><div class="col-3"><p>'+student[i].contact+'</p></div><div class="col-4"><a href="http://localhost/project/Receptionist/payments"><button class="payments">Payments</button></a></div><div class="col-5"><button class="details" onclick="viewMore('+student[i].student_id+')">View Details</button></div></div>';
            }
 

    }
}

let url = "http://localhost/project/Receptionist/getStudentDetails";

httpreq.open( "POST" , url  , true);
//httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
httpreq.send();
}


loadTable();


function viewMore(id){

        
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var studentname=student[0].init_name.replace(/_+/g, ',');
            studentname = studentname.replace(/-+/g, ' ');
            studentname=studentname.replace(/~+/g, '/');

            var studentnameFull=student[0].full_name.replace(/_+/g, ',');
            studentnameFull = studentnameFull.replace(/-+/g, ' ');
            studentnameFull=studentnameFull.replace(/~+/g, '/');
            
            var stAddress=student[0].address.replace(/_+/g, ',');
            stAddress=stAddress.replace(/-+/g, ' ');
            stAddress=stAddress.replace(/~+/g, '/');

            


            document.getElementById('emId').innerText='St-'+student[0].student_id;
            document.getElementById('intname').innerText=studentname;
            document.getElementById('fullname').innerText=studentnameFull;
            document.getElementById('address').innerText=stAddress;
            document.getElementById('nic').innerText=student[0].NIC;
            if(student[0].gender=='m'){
                document.getElementById('gender').innerText="Male";
            }
            else if(student[0].gender=='f'){
                document.getElementById('gender').innerText="Female";
            }
            document.getElementById('district').innerText=student[0].district;
            document.getElementById('city').innerText=student[0].city;
            document.getElementById('divsec').innerText=student[0].div_sec;
            document.getElementById('police').innerText=student[0].police_station;
            document.getElementById('dob').innerText=student[0].dob;
            document.getElementById('contact').innerText=student[0].contact;
            document.getElementById('occupation').innerText=student[0].occupation;
            document.getElementById('type').innerText=student[0].type;
            document.getElementById('arivaldate').innerText=student[0].arival_date;
                

            
            
            
        }
    }
    let url = "http://localhost/project/Receptionist/getEmployeeDetailsMore/"+id;

    

    httpreq.open( "POST" , url  , true);
    httpreq.send();

document.getElementById("mid-box-container-1").classList.replace("mid-box-container-1","mid-box-container-1-active")
}

function closeMore(){
document.getElementById("mid-box-container-1").classList.replace("mid-box-container-1-active","mid-box-container-1")
}
