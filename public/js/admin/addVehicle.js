function VehicleClassesByName(){
    const option = document.getElementById("vehicleClassByName");
    let httpreq =new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const vehicleClass = JSON.parse(httpreq.responseText);
            var value=[]
            // console.log(vehicleClass[1]["vehicle_class"]);
            for(i=0;i<vehicleClass.length;i++){
                value[i]=vehicleClass[i].replace(/\s+/g, '~');
                option.innerHTML+=`<option value=`+value[i]+`>`+vehicleClass[i]+`</option>`
            }

        }
    }

    let url ="http://localhost/project/Admin/VehicleClassesByName"
    httpreq.open("post" , url ,true)
    httpreq.send();
}



VehicleClassesByName()


function addVehicle(){
    var vehicleNo=document.getElementById("vehicle-num").value;
    var type=document.getElementById("vehicleClassByName").value;

    if(false){
        alert("j");
    }
    else{
        let httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function(){
            if(httpreq.readyState === 4 && httpreq.status ===200){
                if(httpreq.responseText=="successfull"){
                    // alert("hi")
                    window.location.assign('http://localhost/project/Admin/vehicles')
                }
            }
        }

        let data = [vehicleNo,type]
        let url = "http://localhost/project/Admin/addVehiclelogic/"+data;
        httpreq.open("post" , url ,true)
        httpreq.send();
    }
    
}