function loadVehihcleClasses(){
    const option = document.getElementById("vehicleClass");
    let httpreq =new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const vehicleClass = JSON.parse(httpreq.responseText);
            // console.log(vehicleClass[1]["vehicle_class"]);
            for(i=0;i<vehicleClass.length;i++){
                option.innerHTML+=`<option value=`+vehicleClass[i]["vehicle_class"]+`>`+vehicleClass[i]["vehicle_class"]+`</option>`
            }

        }
    }

    let url ="http://localhost/project/Admin/loadVehicleClasses"
    httpreq.open("post" , url ,true)
    httpreq.send();
}

loadVehihcleClasses()