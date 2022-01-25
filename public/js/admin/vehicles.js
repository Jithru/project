function loadVehicles(){
    
    let httpreq = new XMLHttpRequest()
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState == 4 && httpreq.status == 200){
            const vehicle = JSON.parse(httpreq.responseText)
            for(i=0;i<vehicle.length;i++){
                const row = document.getElementById("rows");
                // console.log(vehicle[i].added_date_time)
                row.innerHTML += '<div class="row">'+
                '<div class="coll-1" ><b class="bold-name-2">Vehicle ID</b><b class="bold">: </b>V_'+vehicle[i].vehicle_id+'</div>'+
                '<div class="coll-2"><b class="bold-name-2">Vehicle Type</b><b class="bold">: </b>'+vehicle[i].vehicle_type+'</div>'+
                '<div class="coll-3"><b class="bold-name-2">Vehicle class</b><b class="bold">: </b>'+vehicle[i].vehicle_class+'</div>'+
                '<div class="coll-4"><b class="bold-name-2">Vehicle Number</b><b class="bold">: </b>'+vehicle[i].vehicle_no+'</div>'+
                '<div class="coll-5"><b class="bold-name-2">Added Date</b><b class="bold">: </b>'+vehicle[i].added_date_time+'</div>'+
                '<div class="coll-6"><button class="row-delete" onclick ="deletex()">Delete</button></div>'+
            '</div>'
            }
        }
    }


    let url ="http://localhost/project/Admin/loadVehicle";
    httpreq.open("post", url, true);
    httpreq.send();
}

loadVehicles()