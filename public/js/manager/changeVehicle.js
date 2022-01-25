let selectedVehicles=[]
function loadPreSelectedVehicles(){
    console.log("hi")
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows1")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].vehicle_type = obj[i].vehicle_type.replace(/-/g, " ");
                obj[i].vehicle_no = obj[i].vehicle_no.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                selectedVehicles.push(obj[i].vehicle_id)
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">V_'+obj[i].vehicle_id+'</div>'+
                        '<div class="two">'+obj[i].vehicle_type+'</div>'+
                        '<div class="three">'+obj[i].vehicle_no+'</div>'+
                    '</div>'+
                    '<div class="removeButton">'+
                        '<button id="Remove_'+obj[i].vehicle_id+'" class="Remove" onclick=removeVehicles('+obj[i].vehicle_id+')>Remove</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
            }
        }
    }
    let url="http://localhost/project/Manager/loadPreSelectedVehicles/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedVehicles()

function loadUnselectedVehicles(){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            console.log(selectedVehicles)
            let rows=document.getElementById("tableRows2")
            const obj=JSON.parse(httpreq.responseText)
            for(var i=0;i<obj.length;i++){
                obj[i].vehicle_type = obj[i].vehicle_type.replace(/-/g, " ");
                obj[i].vehicle_no = obj[i].vehicle_no.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                if(!selectedVehicles.includes(obj[i].vehicle_id)){
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">V_'+obj[i].vehicle_id+'</div>'+
                            '<div class="two">'+obj[i].vehicle_type+'</div>'+
                            '<div class="three">'+obj[i].vehicle_no+'</div>'+
                        '</div>'+
                        '<div class="addButton">'+
                            '<button id="Add_'+obj[i].vehicle_id+'" class="Add" onclick=addNewVehicles('+obj[i].vehicle_id+')>Add</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
               
            }
        }
    }
    let url="http://localhost/project/Manager/loadUnselectedVehicles/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadUnselectedVehicles()
function removeVehicles(vehicleId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeVehicle"
            }
        }
    }
    let url="http://localhost/project/Manager/removeVehicles/"+vehicleId
    httpreq.open("POST",url,true)
    httpreq.send()
}
function addNewVehicles(vehicleId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            if(httpreq.responseText=="true"){
                window.location.href="http://localhost/project/Manager/changeVehicle"
            }
        }
    }
    let url="http://localhost/project/Manager/addNewVehicles/"+vehicleId
    httpreq.open("POST",url,true)
    httpreq.send()
}