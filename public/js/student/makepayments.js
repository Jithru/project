
// document.getElementById("total").value=totamount;
function cancelpay(){
    document.getElementById("amount").value="";

}

function back(){
    console.log("i am back");   
    window.location.href='http://localhost/project/Student/payments';
}

function gatewayload(){
    var amount=document.getElementById("amount").value;
    alert (amount);

    if(amount !=""){
        payhere.onCompleted = function onCompleted() {
            alert("Payment completed");
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
            "return_url": "http://127.0.0.1/project/Student/makepayments",     // Important
            "cancel_url":" http://127.0.0.1/project/Student/makepayments",     // Important
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

// gatewayload();