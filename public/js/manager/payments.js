var myId;
//Payments
function payments(id){
    studentName(id);
    paid_balance(id);
    remain_balance(id);
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);
            
            const pay_row = document.getElementById("scroll-st");
            pay_row.innerHTML =""

            // const sortByDate=student=>{
            //     const sorter=(a,b)=>{
            //         return new Date(a.payment_date_time).getTime() - new Date(b.payment_date_time).getTime();
            //     }
            //     return student.sort(sorter);
            // }
            // sortByDate(student);

            var myArr=[]
            for(var i=0;i<student.length;i++){
                let str=String(student[i].payment_date_time)
                myArr[i] = str.split(" ");
            }
            
            for(var i=0; i<student.length; i++){
                if(typeof student[i].cpayment_id==="undefined"){
                    var method = "Online";
                }
                else{
                    var method = "Cash";
                }

                pay_row.innerHTML += 
                '<div class="pay_row"><div class="date"><p>'+myArr[i][0]+
                '</p></div><div class="time"><p>'+myArr[i][1]+
                '</p></div><div class="method"><p>'+method+
                '</p></div><div class="price"><p>'+student[i].amount+'</p></div>';
            }
        }
    }
    let url = "http://localhost/project/Receptionist/payMe/"+id;
    // let test = "http://localhost/project/Receptionist/paidMethod/"+id;
    
    httpreq.open( "POST" , url  , true);
    httpreq.send();
    myId = id;
    document.getElementById("container").classList.replace("container","container-hidden");
    document.getElementById("container-st").classList.replace("container-st","container-st-visible"); 
}
function studentName(id){
    // alert('Hello iko');
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            var myName=student[0].full_name.replace(/_+/g, ',');
            myName = myName.replace(/-+/g, ' ');
            myName=myName.replace(/~+/g, '/');

            document.getElementById("whoAmI").innerHTML = myName;
            console.log(myName);
        }
    }
    let url = "http://localhost/project/Receptionist/whoAmI/"+id;
    
    httpreq.open( "POST" , url  , true);
    httpreq.send();

}

//paid Amount
function paid_balance(id){
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            document.getElementById("display-paid").innerHTML = "Rs "+student['sum_price'];
           
        }
    }
    
    let url = "http://localhost/project/Receptionist/payed/"+id;
   
    
    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
//remain Amount
function remain_balance(id){
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

            document.getElementById("display-remain").innerHTML = "Rs "+student[0].total_amount;
        }
    }
    let url = "http://localhost/project/Receptionist/remain/"+id;
    
    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
function go_back(){
    window.location.href = "http://localhost/project/Manager/studentList/";
}
//Add Payments
function addPayment(){
    document.getElementById("container-st").classList.replace("container-st-visible","container-st");
    document.getElementById("add-container").classList.replace("add-container","add-container-visible");
    document.getElementById("re-amount").style.border = "none"
    
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            const student = JSON.parse(httpreq.responseText);

        }
    }
    // let url = "http://localhost/mytry/Receptionist/storeId/"+id;
    //alert(id);
    httpreq.open( "POST" , url  , true);
    httpreq.send();
    document.getElementById("container-st").classList.replace("container-st-visible","container-st");
    
}

function addPayCancel(){
    document.getElementById("add-container").classList.replace("add-container-visible","add-container");
    document.getElementById("container-st").classList.replace("container-st","container-st-visible");
}


function callConfirm(){
    var flag = true;
    var amount = document.getElementById("amount").value;
    var reAmount = document.getElementById("re-amount").value;
   
    if(reAmount.length==0){
        document.getElementById("re-amount").placeholder = "Re-enter amount"
        document.getElementById("re-amount").style.border = "2px solid red"
        document.getElementById("enter").innerHTML = ""
        console.log(reAmount);
        flag=false;
    }
    else if(amount!=reAmount){
        document.getElementById("enter").innerHTML = "Enter same amount!"
        document.getElementById("re-amount").style.border = "2px solid red"
        var reAmount = document.getElementById("re-amount").value;
        console.log(reAmount);
        flag=false;
    }
    
    if(flag==true){
        document.getElementById("enter").innerHTML = ""
        document.getElementById("re-amount").style.border = "none"
        document.getElementById("add-container").classList.replace("add-container-visible","add-container");
        document.getElementById("second-container").classList.replace("second-container","second-container-visible");
    }

    document.getElementById("entered-amount").innerHTML="Rs. "+amount;
  
}

function callHome(){
    //alert('gone');
    document.getElementById("second-container").classList.replace("second-container-visible","second-container");
    document.getElementById("add-container").classList.replace("add-container","add-container-visible");
}

function confirmMe(){
    var id = myId;
    var amount = document.getElementById("amount").value;
    var today = new Date();
    var pDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var pTime = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    // var method = "cash";

    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.response);

            const student = JSON.parse(httpreq.responseText);

            const payed_amount = document.getElementById("entered-amount");
            // payed_amount.innerHTML = student[i].amount
            // alert(myId);
            // window.location.href = "http://localhost/mytry/Receptionist/viewTableRow/"+payments(myId);
     
        }
    }

    // var pay = [id,pDate,pTime,amount]
    var pay = [id,amount]
    let url = "http://localhost/project/Receptionist/addPayment/"+pay;

    console.log("send");

    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
    document.getElementById("second-container").classList.replace("second-container-visible","second-container");
    document.getElementById("container-st").classList.replace("container-st","container-st-visible");
    payments(myId);
}



