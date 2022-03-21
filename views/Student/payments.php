<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/payments.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="header">
         <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="main">
             <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>
           
            <div class="view">
                <div class="profile">
                        <!-- <div class="pic">
                            <div class="pic-div-1">
                                <img src="<?php echo URL?>public/images/profpic.png" class="ppic" alt="profpic">
                            </div>
                            <div class="pic-div-2">
                                <h4>K.K Saman Perera</h4>
                            </div>
                        </div> -->
                        <div class="title">
                            <div class="ti-name">
                                <h1>Payments</h1>
                            </div>
                        </div>
                    </div>
                    <div class="summary">
                        <div class="paid">
                            <div class="paid-col-1">
                                <h3>Paid</h3>
                                <h3>:</h3>
                            </div>
                            <div class="paid-col-2" id="paid" >
                                <!-- <div class="paid-val">18,500.00</div> -->
                            </div>
                        
                        </div>
                        <div class="remaining">
                            <div class="remaining-col-1">
                                <h3>Remaining</h3>
                                <h3>:</h3>
                            </div>
                            <div class="remaining-col-2" id="remain">
                                <!-- <div class="paid-val">7,000.00</div> -->
                            </div>
                        </div>

                    </div>
                    <div class="table-container">
                        <div class="table-part">
                            <div class="aaa">
                            <div class="table-tiltle">
                                    <div class="cel-1">Date</div>
                                    <div class="cel-2">Time</div>
                                    <div class="cel-3">Method</div>
                                    <div class="cel-4">Amount (LKR)</div>
                            </div>
                            </div>
        
                            <div class="table">

                                <div class="data" id="datalist">
                                    <!-- <div class="row">
                                        <div class="col-1">2019/10/20</div>
                                        <div class="col-2">10.00</div>
                                        <div class="col-3">Cash</div>
                                        <div class="col-4">5000.00</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">2019/11/01</div>
                                        <div class="col-2">10.20</div>
                                        <div class="col-3">Online</div>
                                        <div class="col-4">2000.00</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">2019/11/22</div>
                                        <div class="col-2">20.02</div>
                                        <div class="col-3">Online</div>
                                        <div class="col-4">4500.00</div>
                                    </div> -->
        
                                </div>
                            </div>
                        
                        </div>
                        <div class="button-part">
                        <button class="pay-online" id="pay_online" onclick="payOnline()">Pay online</button>
                        </div>

                    </div>
            </div>
            <div class="popup">
                    <div class="container-2">
                        <div class="div-1-p">
                            <h2>Make Payments</h2>
                        </div>
                         <div class="div-2-p">
                            <div class="col-1-p">
                                <h4>Paying Amount(Rs.)</h4>
                            </div>
                            <div class="col-2-p">
                            <h3>:</h3>
                            </div>
                            <div class="col-3-p">
                                <input type="number" class="amount" id="amount" min=0 max=10000>
                            </div>
                        </div>
   
                        <div class="div-5-p">
                            <div class="div-button">
                            <button class="Back" id="back" onclick="back()">Back</button>
                            </div>
                            <div class="div-button">
                                <button class="Cancel" id="cancelpay" onclick="cancelpay()">Cancel</button>
                            </div>
                            <div class="div-button">
                                <button type="submit" class="pay" id="payhere-payment" onclick="gatewayload()">Pay</button>
                                <!-- <button class="pay" onclick="gatewayload()">Pay</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script> 

        function payOnline(){

            document.querySelector(".view").style.display="none";
            document.querySelector(".popup").style.display="flex";
            // window.location.href='http://localhost/project/Student/makepayments';
        }

        function back(){
            document.querySelector(".view").style.display="flex";
            document.querySelector(".popup").style.display="none";           
        }

        function cancelpay(){
            document.getElementById("amount").value="";
        }

        function gatewayload(){
        console.log("gateway");
        var amount=document.getElementById("amount").value;
        var ifsuccess=false;
        // alert (amount);


        if(amount !="" && amount>0){
            payhere.onCompleted = function onCompleted() {
                console.log("111");
                paymentSuccessfull();
                // alert("Payment completed");
                //Note: validate the payment and show success or failure page to the customer
            };
        
            // Called when user closes the payment without completing
            payhere.onDismissed = function onDismissed() {
                //Note: Prompt user to pay again or show an error page
                alert("Payment dismissed");
            };
        
            // Called when error happens when initializing payment such as invalid parameters
            payhere.onError = function onError(error) {
                // Note: show an error page
                alert("Error:"  + error);
            };
        
            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1219960",    // Replace your Merchant ID
                "return_url": "http://127.0.0.1/project/Student/payments",     // Important
                "cancel_url":" http://127.0.0.1/project/Student/payments",     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": "ItemNo12345",
                "items": "Door bell wireles",
                "amount": amount,
                "currency": "LKR",
                "first_name": "Saman",
                "last_name": "Perera",
                "email": "samanp@gmail.com",
                "phone": "0771234567",
                "address": "No.1, Galle Road",
                "city": "Colombo",
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };
        
            // Show the payhere.js popup, when "PayHere Pay" is clicked
            document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
            };
        }

}
        function paymentSuccessfull(){
            var amount=document.getElementById("amount").value;
            console.log(amount);
            let httpreq=new XMLHttpRequest();
                httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    if(httpreq.responseText=="true"){
    
                        window.location.href="http://localhost/project/Student/payments";
                    }
                    
                }
            }

            console.log("succ");
            var today = new Date();

            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                var todaytime=today.getHours()+':'+today.getMinutes()+':'+today.getSeconds();

                console.log(todaytime);
                console.log(date);
                console.log("---------------------223");
                var dateTime=date+"_"+todaytime;
                const data=dateTime+","+amount;
                            console.log(data);
                let url="http://localhost/project/Student/onlinePayments/"+data;
                console.log(url);
                console.log("---------------------");

                httpreq.open("POST",url,true);
                httpreq.send();    
                

        }

// get payment details---->>>>>>>

        function getPaymentDetais(){
            const row=document.getElementById("datalist");
            
            let httpreq = new XMLHttpRequest();
            let paidAmount=0.00;
            httpreq.onreadystatechange=function(){
                if(httpreq.readyState===4 && httpreq.status===200){
                    // console.log(httpreq.responseText);
                    const obj=JSON.parse(httpreq.responseText);
                    
                    // console.log(obj);
                    const sortByDate=obj=>{
                        const sorter=(a,b)=>{
                            return new Date(a.payment_date_time).getTime() - new Date(b.payment_date_time).getTime();
                        }
                        return obj.sort(sorter);
                    }
                    sortByDate(obj);
                    let method;
                    
                    for(var i=0 ;i<obj.length;i++){
                        if (typeof obj[i].cpayment_id==='undefined'){
                            method="Online";
                        }else{
                            method="Cash";
                        }
                       
                       let str=String(obj[i].payment_date_time);
                         let myArr = str.split(" ");
                         paidAmount+=parseFloat(obj[i].amount);
                         
                        
                        row.innerHTML+='<div class="row"><div class="col-1">'+myArr[0]+'</div>'+
                        '<div class="col-2">'+myArr[1]+'</div>'+
                        '<div class="col-3">'+method+'</div>'+
                        '<div class="col-4">'+obj[i].amount+'</div></div>';
                    }
                    console.log(paidAmount);
                    paidAmountLKR=paidAmount.toLocaleString("en-US", {style:"currency", currency:"LKR"});
                    // console.log(paidAmount);

                    document.getElementById("paid").innerHTML='<div class="paid-val">'+paidAmountLKR+'</div>';
                    
                }
            }

            let url="http://localhost/project/Student/paymentDetails";
            httpreq.open("POST",url,true)
            httpreq.send()

            let httpreqamount= new XMLHttpRequest();
            httpreqamount.onreadystatechange=function(){
                if(httpreqamount.readyState===4 && httpreqamount.status===200){
                    const objamount=JSON.parse(httpreqamount.responseText);
                    let totAmount=objamount[0].total_amount;
                    // totAmount=parseFloat(totAmount);
                    // console.log(typeof totAmount);
                    // let paidAmount2=paidAmount;
                    console.log(totAmount);
                    // console.log(typeof paidAmount2);
                    let remain2=totAmount-paidAmount;
                    console.log(remain2);
                    if(remain2>0){
                        remain2LKR=remain2.toLocaleString("en-US", {style:"currency", currency:"LKR"});
                        document.getElementById("remain").innerHTML='<div class="paid-val">'+remain2LKR+'</div>';
      
                    }else{
                        document.getElementById("remain").innerHTML='<div class="paid-val">All Paid</div>';
                        document.getElementById("remain").style.color='green';

                    }
               

                }
            }
            let url2="http://localhost/project/Student/paymentDetailsAmount";
            httpreqamount.open("POST",url2,true)
            httpreqamount.send()

        }
        getPaymentDetais();

        
        
        var today = new Date();

var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var todaytime=today.getHours()+':'+today.getMinutes()+':'+today.getSeconds();

    console.log(todaytime);
    console.log(date);
    console.log("---------------------");
    var dateTime=date+"_"+todaytime;
    const data=dateTime+","+amount;
                console.log(data);
    let url="http://localhost/project/Student/onlinePayments/"+data;
    console.log(url);
    console.log("---------------------");

    </script>
</body>
</html>