
var buttonArr=[]
selectedVehicleArr=[]
preselect=document.getElementById("selectedArr").value
preselectArr=preselect.split(",")
console.log(preselectArr)
let count=preselectArr.length
document.getElementById("counter").innerHTML=count

function getVehicles(){
    let httpreq = new XMLHttpRequest();
    const rows=document.getElementById("tableRows")
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].vehicle_no = obj[i].vehicle_no.replace(/-/g, " ");
                obj[i].vehicle_type = obj[i].vehicle_type.replace(/-/g, " ");
            }
            var className="Add"
            var textField="Add"
            for(var i=0;i<obj.length;i++){
                if(preselectArr.includes(obj[i].vehicle_id)){
                    className="Add-selected"
                    textField="Remove"
                }
                buttonArr.push(obj[i].vehicle_id)
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">V_'+obj[i].vehicle_id+'</div>'+
                        '<div class="two">'+obj[i].vehicle_no+'</div>'+
                        '<div class="three">'+obj[i].vehicle_class+'</div>'+
                        '<div class="four">'+obj[i].vehicle_type+'</div>'+
                    '</div>'+
                    '<div class="addButton">'+
                        '<button class="'+className+'" id="Add_'+obj[i].vehicle_id+'" onclick=selectSpecificVehicle('+obj[i].vehicle_id+','+obj.length+')>'+textField+'</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
            className="Add"
            textField="Add"
            }
            
        }
    }
    let url="http://localhost/project/Manager/addVehiclesForExams";
    httpreq.open( "POST" , url  , true);
    httpreq.send();

}
function selectSpecificVehicle(id,length){

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
function assignVehicles(){
    for(var j=0;j<buttonArr.length;j++){
        var idVal="Add_"+buttonArr[j]
        if(document.getElementById(idVal).innerHTML=="Remove"){
            selectedVehicleArr.push(buttonArr[j])
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
    let url="http://localhost/project/Manager/selectedVehiclesForExams/"+selectedVehicleArr
    httpreq.open("POST",url,true)
    httpreq.send()

}
getVehicles()
console.log(buttonArr)