function loadPackages(){
    let packages = document.getElementById('packages')
    let httprequest  = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText+"kkk")
            const package = JSON.parse(httprequest.responseText)
            for(i=0; i<package.length; i++){
                packages.innerHTML += '<div class="row">'+
                '<div class="col-1"><b class="bold-name-3">Package Name</b><b class="bold">: </b>'+package[i].type+'</div>'+
                '<div class="col-2"><b class="bold-name-3">Vehicle classes</b><b class="bold">: </b>'+package[i].classes+'</div>'+
                '<div class="col-3"><b class="bold-name-3">Price (LKR)</b><b class="bold">: </b>'+package[i].amount+'</div>'+
                '<div class="col-4"><button class="edit" onclick ="editPackage('+package[i].package_id+')">Edit</button></div>'+
                '</div>'
            }
            
        }
    }
    
    var url="http://localhost/project/Admin/getPackages";
    httprequest.open("POST",url,true)
    httprequest.send()
}

function editPackage(id){
    let httprequest  = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/editPackages");
            }
            
            
        }
    }
    
    var url="http://localhost/project/Admin/clickEditPackages/"+id;
    httprequest.open("POST",url,true)
    httprequest.send()
}



function loadInitPrices(){
    let httpreq = new XMLHttpRequest()
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState == 4 && httpreq.status == 200){
            const initPrices = JSON.parse(httpreq.responseText)
            const initRow = document.getElementById("Initial-Prices");
            const ExtraRow = document.getElementById("Extra-Prices");
            for(i=0;i<initPrices[1].length;i++){
                
                console.log(initPrices[4][i]+" "+initPrices[0][i]+" "+initPrices[1][i]+" "+initPrices[2][i]+" "+initPrices[3][i])
                
                initRow.innerHTML += '<div class="row">'+
                '<div class="col-1"><b class="bold-name-2">Vehicle Type</b><b class="bold">: </b>'+initPrices[0][i]+'</div>'+
                '<div class="col-2"><b class="bold-name-2">Vehicle class</b><b class="bold">: </b>'+initPrices[1][i]+'</div>'+
                '<div class="col-3"><b class="bold-name-2">Price (LKR)</b><b class="bold">: </b><input disabled="true" type="text" id="iprice'+initPrices[4][i]+'" value="'+initPrices[2][i]+'"></div>'+
                '<div class="col-4"><button id="Ii'+initPrices[4][i]+'" class="edit" onclick ="editInit('+initPrices[4][i]+')">Edit</button><button id="I'+initPrices[4][i]+'"  class="save-small-deactivate" onclick ="saveInit('+initPrices[4][i]+')">Save</button><button id="ci'+initPrices[4][i]+'" class="cancel-small-deactivate" onclick ="cancelInit('+initPrices[4][i]+')">Cancel</button></div>'+
                '</div>'

                ExtraRow.innerHTML += '<div class="row">'+
                '<div class="col-1"><b class="bold-name-2">Vehicle Type</b><b class="bold">: </b>'+initPrices[0][i]+'</div>'+
                '<div class="col-2"><b class="bold-name-2">Vehicle class</b><b class="bold">: </b>'+initPrices[1][i]+'</div>'+
                '<div class="col-3"><b class="bold-name-2">Price (LKR)</b><b class="bold">: </b><input disabled="true" type="text" id="eprice'+initPrices[4][i]+'" value="'+initPrices[3][i]+'"></div>'+
                '<div class="col-4"><button id="Ee'+initPrices[4][i]+'" class="edit" onclick ="editExtra('+initPrices[4][i]+')">Edit</button><button id="E'+initPrices[4][i]+'"  class="save-small-deactivate" onclick ="saveExtra('+initPrices[4][i]+')">Save</button><button id="ce'+initPrices[4][i]+'" class="cancel-small-deactivate" onclick ="cancelExtra('+initPrices[4][i]+')">Cancel</button></div>'+
                '</div>' 

               

            }

            
        }
    }


    let url ="http://localhost/project/Admin/loadInitPrices";
    httpreq.open("post", url, true);
    httpreq.send();
}
loadInitPrices()
loadPackages()

function editInit(id){

    document.getElementById('I'+id).classList.replace("save-small-deactivate","save-small")
    document.getElementById('Ii'+id).classList.replace("edit","edit-deactivate")
    document.getElementById('ci'+id).classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('iprice'+id).disabled = false;
    document.getElementById('iprice'+id).style.border = "2px solid #555555";
    document.getElementById('iprice'+id).style.borderRadius = "3px"

}

function cancelInit(id){
    document.getElementById('I'+id).classList.replace("save-small","save-small-deactivate")
    document.getElementById('Ii'+id).classList.replace("edit-deactivate","edit")
    document.getElementById('ci'+id).classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('iprice'+id).disabled = true;
    document.getElementById('iprice'+id).style.border = "none";
}

function editExtra(id){
    document.getElementById('E'+id).classList.replace("save-small-deactivate","save-small")
    document.getElementById('Ee'+id).classList.replace("edit","edit-deactivate")
    document.getElementById('ce'+id).classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('eprice'+id).disabled = false;
    document.getElementById('eprice'+id).style.border = "2px solid #555555";
    document.getElementById('eprice'+id).style.borderRadius = "3px"
}

function cancelExtra(id){
    document.getElementById('E'+id).classList.replace("save-small","save-small-deactivate")
    document.getElementById('Ee'+id).classList.replace("edit-deactivate","edit")
    document.getElementById('ce'+id).classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('eprice'+id).disabled = true;
    document.getElementById('eprice'+id).style.border = "none";
}


function saveInit(id){
    
    let iprice = document.getElementById('iprice'+id+'').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/packages");
            }
            
        }
    }
    let initPrice = [id,iprice]
    var url="http://localhost/project/Admin/editInitPrices/"+initPrice;
    httprequest.open("POST",url,true)
    httprequest.send()
}

function saveExtra(id){
    let iprice = document.getElementById('eprice'+id+'').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/packages");
            }
            
        }
    }
    let initPrice = [id,iprice]
    var url="http://localhost/project/Admin/editExtraPrices/"+initPrice;
    httprequest.open("POST",url,true)
    httprequest.send()
}