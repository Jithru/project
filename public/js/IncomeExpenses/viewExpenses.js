let httpreq = new XMLHttpRequest();

httpreq.onreadystatechange = function(){
    console.log("onreadystatechange");
    
    if( httpreq.readyState === 4 && httpreq.status === 200){

        console.log(httpreq.responseText);
        const obj = JSON.parse(httpreq.responseText);
        for(var i=0;i<obj.length;i++){
            obj[i].oexpense_id = obj[i].oexpense_id.replace(/-/g, " ");
            obj[i].title = obj[i].title.replace(/-/g, " ");
            obj[i].description =obj[i].description.replace(/-/g, " ");
            obj[i].amount =obj[i].amount.replace(/-/g, " ");
            obj[i].name =obj[i].name.replace(/-/g, " ");
            
            if(obj[i].description==''){
                obj[i].description="Description is not available"
            }
        }

        var myArr=[]
        for(var i=0;i<obj.length;i++){
            let str=String(obj[i].recorded_date_time)
            myArr[i] = str.split(" ");
        }

        const rows = document.getElementById("tablerows");
        loadTable()

        function loadTable(){
            for(var i=0;i<obj.length;i++){
                rows.innerHTML += '<div class="row">' + 
                '<div class="cell">'+
                '<div class="information">' + 
                '<div class="one">'+"Ex_"+obj[i].oexpense_id+'</div>' + 
                '<div class="two">'+obj[i].title+'<div class="description">'+ obj[i].description+'</div>'+'</div>'+
                '<div class="three">'+obj[i].name+'</div>'+
                '<div class="four">'+myArr[i][0]+'</div>'+
                '<div class="five">'+myArr[i][1]+'</div>'+
                '<div class="six">'+ obj[i].amount+'</div>'+
                '</div>'+
                '</div>'+
                '</div>'
            }
        }

    }
}

let url = "http://localhost/project/IncomeExpenses/otherExpensesView";

httpreq.open( "POST" , url  , true);
//httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
httpreq.send();

function descriptionViewer(description){
    
}


