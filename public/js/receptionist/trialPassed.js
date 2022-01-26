function students(){
    //alert("iko")
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){

        console.log("onreadystatechange");
        if( httpreq.readyState === 4 && httpreq.status === 200){

            console.log(httpreq.responseText);
            const self = JSON.parse(httpreq.responseText);

            const row = document.getElementById("scroll");
            for(var i=0;i<self.length;i++){

                var myName=self[i].full_name.replace(/_+/g, ',');
                myName = myName.replace(/-+/g, ' ');
                myName=myName.replace(/~+/g, '/');

                row.innerHTML += '<div class="row"><div class="stId"><p>'+self[i].student_id+
                '</p></div><div class="fName"><p>'+myName+'</p></div><div class="tell"><p>'+
                self[i].contact+'</p></div><div class="pay"><button class="bttn-pay" id="payments_'+self[i].student_id+'" onclick="payments('+self[i].student_id+')">Payments</button></div><div class="view"><button class="btt-view"  id="viewbttn_'+self[i].student_id+'" onclick="ViewMore('+self[i].student_id+')">View Details</button></div>';
                //<a href = "http://localhost/mytry/Receptionist/payments/">
                // <a href = "http://localhost/mytry/Receptionist/moreDetails/"></a>
            }   
        }
    }

    let url = "http://localhost/project/Receptionist/display_trialPassed/";

    httpreq.open( "POST" , url  , true);
    httpreq.send();
}
students();

function searchMe(){
    var input, filter, list, li, i, a;
    input = document.getElementById("search").value;
    filter = input.toUpperCase();
    list = document.getElementById("scroll");
    li = list.getElementsByClassName("row");

    for(i = 0; i<li.length; i++){
        a = li[i].getElementsByClassName("fName")[0];
        if(a.innerHTML.toUpperCase().indexOf(filter) > -1){
            li[i].style.display="";
        }
        else{
            li[i].style.display="none";
        }
    }
}

// function searchMe(){
//     if(event.key === 'Enter'){
//         // alert('Hello');
//         var input = document.getElementById("search").value;
//         console.log(input);
//         search(input);
//     }
// }

// function search(stId){
//     var stId = document.getElementById("search").value;

//     let httpreq = new XMLHttpRequest();
//     httpreq.onreadystatechange = function(){

//         console.log("onreadystatechange");
//         if( httpreq.readyState === 4 && httpreq.status === 200){

//             console.log(httpreq.responseText);
//             const self = JSON.parse(httpreq.responseText);

//             const row = document.getElementById("scroll");
//             for(var i=0;i<self.length;i++){

//                 var myName=self[i].full_name.replace(/_+/g, ',');
//                 myName = myName.replace(/-+/g, ' ');
//                 myName=myName.replace(/~+/g, '/');

//                 row.innerHTML =""+'<div class="row"><div class="stId"><p>'+self[i].student_id+
//                 '</p></div><div class="fName"><p>'+myName+'</p></div><div class="tell"><p>'+
//                 self[i].contact+'</p></div><div class="pay"><button class="bttn-pay" id="payments_'+self[i].student_id+'" onclick="payments('+self[i].student_id+')">Payments</button></div><div class="view"><button class="btt-view"  id="viewbttn_'+self[i].student_id+'" onclick="ViewMore('+self[i].student_id+')">View Details</button></div>';
//             }  
  
//         }
//     }

//     let url = "http://localhost/project/Receptionist/findStudent/"+stId;

//     httpreq.open( "POST" , url  , true);
//     httpreq.send();
// }