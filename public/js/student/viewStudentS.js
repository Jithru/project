let sessionID=document.getElementById("idContainer").value
function loadPreSelectedStudents(){
    console.log("hi")
    let count=0
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            let rows=document.getElementById("tableRows")
            const obj=JSON.parse(httpreq.responseText)
            
            for(var i=0;i<obj.length;i++){
                obj[i].init_name = obj[i].init_name.replace(/-/g, " ");
            }
            var myArr=[]
            for(var i=0;i<obj.length;i++){
                myArr[i] = obj[i].session_IDs.split(",");
            }
            for(var i=0;i<obj.length;i++){
                // console.log(myArr[i])
                if(myArr[i].includes(sessionID)){
                    count=count+1
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="three">'+obj[i].total_assigns+'/20</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                }
                
            }

        }
        document.getElementById("count").innerHTML=count
    }
    let url="http://localhost/project/Student/loadPreSelectedStudentsS/"
    httpreq.open("POST",url,true)
    httpreq.send()
}
loadPreSelectedStudents()