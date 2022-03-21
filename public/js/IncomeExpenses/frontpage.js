function loadType(){
    let methodSelector=document.getElementById("methodSelector")
    methodSelector.innerHTML='<option value="Annualy">Annualy</option>'+
                            '<option value="Monthly">Monthly</option>'+
                            '<option value="Weekly">Weekly</option>'
                            

    let content=document.getElementById("dateSelector")
    content.innerHTML='<label for="date-container" class="date-container-label">Select Week:  </label>'+
    '<input type="week" class="date-container" name="dateContainer" id="dateContainer">'
}
loadType()
function inputSelector(){
    let type=document.getElementById("methodSelector").value
    let content=document.getElementById("dateSelector")
    if(type=="Weekly"){
        content.innerHTML='<label for="date-container" class="date-container-label">Select Week:  </label>'+
                        '<input type="week" class="date-container" name="dateContainer" id="dateContainer">'
    }else if(type=="Monthly"){
        content.innerHTML='<label for="date-container" class="date-container-label">Select Month:  </label>'+
                            '<input type="Month" class="date-container" name="dateContainer" id="dateContainer">'
    }else{
        content.innerHTML='<label for="date-container" class="date-container-label">Select Year:  </label>'+
                            '<select class="date-container" name="dateContainer" id="dateContainer"></select>'
        
        let currentYear=new Date().getFullYear()

        let dateContainer=document.getElementById("dateContainer")

        for(var i=2000;i<=currentYear;i++){
            dateContainer.innerHTML+='<option value="'+i+'">'+i+'</option>'
        }
        document.getElementById("dateContainer").value=new Date().getFullYear()
    }
}
inputSelector()

function loadInitDetails(){
    let type=document.getElementById("methodSelector").value
    if(type=="Monthly"){
        loadDataMonthly()
    }else if(type=="Weekly"){
        loadDataWeekly()
    }else{
        loadDataAnnualy()
    }
}
loadInitDetails()
function loadDataWeekly(){
    let content=document.getElementById("dateContainer").value
    console.log(content)
    let httpreq=new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState==4 && httpreq.status===200){
            console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("incomeVal").innerHTML='LKR '+obj['income']+'.00'
            document.getElementById("expenseVal").innerHTML='LKR '+obj['expense']+'.00'
        }
    }
    let url="http://localhost/project/IncomeExpenses/loadfrontBoxWeek/"+content;
    httpreq.open( "POST" , url  , true);

    httpreq.send();
}
function loadDataMonthly(){
    let content=document.getElementById("dateContainer").value
    console.log(content)
    let httpreq=new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState==4 && httpreq.status===200){
            console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("incomeVal").innerHTML='LKR '+obj['income']+'.00'
            document.getElementById("expenseVal").innerHTML='LKR '+obj['expense']+'.00'
        }
    }
    let url="http://localhost/project/IncomeExpenses/loadfrontBoxMonth/"+content;
    httpreq.open( "POST" , url  , true);

    httpreq.send();
}
function loadDataAnnualy(){
    let content=document.getElementById("dateContainer").value
    console.log(content)
    let httpreq=new XMLHttpRequest();
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState==4 && httpreq.status===200){
            console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            document.getElementById("incomeVal").innerHTML='LKR '+obj['income']+'.00'
            document.getElementById("expenseVal").innerHTML='LKR '+obj['expense']+'.00'
        }
    }
    let url="http://localhost/project/IncomeExpenses/loadfrontBoxAnnual/"+content;
    httpreq.open( "POST" , url  , true);

    httpreq.send();
}