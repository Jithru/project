function loadExpences(){
    let httpreq = new XMLHttpRequest()
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState == 4 && httpreq.status == 200){
            // console.log(httpreq.responseText)
            const Expences = JSON.parse(httpreq.responseText)
            let noOfVehicle = ''
            const initRow = document.getElementById("Initial-Charges");
            for(i=0;i<Expences.length;i++){
                
                if(Expences[i]['no_of_vehicles']==1){
                    noOfVehicle='One class of vehicles'
                }
                else if(Expences[i]['no_of_vehicles']==2){
                    noOfVehicle='Two classes of vehicles'
                }
                else if(Expences[i]['no_of_vehicles']==3){
                    noOfVehicle='Three classes of vehicles'
                }
                Expences[i]['amount']
                initRow.innerHTML+='<div class="row">'+
                    '<div class="col-1"><b class="bold-name-4">Number of Vehicles</b><b class="bold">: </b>'+noOfVehicle+'</div>'+
                    '<div class="col-2"></div>'+
                    '<div class="col-3"><b class="bold-name-4">Price (LKR)</b><b class="bold">: </b><input disabled="true" type="text" id="iCharge'+Expences[i]['ischarge_id']+'" value="'+Expences[i]['amount']+'"></div>'+
                    '<div class="col-4"><button id="ic'+Expences[i]['ischarge_id']+'" class="edit" onclick ="editCharge('+Expences[i]['ischarge_id']+')">Edit</button><button id="C'+Expences[i]['ischarge_id']+'"  class="save-small-deactivate" onclick ="saveCharge('+Expences[i]['ischarge_id']+')">Save</button><button id="cc'+Expences[i]['ischarge_id']+'" class="cancel-small-deactivate" onclick ="cancelCharge('+Expences[i]['ischarge_id']+')">Cancel</button></div>'+
                '</div>'

            }
        }
    }


    let url ="http://localhost/project/Admin/loadExpences";
    httpreq.open("post", url, true);
    httpreq.send();
}
function loadOtherExpences(){
    let httpreq = new XMLHttpRequest()
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState == 4 && httpreq.status == 200){
            // console.log(httpreq.responseText)
            const OtherExpences = JSON.parse(httpreq.responseText)
            let noOfVehicle = ''
            const initRow = document.getElementById("Initial-Prices");
            const ExtraRow = document.getElementById("Other-charges");
            for(i=0;i<OtherExpences.length;i++){
                
                if(OtherExpences[i]['type']=='written'){
                    type='Reapplying for written test'
                }
                else if(OtherExpences[i]['type']=='practical'){
                    type='Reapplying for practical test'
                }

                
                
                ExtraRow.innerHTML+= '<div class="row">'+
                    '<div class="column-1"><b class="bold-name-2">Task</b><b class="bold">: </b>'+type+'</div>'+
                    '<div class="col-3"><b class="bold-name-2">Price (LKR)</b><b class="bold">: </b><input disabled="true" type="text" id="Other'+OtherExpences[i]['ef_id']+'" value="'+OtherExpences[i]['amount']+'"></input></div>'+
                    '<div class="col-4"><button id="O'+OtherExpences[i]['ef_id']+'" class="edit" onclick ="editOther('+OtherExpences[i]['ef_id']+')">Edit</button><button id="so'+OtherExpences[i]['ef_id']+'"  class="save-small-deactivate" onclick ="saveOther('+OtherExpences[i]['ef_id']+')">Save</button><button id="co'+OtherExpences[i]['ef_id']+'" class="cancel-small-deactivate" onclick ="cancelOther('+OtherExpences[i]['ef_id']+')">Cancel</button></div>'+
                '</div>'

        

            }
        }
    }


    let url ="http://localhost/project/Admin/loadOtherExpences";
    httpreq.open("post", url, true);
    httpreq.send();
}
loadExpences()
loadOtherExpences()


function editOther(id){

    document.getElementById('so'+id).classList.replace("save-small-deactivate","save-small")
    document.getElementById('O'+id).classList.replace("edit","edit-deactivate")
    document.getElementById('co'+id).classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('Other'+id).disabled = false;
    document.getElementById('Other'+id).style.border = "2px solid #555555";
    document.getElementById('Other'+id).style.borderRadius = "3px"

}

function cancelOther(id){
    document.getElementById('so'+id).classList.replace("save-small","save-small-deactivate")
    document.getElementById('O'+id).classList.replace("edit-deactivate","edit")
    document.getElementById('co'+id).classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('Other'+id).disabled = true;
    document.getElementById('Other'+id).style.border = "none";
}

function editCharge(id){
    document.getElementById('C'+id).classList.replace("save-small-deactivate","save-small")
    document.getElementById('ic'+id).classList.replace("edit","edit-deactivate")
    document.getElementById('cc'+id).classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('iCharge'+id).disabled = false;
    document.getElementById('iCharge'+id).style.border = "2px solid #555555";
    document.getElementById('iCharge'+id).style.borderRadius = "3px"
}

function cancelCharge(id){
    document.getElementById('C'+id).classList.replace("save-small","save-small-deactivate")
    document.getElementById('ic'+id).classList.replace("edit-deactivate","edit")
    document.getElementById('cc'+id).classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('iCharge'+id).disabled = true;
    document.getElementById('iCharge'+id).style.border = "none";
}


function saveOther(id){
    let otherCharges = document.getElementById('Other'+id+'').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/initExpences");
            }
            
        }
    }
    let Other = [id,otherCharges]
    var url="http://localhost/project/Admin/editOtherCharges/"+Other;
    httprequest.open("POST",url,true)
    httprequest.send()
}

function saveCharge(id){
    alert(id)
    let icharge = document.getElementById('iCharge'+id+'').value
    alert(icharge)
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/initExpences");
            }
            
        }
    }
    let initCharge = [id,icharge]
    var url="http://localhost/project/Admin/editInitCharges/"+initCharge;
    httprequest.open("POST",url,true)
    httprequest.send()
}