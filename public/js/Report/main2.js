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
            for(i=0;i<data[0].length;i++){
                rows.innerHTML+='<div class="row">'
                +'<div class="col-1">'+data[0][i]['student_id']+'</div>'
                +'<div class="col-2">'+data[0][i]['init_name']+'</div>'
                +'<div class="col-3">'+data[0][i]['student_status']+'</div>'
                +'<div class="col-4">'+data[0][i]['total_assigns']+'</div>'
                +'<div class="col-5">'+data[1][i][0]['part']+'</div>'
            +'</div>'
            }

        }
    }

    let url ="http://localhost/project/Report/loadAtStudent/"+method+"/"+period
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

function back(){
    document.getElementById('container').classList.replace('container-print','container')
    document.getElementById('print').classList.replace('print-deactive','print')
    document.getElementById('downld').classList.replace('downld-active','downld')
    document.getElementById('backk').classList.replace('backk-active','backk')
}

