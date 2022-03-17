
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
function incomeGraph(){
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
                
                let mychart=document.getElementById("incomeChart").getContext('2d');
                let chart2= new Chart(mychart, {
                    type: 'bar',
                    
                    data:{
                        labels: label2,
                        datasets: [{
                            label:"Amount of Income",
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
        let url = "http://localhost/project/IncomeExpenses/loadIncomeGraphAnnual/"+content;

        httpreq.open( "POST" , url  , true);

        httpreq.send();

        inputSelector()
        document.getElementById("dateContainer").value=new Date().getFullYear()
        loadBoxContentAnnual(content);
}
incomeGraph()
function loadBoxContentWeek(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            
            let maxTotalPayment=document.getElementById("maxTotalpayment")
            let minTotalPayment=document.getElementById("minTotalpayment")
            let average=document.getElementById("average")
            let noOfPayments=document.getElementById("noOfPayments")
            let maxNoPaymentDays=document.getElementById("maxNoPaymentDays")
            let minNoPaymentDays=document.getElementById("minNoPaymentDays")
            let maxNoPayments=document.getElementById("maxNoPayments")
            let minNoPayments=document.getElementById("minNoPayments")
            let totalOnlinePayments=document.getElementById("totalOnlinePayments")
            let totalCashPayments=document.getElementById("totalCashPayments")

            maxTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalIn']+'.00</h3></div>'
            minTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalIn']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgIn'].toFixed(2)+'</h3></div>'
            noOfPayments.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoPaymentDays.innerHTML=""
            maxNoPaymentDays.innerHTML=""
            
            let dates=['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
            for(var i=0;i<obj['maxValDates'].length;i++){
                
                if(i==obj['maxValDates'].length-1){
                    maxNoPaymentDays.innerHTML+=dates[obj['maxValDates'][i]-1]
                }
                else{
                    maxNoPaymentDays.innerHTML+=dates[obj['maxValDates'][i]-1]+','
                }
            }
            for(var i=0;i<obj['minValDates'].length;i++){
                
                if(i==obj['minValDates'].length-1){
                    minNoPaymentDays.innerHTML+=dates[obj['minValDates'][i]-1]
                }
                else{
                    minNoPaymentDays.innerHTML+=dates[obj['minValDates'][i]-1]+','
                }
            }
            maxNoPayments.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoPayments.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalOnlinePayments.innerHTML='<div class="amount"><h3>Rs. '+obj['onlinePayments']+'.00</h3></div>'
            totalCashPayments.innerHTML='<div class="amount"><h3>Rs. '+obj['cashPayments']+'.00</h3></div>'
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadIncomeBoxesWeek/"+content;
    httpreq2.open("POST",url2,true)
    httpreq2.send()
}
function loadBoxContentMonth(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            
            let maxTotalPayment=document.getElementById("maxTotalpayment")
            let minTotalPayment=document.getElementById("minTotalpayment")
            let average=document.getElementById("average")
            let noOfPayments=document.getElementById("noOfPayments")
            let maxNoPaymentDays=document.getElementById("maxNoPaymentDays")
            let minNoPaymentDays=document.getElementById("minNoPaymentDays")
            let maxNoPayments=document.getElementById("maxNoPayments")
            let minNoPayments=document.getElementById("minNoPayments")
            let totalOnlinePayments=document.getElementById("totalOnlinePayments")
            let totalCashPayments=document.getElementById("totalCashPayments")

            maxTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalIn']+'.00</h3></div>'
            minTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalIn']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgIn'].toFixed(2)+'</h3></div>'
            noOfPayments.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoPaymentDays.innerHTML=""
            maxNoPaymentDays.innerHTML=""
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
            maxNoPaymentDays.innerHTML="Days: "+maxcontainer.slice(0,15)
            minNoPaymentDays.innerHTML="Days: "+mincontainer.slice(0,15)
            if(mincontainer.length>15){
                minNoPaymentDays.innerHTML+="..."
            }
            if(maxcontainer.length>15){
                maxNoPaymentDays.innerHTML+="..."
            }

            maxNoPayments.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoPayments.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalOnlinePayments.innerHTML='<div class="amount"><h3>Rs. '+obj['onlinePayments']+'.00</h3></div>'
            totalCashPayments.innerHTML='<div class="amount"><h3>Rs. '+obj['cashPayments']+'.00</h3></div>'
            
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadIncomeBoxesMonth/"+content;
    httpreq2.open("POST",url2,true)
    httpreq2.send()
}
function loadBoxContentAnnual(content){
    let httpreq2=new XMLHttpRequest()
    httpreq2.onreadystatechange=function(){
        if(httpreq2.readyState===4 && httpreq2.status===200){
            console.log(httpreq2.responseText)
            const obj=JSON.parse(httpreq2.responseText)
            let maxTotalPayment=document.getElementById("maxTotalpayment")
            let minTotalPayment=document.getElementById("minTotalpayment")
            let average=document.getElementById("average")
            let noOfPayments=document.getElementById("noOfPayments")
            let maxNoPaymentDays=document.getElementById("maxNoPaymentDays")
            let minNoPaymentDays=document.getElementById("minNoPaymentDays")
            let maxNoPayments=document.getElementById("maxNoPayments")
            let minNoPayments=document.getElementById("minNoPayments")
            let totalOnlinePayments=document.getElementById("totalOnlinePayments")
            let totalCashPayments=document.getElementById("totalCashPayments")

            maxTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['maxTotalIn']+'.00</h3></div>'
            minTotalPayment.innerHTML='<div class="day"><h3 id="valuepart">Rs. '+obj['minTotalIn']+'.00</h3></div>'
            average.innerHTML='<div class="amount"><h3>Rs. '+obj['avgIn'].toFixed(2)+'</h3></div>'
            noOfPayments.innerHTML='<div class="amount"><h3>'+obj['NoOfPayments']+'</h3></div>'

            minNoPaymentDays.innerHTML=""
            maxNoPaymentDays.innerHTML=""
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
            maxNoPaymentDays.innerHTML=maxcontainer.slice(0,16)
            minNoPaymentDays.innerHTML=mincontainer.slice(0,16)
            if(mincontainer.length>16){
                minNoPaymentDays.innerHTML+="..."
            }
            if(maxcontainer.length>16){
                maxNoPaymentDays.innerHTML+="..."
            }

            maxNoPayments.innerHTML='<h3>'+obj['maxNoOfPayment']+'</h3>'
            minNoPayments.innerHTML='<h3>'+obj['minNoOfPayment']+'</h3>'
            totalOnlinePayments.innerHTML='<div class="amount"><h3>Rs. '+obj['onlinePayments']+'.00</h3></div>'
            totalCashPayments.innerHTML='<div class="amount"><h3>Rs. '+obj['cashPayments']+'.00</h3></div>'
        }
    }
    let url2="http://localhost/project/IncomeExpenses/loadIncomeBoxesAnnual/"+content;
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
                    
                    let mychart=document.getElementById("incomeChart").getContext('2d');
                    let chart2= new Chart(mychart, {
                        type: 'bar',
                        
                        data:{
                            labels: label2,
                            datasets: [{
                                label:"Amount of Income",
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
            let url = "http://localhost/project/IncomeExpenses/loadIncomeGraphWeek/"+content;
    
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
                    
                    let mychart=document.getElementById("incomeChart").getContext('2d');
                    let chart2= new Chart(mychart, {
                        type: 'line',
                        
                        data:{
                            labels: label2,
                            datasets: [{
                                label:"Amount of Income",
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
            let url = "http://localhost/project/IncomeExpenses/loadIncomeGraphMonth/"+content;
    
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
                
                let mychart=document.getElementById("incomeChart").getContext('2d');
                let chart2= new Chart(mychart, {
                    type: 'bar',
                    
                    data:{
                        labels: label2,
                        datasets: [{
                            label:"Amount of Income",
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
        let url = "http://localhost/project/IncomeExpenses/loadIncomeGraphAnnual/"+content;

        httpreq.open( "POST" , url  , true);

        httpreq.send();

        loadBoxContentAnnual(content);
    }

}