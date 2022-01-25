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
function expenseGraph(){
    let content=new Date().getFullYear()
        let httpreq=new XMLHttpRequest()
        // console.log(content)
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState==4 && httpreq.status===200){
                console.log(httpreq.responseText)
                const obj=JSON.parse(httpreq.responseText)
                // console.log(obj[0][0].total)
                let label2=['January','February','March','April','May','June','July','August','September','October','November','December'];
                let data1=[];
                for(i=0;i<12;i++){
                    data1[i]=obj[i] 
                }
                
                let colors2=['#0892d0','#0892d0'];
                
                let mychart=document.getElementById("expenseChart").getContext('2d');
                let chart2= new Chart(mychart, {
                    type: 'bar',
                    
                    data:{
                        labels: label2,
                        datasets: [{
                            label:"Amount of Expenses",
                            data: data1,
                            backgroundColor: colors2,
                        }]
                    },
                    options:{
                        title:{
                            text:"hi,this is test",
                            display: true
                        },
                        responsive:true
                    }
                    
                });
                document.getElementById("go").addEventListener('click',function(){
                    chart2.destroy()
                });
            }
        }
        let url = "http://localhost/project/IncomeExpenses/loadGraphAnnual/"+content;

        httpreq.open( "POST" , url  , true);

        httpreq.send();

        inputSelector()
        document.getElementById("dateContainer").value=new Date().getFullYear()
        loadBoxContentAnnual(content);
}
expenseGraph()
function loadBoxContentWeek(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            
            let maxTotalExpense=document.getElementById("maxTotalExpense")
            let minTotalExpense=document.getElementById("minTotalExpense")
            let average=document.getElementById("average")
            let noOfExpenses=document.getElementById("noOfExpenses")
            let maxNoExpensesDays=document.getElementById("maxNoExpensesDays")
            let minNoExpensesDays=document.getElementById("minNoExpensesDays")
            let maxNoExpenses=document.getElementById("maxNoExpenses")
            let minNoExpenses=document.getElementById("minNoExpenses")
            let totalInitExpenses=document.getElementById("totalInitExpenses")
            let totalOtherExpenses=document.getElementById("totalOtherExpenses")

            maxTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalEx']+'.00</h3></div>'
            minTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalEx']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgEx'].toFixed(2)+'</h3></div>'
            noOfExpenses.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoExpensesDays.innerHTML=""
            maxNoExpensesDays.innerHTML=""
            
            let dates=['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
            for(var i=0;i<obj['maxValDates'].length;i++){
                
                if(i==obj['maxValDates'].length-1){
                    maxNoExpensesDays.innerHTML+=dates[obj['maxValDates'][i]-1]
                }
                else{
                    maxNoExpensesDays.innerHTML+=dates[obj['maxValDates'][i]-1]+','
                }
            }
            for(var i=0;i<obj['minValDates'].length;i++){
                
                if(i==obj['minValDates'].length-1){
                    minNoExpensesDays.innerHTML+=dates[obj['minValDates'][i]-1]
                }
                else{
                    minNoExpensesDays.innerHTML+=dates[obj['minValDates'][i]-1]+','
                }
            }
            maxNoExpenses.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoExpenses.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalInitExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['initExpenses']+'.00</h3></div>'
            totalOtherExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['otherExpenses']+'.00</h3></div>'
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadBoxesWeek/"+content;
    httpreq2.open("POST",url2,true)
    httpreq2.send()
}
function loadBoxContentMonth(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            
            let maxTotalExpense=document.getElementById("maxTotalExpense")
            let minTotalExpense=document.getElementById("minTotalExpense")
            let average=document.getElementById("average")
            let noOfExpenses=document.getElementById("noOfExpenses")
            let maxNoExpensesDays=document.getElementById("maxNoExpensesDays")
            let minNoExpensesDays=document.getElementById("minNoExpensesDays")
            let maxNoExpenses=document.getElementById("maxNoExpenses")
            let minNoExpenses=document.getElementById("minNoExpenses")
            let totalInitExpenses=document.getElementById("totalInitExpenses")
            let totalOtherExpenses=document.getElementById("totalOtherExpenses")

            maxTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalEx']+'.00</h3></div>'
            minTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalEx']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgEx'].toFixed(2)+'</h3></div>'
            noOfExpenses.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoExpensesDays.innerHTML=""
            maxNoExpensesDays.innerHTML=""
            var mincontainer=""
            var maxcontainer=""
            
            for(var i=0;i<obj['maxValDates'].length;i++){
                
                if(i==obj['maxValDates'].length-1){
                    maxcontainer+=obj['maxValDates'][i]
                }
                else{
                    maxcontainer+=obj['maxValDates'][i]+','
                }
            }
            for(var i=0;i<obj['minValDates'].length;i++){
                
                if(i==obj['minValDates'].length-1){
                    mincontainer+=obj['minValDates'][i]
                }
                else{
                    mincontainer+=obj['minValDates'][i]+','
                }
            }
            maxNoExpensesDays.innerHTML="Days: "+maxcontainer.slice(0,15)
            minNoExpensesDays.innerHTML="Days: "+mincontainer.slice(0,15)
            if(mincontainer.length>15){
                minNoExpensesDays.innerHTML+="..."
            }
            if(maxcontainer.length>15){
                maxNoExpensesDays.innerHTML+="..."
            }

            maxNoExpenses.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoExpenses.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalInitExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['initExpenses']+'.00</h3></div>'
            totalOtherExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['otherExpenses']+'.00</h3></div>'
            
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadBoxesMonth/"+content;
    httpreq2.open("POST",url2,true)
    httpreq2.send()
}
function loadBoxContentAnnual(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            let maxTotalExpense=document.getElementById("maxTotalExpense")
            let minTotalExpense=document.getElementById("minTotalExpense")
            let average=document.getElementById("average")
            let noOfExpenses=document.getElementById("noOfExpenses")
            let maxNoExpensesDays=document.getElementById("maxNoExpensesDays")
            let minNoExpensesDays=document.getElementById("minNoExpensesDays")
            let maxNoExpenses=document.getElementById("maxNoExpenses")
            let minNoExpenses=document.getElementById("minNoExpenses")
            let totalInitExpenses=document.getElementById("totalInitExpenses")
            let totalOtherExpenses=document.getElementById("totalOtherExpenses")

            maxTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalEx']+'.00</h3></div>'
            minTotalExpense.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalEx']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgEx'].toFixed(2)+'</h3></div>'
            noOfExpenses.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoExpensesDays.innerHTML=""
            maxNoExpensesDays.innerHTML=""
            var mincontainer=""
            var maxcontainer=""
            
            let months=['Jan','Feb','march','april','may','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
            for(var i=0;i<obj['maxValDates'].length;i++){
                
                if(i==obj['maxValDates'].length-1){
                    maxcontainer+=months[obj['maxValDates'][i]-1]
                }
                else{
                    maxcontainer+=months[obj['maxValDates'][i]-1]+','
                }
            }
            for(var i=0;i<obj['minValDates'].length;i++){
                
                if(i==obj['minValDates'].length-1){
                    mincontainer+=months[obj['minValDates'][i]-1]
                }
                else{
                    mincontainer+=months[obj['minValDates'][i]-1]+','
                }
            }
            maxNoExpensesDays.innerHTML=maxcontainer.slice(0,16)
            minNoExpensesDays.innerHTML=mincontainer.slice(0,16)
            if(mincontainer.length>16){
                minNoExpensesDays.innerHTML+="..."
            }
            if(maxcontainer.length>16){
                maxNoExpensesDays.innerHTML+="..."
            }

            maxNoExpenses.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoExpenses.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalInitExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['initExpenses']+'.00</h3></div>'
            totalOtherExpenses.innerHTML='<div class="amount"><h3>Rs. '+obj['otherExpenses']+'.00</h3></div>'
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadBoxesAnnual/"+content;
    httpreq2.open("POST",url2,true)
    httpreq2.send()

}
function loadGraph(){
    let type=document.getElementById("methodSelector").value
    if(type=="Weekly"){
        let content=document.getElementById("dateContainer").value
        if(content.length==0){
            document.getElementById("dateContainer").style.border="2px solid red"
            // document.getElementById("dateContainer").placeholder="Empty"
        }
        else{
            let httpreq=new XMLHttpRequest()
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    console.log(httpreq.responseText)
                    const obj=JSON.parse(httpreq.responseText)
                    // console.log(obj[0][0].total)
                    let label2=['Monday','Tuesday','WednesDay','Thursday','Friday','Saturday','Sunday'];
                    let data1=[obj[0],obj[1],obj[2],obj[3],obj[4],obj[5],obj[6]];
                    let colors2=['#0892d0','#0892d0'];
                    
                    let mychart=document.getElementById("expenseChart").getContext('2d');
                    let chart2= new Chart(mychart, {
                        type: 'bar',
                        
                        data:{
                            labels: label2,
                            datasets: [{
                                label:"Amount of Expenses",
                                data: data1,
                                backgroundColor: colors2,
                            }]
                        },
                        options:{
                            title:{
                                text:"hi,this is test",
                                display: true
                            },
                            responsive:true
                        }
                        
                    });
                    document.getElementById("go").addEventListener('click',function(){
                        chart2.destroy()
                    });
                }
            }
            let url = "http://localhost/project/IncomeExpenses/loadGraphWeek/"+content;
    
            httpreq.open( "POST" , url  , true);
    
            httpreq.send();
    
            loadBoxContentWeek(content);
        }

    }
    if(type=="Monthly"){
        let content=document.getElementById("dateContainer").value
        if(content.length==0){
            document.getElementById("dateContainer").style.border="2px solid red"
        }
        else{
            console.log(content)
            let httpreq=new XMLHttpRequest()
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState==4 && httpreq.status===200){
                    console.log(httpreq.responseText)
                    const obj=JSON.parse(httpreq.responseText)
                    // console.log(obj[0][0].total)
                    let label2=[];
                    let data1=[];
                    for(i=0;i<31;i++){
                        label2[i]=["day "+(i+1)]
                        data1[i]=obj[i]
                        
                    }
                    
                    let colors2=['#0892d0','#0892d0'];
                    
                    let mychart=document.getElementById("expenseChart").getContext('2d');
                    let chart2= new Chart(mychart, {
                        type: 'line',
                        
                        data:{
                            labels: label2,
                            datasets: [{
                                label:"Amount of Expenses",
                                data: data1,
                                backgroundColor: colors2,
                            }]
                        },
                        options:{
                            title:{
                                text:"hi,this is test",
                                display: true
                            },
                            responsive:true
                        }
                        
                    });
                    document.getElementById("go").addEventListener('click',function(){
                        chart2.destroy()
                    });
                }
            }
            let url = "http://localhost/project/IncomeExpenses/loadGraphMonth/"+content;
    
            httpreq.open( "POST" , url  , true);
    
            httpreq.send();
    
            loadBoxContentMonth(content)
        }

    }
    if(type=="Annualy"){
        let content=document.getElementById("dateContainer").value
        let httpreq=new XMLHttpRequest()
        // console.log(content)
        httpreq.onreadystatechange=function(){
            if(httpreq.readyState==4 && httpreq.status===200){
                console.log(httpreq.responseText)
                const obj=JSON.parse(httpreq.responseText)
                // console.log(obj[0][0].total)
                let label2=['January','February','March','April','May','June','July','August','September','October','November','December'];
                let data1=[];
                for(i=0;i<12;i++){
                    data1[i]=obj[i] 
                }
                
                let colors2=['#0892d0','#0892d0'];
                
                let mychart=document.getElementById("expenseChart").getContext('2d');
                let chart2= new Chart(mychart, {
                    type: 'bar',
                    
                    data:{
                        labels: label2,
                        datasets: [{
                            label:"Amount of Expenses",
                            data: data1,
                            backgroundColor: colors2,
                        }]
                    },
                    options:{
                        title:{
                            text:"hi,this is test",
                            display: true
                        },
                        responsive:true
                    }
                    
                });
                document.getElementById("go").addEventListener('click',function(){
                    chart2.destroy()
                });
            }
        }
        let url = "http://localhost/project/IncomeExpenses/loadGraphAnnual/"+content;

        httpreq.open( "POST" , url  , true);

        httpreq.send();

        loadBoxContentAnnual(content);
    }

}
