function viewMore(){

        
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const employee = JSON.parse(httpreq.responseText);
            console.log(employee);

            var empname=employee[0].name.replace(/_+/g, ',');
            console.log(empname)
            empname = empname.replace(/-+/g, ' ');
            console.log(empname)
            empname=empname.replace(/~+/g, '/');
            console.log(empname)
            
            var empAddress=employee[0].address.replace(/_+/g, ',');
            empAddress=empAddress.replace(/-+/g, ' ');
            empAddress=empAddress.replace(/~+/g, '/');
                

            document.getElementById("emId").innerText='EM-'+employee[0].employee_id
            document.getElementById("Name").innerText=empname
            document.getElementById("Job-title").innerText=employee[0].job_title
            document.getElementById("NIC").innerText=employee[0].nic
            document.getElementById("Contact").innerText=employee[0].contact_no
            document.getElementById("Address").innerText=empAddress
            document.getElementById("dob").innerText=employee[0].dob
            if(employee[0].gender=='m'){
                document.getElementById("Gender").innerText='Male'
            }
            if(employee[0].gender=='f'){
                document.getElementById("Gender").innerText='Female'
            }
            
            document.getElementById("Hiring-Date").innerText=employee[0].hired_date
            if(employee[0].job_title=='Instructor'){
                document.getElementById("Licence-row").innerHTML='<div class="mid-box-column-1"><h4>Licence-No</h4><h4>:</h4></div><div class="mid-box-column-2" id="Licence-No">'+employee[1].instructor_license_id+'</div>'
            }
            
            
            
        }
    }
    let url = "http://localhost/project/Admin/displayEmployeeDetails";

    

    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
viewMore()