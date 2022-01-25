function getInitialExpenses(){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            let rows=document.getElementById("tablerows")

            let myArr=[]
            for(var i=0;i<obj.length;i++){
                let str=String(obj[i].date_time)
                myArr[i] = str.split(" ");
            }

            for(var i=0;i<obj.length;i++){
                obj[i].init_name=obj[i].init_name.replace(/-/g, " ")
                if(obj[i].status=="not accepted"){
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="three">'+myArr[i][0]+'</div>'+
                            '<div class="four">'+myArr[i][1]+'</div>'+
                            '<div class="five">'+obj[i].amount+'</div>'+
                            '<div class="six"><button class="done-button" onclick=acceptExpense('+obj[i].student_id+')>Done</button></div>'+
                    '</div>'+
                '</div>'
                }
                else{
                    rows.innerHTML+='<div class="row">'+
                    '<div class="cell">'+
                        '<div class="information">'+
                            '<div class="one">ST_'+obj[i].student_id+'</div>'+
                            '<div class="two">'+obj[i].init_name+'</div>'+
                            '<div class="three">'+myArr[i][0]+'</div>'+
                            '<div class="four">'+myArr[i][1]+'</div>'+
                            '<div class="five">'+obj[i].amount+'</div>'+
                            '<div class="six"><div class="accept-text">Accepted</div></div>'+
                    '</div>'+
                '</div>'+
                '</div>'
                }
            }
        }
    }
let url = "http://localhost/project/IncomeExpenses/getStudentExpenses";

httpreq.open( "POST" , url  , true);
httpreq.send();
}


getInitialExpenses()

let temp=""
function acceptExpense(studentId){
    let httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            temp=httpreq.responseText
            window.location.href="http://localhost/project/IncomeExpenses/studentExpenses/"
            console.log(temp)
        }
    }
    let url = "http://localhost/project/IncomeExpenses/acceptExpense/"+studentId;

    httpreq.open( "POST" , url  , true);
    httpreq.send();
}