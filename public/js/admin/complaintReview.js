function viewComplaint(){
    const row=document.getElementById("msgBox")
    let httprequest= new XMLHttpRequest();
    console.log("AAAAA")
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log("Hi")
            console.log(httprequest.responseText)
            const obj=JSON.parse(httprequest.responseText)
            for(var i=0;i<obj.length;i++){
                
                obj[i].description = obj[i].description.replace(/-/g, " ");
                obj[i].suggestions =obj[i].suggestions.replace(/-/g, " ");
                obj[i].init_name =obj[i].init_name.replace(/-/g, " ");
                
                if(obj[i].suggestions==''){
                    obj[i].suggestions="Description is not available"
                }
            }
            
            var myArr=[]
            for(var i=0;i<obj.length;i++){
                let str=String(obj[i].submitted_date_time)
                myArr[i] = str.split(" ");
            }

            for(var i=0; i<obj.length; i++){
                row.innerHTML+='<div class="msg-box-row">'+
                '<div class="msg-title"><h2>'+obj[i].init_name+'</h2></div>'+
                '<div class="msg-date"><h4>'+myArr[i][0]+'</h4><h5>'+myArr[i][1]+'</h5></div>'+

                '<h3>Complain</h3>'+
                '<p>'+ obj[i].description+'</p>'+
                '<h3>Suggetion</h3>'+
                '<p>'+obj[i].suggestions+'</p>'+

                '<div class="msg-btn"><button class="mark-as-read">Mark as read</button></div>'+

            '</div>'

            }
        }
    }
    var url="http://localhost/project/Admin/complaintLogic";
    httprequest.open("POST",url,true)
    httprequest.send()

}
viewComplaint()

