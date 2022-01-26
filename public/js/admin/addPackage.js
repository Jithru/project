function getDetails(){
    let httprequest =new XMLHttpRequest();
    let checkBox = document.getElementById('classes-edit')
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            const classes = JSON.parse(httprequest.responseText)
            console.log(classes)
            

            for(i=0; i<classes.length; i++){
                checkBox.innerHTML+=' <div class="chk-bx">'+
                '<input type="checkbox" id="'+classes[i].vehicle_class+'"  value="'+classes[i].vehicle_class_id+'">'+
                '<label for="vehicle1">'+classes[i].vehicle_class+' </label><br>'+
                '</div>'
  
            }
        }
    }
    
    var url="http://localhost/project/Admin/getClasses";
    httprequest.open("POST",url,true)
    httprequest.send()
    
}
getDetails()

function addPackage(){
    const pName = document.getElementById('package-name').value
    const pDays = document.getElementById('training-days').value
    const PPrice = document.getElementById('total-price').value

        const classes = ['A','A-Auto','B1','B','B-Auto']
        let selected = []
        for(i=0; i<classes.length; i++){
            if(document.getElementById(classes[i]).checked == true){
                selected.push(document.getElementById(classes[i]).value)
            }
        }

    let httprequest =new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            
        }
    }
    const data = [pName,pDays,PPrice]
    for(i=0;i<selected.length;i++){
        data.push(selected[i])
    }
    // console.log(data)
    var url="http://localhost/project/Admin/addPackageLogic/"+data;
    httprequest.open("POST",url,true)
    httprequest.send()
}