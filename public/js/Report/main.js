function format(){
    document.getElementById('container').classList.replace('container','container-print')
    document.getElementById('print').classList.replace('print','print-deactive')
    document.getElementById('downld').classList.replace('downld','downld-active')
    document.getElementById('backk').classList.replace('backk','backk-active')
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


function loadTable(){
    const rows = document.getElementById("table-body");
    let httpreq =new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        if(httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const data = JSON.parse(httpreq.responseText);
            // console.log(vehicleClass[1]["vehicle_class"]);
            for(i=0;i<data.length;i++){
                rows.innerHTML+='<div class="row">'
                +'<div class="cel-1">'+data[i]['session_id']+'</div>'
                +'<div class="cel-2">'+data[i]['session_title']+'</div>'
                +'<div class="cel-3">'+data[i]['session_date']+'</div>'
                +'<div class="cel-4">'+data[i]['session_time']+'</div>'
                +'<div class="cel-5">'+data[i]['session_id']+'</div>'
                +'<div class="cel-6">'+data[i]['session_id']+'</div>'
            +'</div>'
            }

        }
    }

    let url ="http://localhost/project/Report/loadAtSession"
    httpreq.open("post" , url ,true)
    httpreq.send();
}

loadTable()