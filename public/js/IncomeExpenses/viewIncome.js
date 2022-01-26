function getPaymentDetails(){
    let httpreq=new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            const sortByDate=obj=>{
                const sorter=(a,b)=>{
                    return new Date(a.payment_date_time)-new Date(b.payment_date_time);
                }
                return obj.sort(sorter)
            }
            sortByDate(obj)
            let tableRows=document.getElementById("tableRows")
            var myArr=[]
            for(var i=0;i<obj.length;i++){
                let str=String(obj[i].payment_date_time)
                myArr[i] = str.split(" ");
            }
            let method;
            for(var i=0;i<obj.length;i++){
                obj[i].init_name =obj[i].init_name.replace(/-/g, " ");
                if(typeof obj[i].cpayment_id==='undefined'){
                    method="Online"
                }else{
                    method="Cash"
                }
                tableRows.innerHTML+='<div class="row">'+
                '<div class="cell">'+
                    '<div class="information">'+
                        '<div class="one">In_'+(i+1)+'</div>'+
                        '<div class="two">'+method+'</div>'+
                        '<div class="three">'+obj[i].init_name+'</div>'+
                        '<div class="four">'+myArr[i][0]+'</div>'+
                        '<div class="five">'+myArr[i][1]+'</div>'+
                       '<div class="six">'+obj[i].amount+'</div>'+
                    '</div>'+ 
                '</div>'+
            '</div>'
            }
        }
    }
    let url="http://localhost/project/IncomeExpenses/getIncomeDetails"
    httpreq.open("POST",url,true)
    httpreq.send()
}
getPaymentDetails()