function viewMore(){

        
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
    let url = "http://localhost/project/Admin/displayStudentDetails";

    

    httpreq.open( "POST" , url  , true);
    httpreq.send();


}

viewMore()