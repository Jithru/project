function format(){
    document.getElementById('container').classList.replace('container','container-print')
    document.getElementById('print').classList.replace('print','print-deactive')
    document.getElementById('downld').classList.replace('downld','downld-active')
    document.getElementById('backk').classList.replace('backk','backk-active')
}


function selectMethod(){
    const method = document.getElementById("methodSelector").value;
    var inpt = document.getElementById("dateContainer");
    const label=document.getElementById("lbl");
    if(method=="Weekly"){
        inpt.type="week";
        label.innerText="Select Week:"
    }
    else if(method=="Monthly"){
        inpt.type="month";
        label.innerText="Select Month:"
    }
    else if(method=="Annualy"){
        inpt.type="number";
        label.innerText="Select Year:"

    }
    // const period = document.getElementById("")
}




window.onload = function () {
    document.getElementById("downld")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("container");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: -1,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}


function loadTable(method,period){
    const rows = document.getElementById("table-body");
    let httpreq =new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const data = JSON.parse(httpreq.responseText);
            // console.log(vehicleClass[1]["vehicle_class"]);
            var assignStudent = [];
            var partiStudent = [];

            for(i=0;i<data[0].length;i++){
                assignStudent[i]=0;
                for(j=0;j<data[1].length;j++){
                    if(data[0][i]['session_id']==data[1][j]['session_id']){
                        assignStudent[i]=data[1][j]['assignSTcount']
                    }
                }
            }

            for(i=0;i<data[0].length;i++){
                partiStudent[i]=0;
                for(j=0;j<data[2].length;j++){
                    if(data[0][i]['session_id']==data[2][j]['session_id']){
                        partiStudent[i]=data[2][j]['partSTcount']
                    }
                }
            }
            

            for(i=0;i<data[0].length;i++){
                rows.innerHTML+='<div class="row">'
                +'<div class="cel-1">'+data[0][i]['session_id']+'</div>'
                +'<div class="cel-2">'+data[0][i]['session_title']+'</div>'
                +'<div class="cel-3">'+data[0][i]['session_date']+'</div>'
                +'<div class="cel-4">'+data[0][i]['session_time']+'</div>'
                +'<div class="cel-5">'+assignStudent[i]+'</div>'
                +'<div class="cel-6">'+partiStudent[i]+'</div>'
            +'</div>'
            }
            var totalAssign=0
            var totalPart=0
            var avgPart=0

            for(i=0;i<data[0].length;i++){
                
                totalAssign+=parseInt(assignStudent[i])
                totalPart+=parseInt(partiStudent[i])
            }

            avgPart=totalPart/data[0].length;
            console.log(totalAssign)
            console.log(totalPart)
            console.log(avgPart)

        }
    }

    let url ="http://localhost/project/Report/loadAtSession/"+method+"/"+period
    httpreq.open("post" , url ,true)
    httpreq.send();
}

loadTable("none","all")


function filter(){
    const method = document.getElementById("methodSelector").value;
    var period = document.getElementById("dateContainer").value;
    const rows = document.getElementById("table-body");
    if(period==""){
        if(method=="Weekly"){
            alert("Please select a week")
        }
        else if(method=="Monthly"){
            alert("Please select a month")
        }
        else if(method=="Annualy"){
            alert("Please select a year")
        }
    }
    else{
        rows.innerHTML=""
        loadTable(method,period)
    }
    
}