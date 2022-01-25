selectedStudents=[]
let sessionID=document.getElementById("idContainer").value
function loadPreSelectedStudents(){
    console.log("hi")
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows1")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].init_name = obj[i].init_name.replace(/-/g, " ");
            }
            var myArr=[]
            for(var i=0;i<obj.length;i++){
                myArr[i] = obj[i].session_IDs.split(",");
            }

            for(var i=0;i<obj.length;i++){
                console.log(myArr[i])
                if(myArr[i].includes(sessionID)){
                    selectedStudents.push(obj[i].student_id)
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="three">'+obj[i].total_assigns+'/20</div>'+
                        '</div>'+
                        '<div class="removeButton">'+
                            '<button id="Remove_'+obj[i].student_id+'" class="Remove" onclick=removeStudents('+obj[i].student_id+')>Remove</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
                
            }

        }
    }
    let url="http://localhost/project/Manager/loadPreSelectedStudentsS/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedStudents()

function loadUnselectedStudents(){

    console.log(selectedStudents)
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows2")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].init_name = obj[i].init_name.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                if(!selectedStudents.includes(obj[i].student_id)){
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="three">'+obj[i].total_assigns+'/20</div>'+
                        '</div>'+
                        '<div class="addButton">'+
                            '<button id="Add_'+obj[i].student_id+'" class="Add" onclick=addNewStudents('+obj[i].student_id+')>Add</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
               
            }

        }
    }
    let url="http://localhost/project/Manager/loadUnselectedStudentsS/"
    httpreq.open("POST",url,true)
    httpreq.send()

}
loadUnselectedStudents()

function removeStudents(studentId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeStudentS"
            }
        }
    }
    let url="http://localhost/project/Manager/removeStudentsS/"+studentId
    httpreq.open("POST",url,true)
    httpreq.send()
}
function addNewStudents(studentId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeStudentS"
            }
            if(httpreq.responseText=="false"){
                document.getElementById("confirmation").classList.replace("confirmation-box","confirmation-box-active")
                document.getElementById("confirm").addEventListener('click',function(){
                    document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box")
                });
            }
        }
    }
    let url="http://localhost/project/Manager/addNewStudentsS/"+studentId
    httpreq.open("POST",url,true)
    httpreq.send()
}