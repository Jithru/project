selectedInstructors=[]
function loadPreSelectedInstructors(){
    console.log("hi")
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows1")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].name = obj[i].name.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                selectedInstructors.push(obj[i].employee_id)
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">'+obj[i].employee_id+'</div>'+
                        '<div class="two">'+obj[i].name+'</div>'+
                        '<div class="three">'+obj[i].job_title+'</div>'+
                    '</div>'+
                    '<div class="removeButton">'+
                        '<button id="Remove_'+obj[i].employee_id+'" class="Remove" onclick=removeInstructor('+obj[i].employee_id+')>Remove</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
            }

        }
    }
    let url="http://localhost/project/Manager/loadPreSelectedInstructorsS/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedInstructors()

function loadUnselectedInstructors(){

    console.log(selectedInstructors)
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows2")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].name = obj[i].name.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                if(!selectedInstructors.includes(obj[i].employee_id)){
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">'+obj[i].employee_id+'</div>'+
                            '<div class="two">'+obj[i].name+'</div>'+
                            '<div class="three">'+obj[i].job_title+'</div>'+
                        '</div>'+
                        '<div class="addButton">'+
                            '<button id="Add_'+obj[i].employee_id+'" class="Add" onclick=addNewInstructor('+obj[i].employee_id+')>Add</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
               
            }

        }
    }
    let url="http://localhost/project/Manager/loadUnselectedInstructorsS/"
    httpreq.open("POST",url,true)
    httpreq.send()

}
loadUnselectedInstructors()

function removeInstructor(employeeId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeInstructorS"
            }
        }
    }
    let url="http://localhost/project/Manager/removeInstructorS/"+employeeId
    httpreq.open("POST",url,true)
    httpreq.send()
}
function addNewInstructor(employeeId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeInstructorS"
            }
        }
    }
    let url="http://localhost/project/Manager/addNewInstructorS/"+employeeId
    httpreq.open("POST",url,true)
    httpreq.send()
}