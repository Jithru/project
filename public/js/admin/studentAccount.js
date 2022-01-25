function loadTable(){
    let httpreq = new XMLHttpRequest();

httpreq.onreadystatechange = function(){
    console.log("onreadystatechange");
    
    if( httpreq.readyState === 4 && httpreq.status === 200){

        console.log(httpreq.responseText);
        const Student = JSON.parse(httpreq.responseText);
        for(var i=0;i<Student.length;i++){
            Student[i].init_name = Student[i].init_name.replace(/-/g, " ");
            console.log(Student[i].init_name);
        }
        
        

        const rows = document.getElementById("row-container");
        

        
            for(var i=0;i<Student.length;i++){
                rows.innerHTML+='<div class="row">'+
                '<div class="column-1"><b class="bold-name">ID</b><b class="bold">: </b>St_'+Student[i].student_id+'</div>'+
                '<div class="column-2"><b class="bold-name">Name</b><b class="bold">: </b>'+Student[i].init_name+'</div>'+
                '<div class="column-3"><b class="bold-name">Contact</b><b class="bold">: </b>'+Student[i].contact+'</div>'+
                '<div class="column-4"><button class="view-more" onclick="viewMore('+Student[i].student_id+')">View more</button></div>'+
            '</div>'
            
        }

        

    }
}

let url = "http://localhost/project/Admin/getStudentDetails";

httpreq.open( "POST" , url  , true);
//httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
httpreq.send();
}

loadTable()


function viewMore(ID){
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText)
            if(httpreq.responseText == 'success'){
                window.location.assign('http://localhost/project/Admin/AdminStudentDetails');
            }
        }
    }

    let url="http://localhost/project/Admin/viewMoreStudentsDetails/"+ID
    httpreq.open("post" , url , true)
    httpreq.send();
}
