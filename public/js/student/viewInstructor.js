
function loadPreSelectedInstructors(){
    console.log("hi")
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows")
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("count").innerHTML=obj.length
            for(var i=0;i<obj.length;i++){
                obj[i].name = obj[i].name.replace(/-/g, " ");
            }
            for(var i=0;i<obj.length;i++){
                rows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">'+obj[i].employee_id+'</div>'+
                        '<div class="two">'+obj[i].name+'</div>'+
                        '<div class="three">'+obj[i].job_title+'</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
            }

        }
    }
    let url="http://localhost/project/Student/loadPreSelectedInstructors/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedInstructors()