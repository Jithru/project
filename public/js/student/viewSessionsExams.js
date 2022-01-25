
function viewExam(id){
    window.location.href="http://localhost/project/Student/viewExam/"+id 
}
function viewSession(id){
    window.location.href="http://localhost/project/Student/viewSession/"+id
}
function requestExam(id){
    document.getElementById("confirmation").classList.replace('confirmation-box','confirmation-box-active')
    
    document.getElementById("confirm").addEventListener('click',function(){
        let httpreq=new XMLHttpRequest()
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState===4 && httpreq.status===200){
                if(httpreq.responseText=="false"){
                    document.getElementById("confirmation2").classList.replace("confirmation-box","confirmation-box-active")
                    document.getElementById("confirm-got").addEventListener('click',function(){
                        document.getElementById("confirmation2").classList.replace("confirmation-box-active","confirmation-box")
                    });
                }
            }
        }
        url="http://localhost/project/Student/requestExam/"+id
        httpreq.open("POST",url,true)
        httpreq.send()
        console.log(id)
        document.getElementById("confirmation").classList.replace('confirmation-box-active','confirmation-box')
    });


}
function requestSession(id){
    document.getElementById("confirmation").classList.replace('confirmation-box','confirmation-box-active')
    
    document.getElementById("confirm").addEventListener('click',function(){
        let httpreq=new XMLHttpRequest()
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState===4 && httpreq.status===200){
                if(httpreq.responseText=="false"){
                    document.getElementById("confirmation2").classList.replace("confirmation-box","confirmation-box-active")
                    document.getElementById("confirm-got").addEventListener('click',function(){
                        document.getElementById("confirmation2").classList.replace("confirmation-box-active","confirmation-box")
                    });
                }
            }
        }
        url="http://localhost/project/Student/requestSession/"+id
        httpreq.open("POST",url,true)
        httpreq.send()
        console.log(id)
        document.getElementById("confirmation").classList.replace('confirmation-box-active','confirmation-box')
    
    });
}
function cancel(){
    document.getElementById("confirmation").classList.replace('confirmation-box-active','confirmation-box')
}

