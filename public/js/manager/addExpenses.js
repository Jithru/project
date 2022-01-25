function utilityExpenses(){
    let httprequest = new XMLHttpRequest();
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState===4 && httprequest.status===200){
            console.log(httprequest.responseText)
            const obj=JSON.parse(httprequest.responseText)
            console.log(obj['PetrolCost'])
            document.getElementById('expType').innerHTML='<option value="'+obj['PetrolCost']+'">'+obj['PetrolCost']+'</option>'+
            '<option value="'+obj['ElectricityBill']+'">'+obj['ElectricityBill']+'</option>'+'<option value="'+obj['WaterBill']+'">'+obj['WaterBill']+'</option>'+
            '<option value="'+obj['Tyre']+'">'+obj['Tyre']+'</option>'+
            '<option value="'+obj['Other']+'">'+obj['Other']+'</option>'
            
        }
    }
    var url="http://localhost/project/Manager/utilityExpenses";
    httprequest.open("POST",url,true)
    httprequest.send()
}
utilityExpenses()

function expenseSelector(){
        console.log("call the expenseSelector")
        var expType=document.getElementById('expType').value;
        if(expType=="Other Expenses"){
            console.log("if part called")
            document.getElementById('expense-text-container').style.visibility="visible";
        }
        else{
            console.log("else part called")
            document.getElementById('expense-text-container').style.visibility="hidden";
        }
}
function showConfirm(){
    var expType=document.getElementById('expType').value;
    var expense=document.getElementById('expense').value;
    var discription=document.getElementById('discription').value;
    var amount=document.getElementById('amount').value;
    var confirm=document.getElementById('Confirm-amount').value;
    
    if(expType=="Other Expenses" && expense.length==0){
        document.getElementById('expense').placeholder="Expense field can't be empty";
        document.getElementById('expense').style.border="2px solid red";
    }
    if(amount.length==0 || confirm.length==0){
        if(amount.length==0){
            document.getElementById('amount').placeholder="Amount field can't be empty";
            document.getElementById('amount').style.border="2px solid red";
        }
        if(confirm.length==0){
            document.getElementById('Confirm-amount').placeholder="Confirm amount field can't be empty";
            document.getElementById('Confirm-amount').style.border="2px solid red";
        }
    }else if(isNaN(amount)){
            document.getElementById('password-mismatch').innerHTML="Amount is invalid";
            document.getElementById('amount').style.border="2px solid red";
    }else if(isNaN(confirm)){
            document.getElementById('password-mismatch').innerHTML="Confirmation is invalid";
            document.getElementById('Confirm-amount').style.border="2px solid red";
    }
    ///have to confirm this is in double format
    else if(amount!=confirm){
        document.getElementById('password-mismatch').innerHTML="Amount and confirmation doesn't match";
        document.getElementById('amount').style.border="2px solid red";
        document.getElementById('Confirm-amount').style.border="2px solid red";
    }
    else{
        document.getElementById('confirmation').classList.replace("confirmation-box","confirmation-box-active");
    }

}




function closeConfirm(){
    document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box");
}




function passData(){
    if(document.getElementById('expType').value=="Other Expenses"){
        var expense=document.getElementById('expense').value;
    }
    else{
        var expense=document.getElementById('expType').value;
    }
    
    var discription=document.getElementById('discription').value;
    var amount=document.getElementById('amount').value;
   
    expense = expense.replace(/\s+/g, '-');
    discription=discription.replace(/\s+/g, '-');
    // console.log(expense+" "+amount);
    let httpreq = new XMLHttpRequest();

    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            if(httpreq.responseText=="inserted"){
                
                document.getElementById("confirmation").classList.replace("confirmation-box-active","confirmation-box");
                document.getElementById('expense').value='';
                document.getElementById('discription').value='';
                document.getElementById('amount').value='';
                document.getElementById('Confirm-amount').value='';
                 
            }
            else{
                
            }
        }
    }
    const data=[expense,discription,amount];
    let url = "http://localhost/project/Manager/addExpensesLogic/" + data;

    httpreq.open( "POST" , url  , true);
    //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
    httpreq.send();
}




function passwordCheck(){
    var password=document.getElementById('mngPassword').value;

    if(password.length==0){
        document.getElementById('mngPassword').placeholder="Password field can not be empty";
        document.getElementById('mngPassword').style.border="2px solid red";
    }
    else{
        let httpreq = new XMLHttpRequest();

        httpreq.onreadystatechange = function(){
            console.log("onreadystatechange");
            if( httpreq.readyState === 4 && httpreq.status === 200){

                console.log(httpreq.responseText);
                if(httpreq.responseText=="success"){
                    console.log(httpreq.responseText);
                    passData();
                //     window.location.href='http://localhost/project/Staff/signupPassword';   
                }
                 else{
                    document.getElementById('mngPassword').value="";
                    document.getElementById('mngPassword').placeholder="Incorrect password";
                    document.getElementById('mngPassword').style.border="2px solid red";
                }
            }
        }
        let url = "http://localhost/project/Manager/validate/" + password;

        httpreq.open( "POST" , url  , true);
        //httpreq.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded");
        httpreq.send();
    }
        
}


function cancel(){
    document.getElementById('expense').value='';
    document.getElementById('discription').value='';
    document.getElementById('amount').value='';
    document.getElementById('Confirm-amount').value='';
}