
function savePname(){
    const pname = document.getElementById('package-name-edit').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/editPackages");
            }
            
        }
    }
    
    var url="http://localhost/project/Admin/editPackageName/"+pname;
    httprequest.open("POST",url,true)
    httprequest.send()
}

// function savePclass(){
//     const classes = ['A','A-Auto','B1','B','B-Auto']
//     let selected = []
//     for(i=0; i<classes.length; i++){
//         if(document.getElementById(classes[i]).checked == true){
//             selected.push(document.getElementById(classes[i]).value)
//         }
//     }
//     let httprequest = new XMLHttpRequest();
//     httprequest.onreadystatechange = function(){
//         if (httprequest.readyState===4 && httprequest.status===200){
//             console.log(httprequest.responseText)
//             if(httprequest.responseText=="success"){
//                 window.location.assign("http://localhost/project/Admin/editPackages");
//             }
            
//         }
//     }
    
//     var url="http://localhost/project/Admin/editPackageClasses/"+selected;
//     httprequest.open("POST",url,true)
//     httprequest.send()
    


// }


function savePamount(){
    const pamount = document.getElementById('total-price-edit').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/editPackages");
            }
            
        }
    }
    var url="http://localhost/project/Admin/editPackagePrices/"+pamount;
    httprequest.open("POST",url,true)
    httprequest.send()
}
function savePdays(){
    const pdays = document.getElementById('training-days-edit').value
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            if(httprequest.responseText=="success"){
                window.location.assign("http://localhost/project/Admin/editPackages");
            }
            
        }
    }
    var url="http://localhost/project/Admin/editPackageDays/"+pdays;
    httprequest.open("POST",url,true)
    httprequest.send()
}




function getDetails(){
    
    let checkBox = document.getElementById('classes-edit')
    let namep = document.getElementById('p-name')
    let amountp = document.getElementById('p-amount')
    let daysp = document.getElementById('p-days')
    let httprequest  = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            // console.log(httprequest.responseText)
            const Data = JSON.parse(httprequest.responseText)
            const classes = Data[0]
            const package = Data[1]
            console.log(classes)
            console.log(package)
            const vClass = package[0].classes.split(",")


            // console.log(vClass)
            namep.innerHTML+='<input type="text"  class="package-name-edit" id="package-name-edit"  value="'+package[0].type+'" disabled>'
            amountp.innerHTML+='<input type="number"  class="total-price-edit" id="total-price-edit"  value="'+package[0].amount+'" disabled>'
            daysp.innerHTML+='<input type="number"  class="training-days-edit" id="training-days-edit"  value="'+package[0].training_days+'" disabled>'
            
            
            
            for(i=0; i<classes.length; i++){
                
                let j=0
                let flag = 0
                while(j<vClass.length || classes[i].vehicle_class==vClass[j]){
                    if(classes[i].vehicle_class==vClass[j]){
                        checkBox.innerHTML+=' <div class="chk-bx">'+
                    '<input type="checkbox" id="'+classes[i].vehicle_class+'"  value="'+classes[i].vehicle_class+'" checked>'+
                    '<label for="vehicle1">'+classes[i].vehicle_class+' </label><br>'+
                    '</div>'
                    flag=1
                    }

                    else if(j==vClass.length-1 && flag==0){
                        checkBox.innerHTML+=' <div class="chk-bx">'+
                    '<input type="checkbox" id="'+classes[i].vehicle_class+'"  value="'+classes[i].vehicle_class+'">'+
                    '<label for="vehicle1">'+classes[i].vehicle_class+' </label><br>'+
                    '</div>'
                    }

                    j++;
                }
                

                document.getElementById(classes[i].vehicle_class).disabled = true
            }

            

            //save buttons
            
            
            
        }
    }
    
    var url="http://localhost/project/Admin/editDetails";
    httprequest.open("POST",url,true)
    httprequest.send()

    
}
getDetails()


function editPname(){
    
    document.getElementById("p-name-s").classList.replace("save-small-deactivate","save-small")
    document.getElementById("p-name-e").classList.replace("edit","edit-deactivate")
    document.getElementById("responsive-name").classList.replace("responsive","responsive-active")
    document.getElementById("p-name-c").classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('package-name-edit').disabled = false;
    document.getElementById('package-name-edit').style.border = "2px solid #555555";
    document.getElementById('package-name-edit').style.borderRadius = "3px"

}

function cancelPname(){
    document.getElementById("p-name-s").classList.replace("save-small","save-small-deactivate")
    document.getElementById("p-name-e").classList.replace("edit-deactivate","edit")
    document.getElementById("responsive-name").classList.replace("responsive-active","responsive")
    document.getElementById("p-name-c").classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('package-name-edit').disabled = true;
    document.getElementById('package-name-edit').style.border = "none";
    window.location.assign("http://localhost/project/Admin/editPackages");
}

// function editPclass(){
//     document.getElementById("p-class-s").classList.replace("save-small-deactivate","save-small")
//     document.getElementById("p-class-e").classList.replace("edit","edit-deactivate")
//     document.getElementById("responsive-class").classList.replace("responsive","responsive-active")
//     document.getElementById("p-class-c").classList.replace("cancel-small-deactivate","cancel-small")
//     const classes = ['A','A-Auto','B1','B','B-Auto']
//     for(i=0; i<classes.length; i++){
//         document.getElementById(classes[i]).disabled = false
//     }
//     // document.getElementById('iprice'+id).disabled = true;
//     // document.getElementById('iprice'+id).style.border = "none";
// }

// function cancelPclass(){
//     document.getElementById("p-class-s").classList.replace("save-small","save-small-deactivate")
//     document.getElementById("p-class-e").classList.replace("edit-deactivate","edit")
//     document.getElementById("responsive-class").classList.replace("responsive-active","responsive")
//     document.getElementById("p-class-c").classList.replace("cancel-small","cancel-small-deactivate")
//     const classes = ['A','A-Auto','B1','B','B-Auto']
//     for(i=0; i<classes.length; i++){
//         document.getElementById(classes[i]).disabled = true
//     }
//     window.location.assign("http://localhost/project/Admin/editPackages");
//     // document.getElementById('iprice'+id).disabled = true;
//     // document.getElementById('iprice'+id).style.border = "none";
// }

function editPdays(){
    document.getElementById("p-day-s").classList.replace("save-small-deactivate","save-small")
    document.getElementById("p-day-e").classList.replace("edit","edit-deactivate")
    document.getElementById("responsive-day").classList.replace("responsive","responsive-active")
    document.getElementById("p-day-c").classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('training-days-edit').disabled = false;
    document.getElementById('training-days-edit').style.border = "2px solid #555555";
    document.getElementById('training-days-edit').style.borderRadius = "3px"
}

function cancelPdays(){
    document.getElementById("p-day-s").classList.replace("save-small","save-small-deactivate")
    document.getElementById("p-day-e").classList.replace("edit-deactivate","edit")
    document.getElementById("responsive-day").classList.replace("responsive-active","responsive")
    document.getElementById("p-day-c").classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('training-days-edit').disabled = true;
    document.getElementById('training-days-edit').style.border = "none";
    window.location.assign("http://localhost/project/Admin/editPackages");
}


function editPamount(){
    document.getElementById("p-amount-s").classList.replace("save-small-deactivate","save-small")
    document.getElementById("p-amount-e").classList.replace("edit","edit-deactivate")
    document.getElementById("responsive-amount").classList.replace("responsive","responsive-active")
    document.getElementById("p-amount-c").classList.replace("cancel-small-deactivate","cancel-small")
    document.getElementById('total-price-edit').disabled = false;
    document.getElementById('total-price-edit').style.border = "2px solid #555555";
    document.getElementById('total-price-edit').style.borderRadius = "3px"
}

function cancelPamount(){
    document.getElementById("p-amount-s").classList.replace("save-small","save-small-deactivate")
    document.getElementById("p-amount-e").classList.replace("edit-deactivate","edit")
    document.getElementById("responsive-amount").classList.replace("responsive-active","responsive")
    document.getElementById("p-amount-c").classList.replace("cancel-small","cancel-small-deactivate")
    document.getElementById('total-price-edit').disabled = true;
    document.getElementById('total-price-edit').style.border = "none";
    window.location.assign("http://localhost/project/Admin/editPackages");
}



