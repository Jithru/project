function loadPreSelectedVehicles(){
    console.log("hi")
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows")
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("count").innerHTML=obj.length
            for(var i=0;i<obj.length;i++){
                obj[i].vehicle_type = obj[i].vehicle_type.replace(/-/g, " ");
                obj[i].vehicle_no = obj[i].vehicle_no.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">V_'+obj[i].vehicle_id+'</div>'+
                        '<div class="two">'+obj[i].vehicle_no+'</div>'+
                        '<div class="three">'+obj[i].vehicle_class+'</div>'+
                        '<div class="four">'+obj[i].vehicle_type+'</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
            }
        }
    }
    let url="http://localhost/project/Receptionist/loadPreSelectedVehiclesS/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedVehicles()