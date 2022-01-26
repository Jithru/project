butttonArr=[]
selectedInstructorsArr=[]
console.log(selectedInstructorsArr)

preselect=document.getElementById("selectedArr").value
preselectArr=preselect.split(",")
console.log(preselectArr)
let count=preselectArr.length
document.getElementById("counter").innerHTML=count

function getInstructors(){
    let httpreq = new XMLHttpRequest();
    const rows=document.getElementById("tablerows")
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].name = obj[i].name.replace(/-/g, " ");
            }
            var className="Add"
            var textField="Add"

            console.log(preselectArr)
            for(var i=0;i<obj.length;i++){
                if(preselectArr.includes(obj[i].employee_id)){
                    className="Add-selected"
                    textField="Remove"
                }
                butttonArr.push(obj[i].employee_id)
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">Emp_'+obj[i].employee_id+'</div>'+
                        '<div class="two">'+obj[i].name+'</div>'+
                        '<div class="three">'+obj[i].job_title+'</div>'+
                    '</div>'+
                    '<div class="addButton">'+
                        '<button class="'+className+'" id="Add_'+obj[i].employee_id+'" onclick=selectSpecificInstructor('+obj[i].employee_id+','+obj.length+')>'+textField+'</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
            className="Add"
            textField="Add"
            }
            
        }
    }
    let url="http://localhost/project/Manager/addInstructorsForExams";
    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
getInstructors()

function selectSpecificInstructor(id,length){
    var idVal="Add_"+id
    if(document.getElementById(idVal).innerHTML=="Add"){
        document.getElementById(idVal).classList.replace("Add","Add-selected");
        document.getElementById(idVal).innerHTML="Remove"
        count++
    }else{
        document.getElementById(idVal).classList.replace("Add-selected","Add");
        document.getElementById(idVal).innerHTML="Add"
        count--
    }
    document.getElementById("counter").innerHTML=count;
}

function assignInstructors(){
    for(var j=0;j<butttonArr.length;j++){
        var idVal="Add_"+butttonArr[j]
        if(document.getElementById(idVal).innerHTML=="Remove"){
            selectedInstructorsArr.push(butttonArr[j])
        }
    }
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="saved"){
                window.location.href="http://localhost/project/Manager/addExam"
            }
        }
    }
    let url="http://localhost/project/Manager/selectedInstructorsForExams/"+selectedInstructorsArr
    httpreq.open("POST",url,true)
    httpreq.send()

}