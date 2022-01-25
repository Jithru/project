function nextPage(){
    var flag=true;
    var initName=document.getElementById("initName").value;
    if(initName.length==0){
        document.getElementById("initName").placeholder="Name with Initials can not be empty"
        document.getElementById("initName").style.border="2px solid red"
        flag=false;
    }
    var fullName=document.getElementById("fullName").value;
    if(fullName.length==0){
        document.getElementById("fullName").placeholder="Full Name can not be empty"
        document.getElementById("fullName").style.border="2px solid red"
        flag=false;
    }
    var pmtAddress=document.getElementById("pmtAddress").value;
    if(pmtAddress.length==0){
        document.getElementById("pmtAddress").placeholder="Address can not be empty"
        document.getElementById("pmtAddress").style.border="2px solid red"
        flag=false;
    }
    var city=document.getElementById("city").value;
    if(city.length==0){
        document.getElementById("city").placeholder="This feild can not be empty"
        document.getElementById("city").style.border="2px solid red"
        flag=false;
    }
    var district=document.getElementById("district").value;
    if(district.length==0){
        document.getElementById("district").placeholder="This feild can not be empty"
        document.getElementById("district").style.border="2px solid red"
        flag=false;
    }
    var divSecre=document.getElementById("divSecre").value;
    if(divSecre.length==0){
        document.getElementById("divSecre").placeholder="This feild can not be empty"
        document.getElementById("divSecre").style.border="2px solid red"
        flag=false;
    }
    var police=document.getElementById("police").value;
    if(police.length==0){
        document.getElementById("police").placeholder="This feild can not be empty"
        document.getElementById("police").style.border="2px solid red"
        flag=false;
    }
    if(!document.getElementById("male").checked && !document.getElementById("female").checked){
        document.getElementById("message").innerHTML="You haven't select a gender"
        flag=false;
    }
    // var dateofbirth=document.getElementById("dateofbirth").value;
    // if(dateofbirth.length==0){
    //     document.getElementById("dateofbirth").innerHTML="Date of birth can not be empty"
    //     document.getElementById("dateofbirth").style.border="2px solid red"
    //     flag=false;
    // }
    var nic=document.getElementById("nic").value;
    if(nic.length==0){
        document.getElementById("nic").placeholder="nic can not be empty"
        document.getElementById("nic").style.border="2px solid red"
        flag=false;
    }


    if(nic.length>0){
        if(nic.length==10){
            if(nic.charAt(9)=='V' || nic.charAt(9)=='v'){
                for(var j=0;j<nic.length-1;j++){
                    if(isNaN(nic.charAt(j))){
                        document.getElementById("nic").value="nic is not valid"
                        document.getElementById("nic").style.border="2px solid red"
                        flag=false;
                        break;
                    }
                }
            }else{
                document.getElementById("nic").value="nic is not valid"
                document.getElementById("nic").style.border="2px solid red"
                flag=false;
            }
        }else if(nic.length==12){
                if(isNaN(nic)){
                    document.getElementById("nic").value="nic is not valid"
                    document.getElementById("nic").style.border="2px solid red"
                    flag=false;
                }
        }else{
            document.getElementById("nic").value="this nic is not valid"
            document.getElementById("nic").style.border="2px solid red"
            flag=false
        }
    }

    var mobile=document.getElementById("mobile").value;
    if(mobile.length!=10){
        document.getElementById("mobile").placeholder="Please recheck the mobile number"
        document.getElementById("dateofbirth").style.border="2px solid red"
        flag=false;
    }

    if(true){
        if(nic.length==10){
            const d = new Date();
            var yearvar=parseInt(nic.substr(0,2))
            yearvar=1900+yearvar
            console.log()
            d.setFullYear(yearvar,00,01)
            var datevar=nic.substr(2,3)
            d.setDate(datevar - 1)
            console.log(d.toISOString().slice(0, 10))
            dateofbirth=d.toISOString().slice(0, 10)
            
        }else if(nic.length==12){
            const d = new Date();
            var yearvar=parseInt(nic.substr(0,4))
            d.setFullYear(yearvar,00,01)
            d.setDate(parseInt(nic.substr(4,3)) - 1)
            console.log(d.toISOString().slice(0, 10))
            dateofbirth=d.toISOString().slice(0, 10)
        }

    }
   
    if(flag==true){
        document.getElementById("reg-form").classList.replace("reg-form","reg-form-hidden");
        document.getElementById("reg2-f2").classList.replace("reg2-f2","reg2-f2-visible");
        packageLoad()
    }
    
    // document.getElementById("reg-form").classList.replace("reg-form","reg-form-hidden");
    // document.getElementById("reg2-f2").classList.replace("reg2-f2","reg2-f2-visible");
    

}

function pre(){
    document.getElementById("reg2-f2").classList.replace("reg2-f2-visible","reg2-f2");
    // alert("hi");
    document.getElementById("reg-form").classList.replace("reg-form-hidden","reg-form");
}

function changing(){
    if(document.getElementById("written").checked){
        var type="written"
    }else if(document.getElementById("trial").checked){
        var type="trial"
    }else if(document.getElementById("license").checked){
        var type="license"
    }
    if(type=="written"){
        document.getElementById("number-text").innerHTML="Medical No"
        document.getElementById("ending-date").classList.replace("sub-row-f2","sub-row-f2-hidden")
    }else if(type=="trial"){
        document.getElementById("number-text").innerHTML="L-permit No"
        document.getElementById("ending-date").classList.replace("sub-row-f2-hidden","sub-row-f2")
    }else{
        document.getElementById("number-text").innerHTML="License No"
        document.getElementById("ending-date").classList.replace("sub-row-f2-hidden","sub-row-f2")
        document.getElementById("packageContainer").classList.replace("crosul-title-f","crosul-title-f-hidden")
    }
}

function SaveData(){
    var initName=document.getElementById("initName").value;
    var fullName=document.getElementById("fullName").value;
    var pmtAddress=document.getElementById("pmtAddress").value;
    var city=document.getElementById("city").value;
    var district=document.getElementById("district").value;
    var divSecre=document.getElementById("divSecre").value;
    var police=document.getElementById("police").value;
    if(document.getElementById("male").checked){
        var gender="m"
    }else if(document.getElementById("female").checked){
        var gender="f"
    }
    var nic=document.getElementById("nic").value;

    //caLculate DOB from NIC
    if(true){
        if(nic.length==10){
            const d = new Date();
            var yearvar=parseInt(nic.substr(0,2))
            yearvar=1900+yearvar
            console.log()
            d.setFullYear(yearvar,00,01)
            var datevar=nic.substr(2,3)
            d.setDate(datevar - 1)
            console.log(d.toISOString().slice(0, 10))
            var dateofbirth=d.toISOString().slice(0, 10)
            
        }else if(nic.length==12){
            const d = new Date();
            var yearvar=parseInt(nic.substr(0,4))
            d.setFullYear(yearvar,00,01)
            d.setDate(parseInt(nic.substr(4,3)) - 1)
            console.log(d.toISOString().slice(0, 10))
            var dateofbirth=d.toISOString().slice(0, 10)
        }

    }



    var mobile=document.getElementById("mobile").value;
    var occupation=document.getElementById("occupation").value;
    if(document.getElementById("written").checked){
        var type="written"
    }else if(document.getElementById("trial").checked){
        var type="trial"
    }else if(document.getElementById("license").checked){
        var type="license"
    }

    if(type=="written"){
        var classA=document.getElementById("A1-A").checked;
        var classAauto=document.getElementById("A-Auto").checked;
        var classB1=document.getElementById("B1").checked;
        var classB=document.getElementById("B").checked;
        var classBauto=document.getElementById("B-Auto").checked;

        var classArray=[]
        if(classAauto==true){
            classArray.push("A-Auto");
        }if(classA==true){
            classArray.push("A");
        }if(classB1==true){
            classArray.push("B1");
        }if(classB==true){
            classArray.push("B");
        }
        if(classBauto==true){
            classArray.push("B-Auto");
        }
   
        console.log(classArray);
        var packageId=document.getElementById("package-id-container").value;
        var initialCharges=document.getElementById("initPayment").value;
        var packagePrice=document.getElementById("package-amount-container").value;

        let httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function(){
          console.log("onreadystatechange");
          if( httpreq.readyState === 4 && httpreq.status === 200){
            console.log(httpreq.responseText);
            alert(httpreq.responseText) ;
              
          }
        }
        var medicalId=document.getElementById("medical").value;
        var issuedDate=document.getElementById("issue").value;
        // alert(gender)


        pmtAddress=pmtAddress.replace(/,+/g, '_');
        pmtAddress=pmtAddress.replace(/\s+/g, '-');
        pmtAddress=pmtAddress.replace(/\/+/g, '~');

        divSecre=divSecre.replace(/,+/g, '_');
        divSecre=divSecre.replace(/\s+/g, '-');
        divSecre=divSecre.replace(/\/+/g, '~');
        
        fullName=fullName.replace(/\s+/g, '-');
        initName=initName.replace(/\s+/g, '-');

        let data=[nic,pmtAddress,gender,dateofbirth,mobile,initialCharges,packagePrice,district,city,divSecre,police,occupation,type,initName,fullName,medicalId,issuedDate]
        console.log(data);
        let vehicleClasses=[classA,classAauto,classB1,classB,classBauto]
        var url="http://localhost/project/Receptionist/registerForWritten/"+data+"/"+vehicleClasses+"/"+packageId+"/"+classArray;
        httpreq.open( "POST" , url  , true);
        httpreq.send();
    }else if(type=="trial"){

    }else if(type=="license"){

    }
    window.location.assign("http://localhost/project/Receptionist/studentList");
    // document.getElementById("reg2-f2").classList.replace("reg2-f2-visible","reg2-f2");
    // document.getElementById("reg-form").classList.replace("reg-form-hidden","reg-form");
    
}

function loadVehicleClasses(){
    var classA=document.getElementById("A1-A").checked;
    var classAauto=document.getElementById("A-Auto").checked;
    var classB1=document.getElementById("B1").checked;
    var classB=document.getElementById("B").checked;
    var classBauto=document.getElementById("B-Auto").checked;
    let httpreq = new XMLHttpRequest();
    httpreq.onreadystatechange = function(){
        
        if( httpreq.readyState === 4 && httpreq.status === 200){
            // console.log(httpreq.responseText);
            var text=httpreq.responseText;
            document.getElementById("initPayment").value=text;
        }
    }
    let data=[classA,classAauto,classB1,classB,classBauto]
    var url="http://localhost/project/Receptionist/vehicleClassSelection/"+data;
    httpreq.open( "POST" , url  , true);
    httpreq.send();

    
}

function packageLoad(){
    console.log("packageload");
    var packageRows=document.getElementById("scroll");
    let httpr= new XMLHttpRequest();
    httpr.onreadystatechange = function(){
        // console.log("onreadystatechange");
        // console.log(httpr.readyState,httpr.status);
        if( httpr.readyState === 4 && httpr.status === 200){
            // console.log(httpr.responseText)
            const obj=JSON.parse(httpr.responseText);
            
            for(var i=0;i<obj.length;i++){
                packageRows.innerHTML+='<div class="packages-f2">'+
                    '<div class="cell-1-f2">package_'+obj[i].package_id+'</div>'+
                   '<div class="cell-2-f2">'+obj[i].classes+'</div>'+
                    '<div class="cell-3-f2">'+obj[i].amount+'</div>'+
                    '<div class="cell-4-f2"><button class="submit-f2" id="pk-2-'+i+'" onclick=addPackage('+obj.length+','+i+','+obj[i].package_id+','+obj[i].amount+')>Select</button></div>'+
                '</div>'
            }
        }
    }
    var url="http://localhost/project/Receptionist/packageSelection";
    httpr.open( "POST" , url  , true);
    httpr.send();
}
function addPackage(length,id,packageId,amount){
    console.log(packageId,amount)
    for(var i=0;i<length;i++){
        if(i!=id){
            var idVal="pk-2-"+i
            document.getElementById(idVal).classList.replace("submit-f2-selected","submit-f2");
            document.getElementById(idVal).innerHTML="Select"
        }
    }
    document.getElementById("package-id-container").value=packageId;
    document.getElementById("package-amount-container").value=amount;
    var idVal="pk-2-"+id
    if(document.getElementById(idVal).innerHTML=="Select"){
        document.getElementById(idVal).classList.replace("submit-f2","submit-f2-selected");
        document.getElementById(idVal).innerHTML="Selected"
    }else{
        document.getElementById(idVal).classList.replace("submit-f2-selected","submit-f2");
        document.getElementById(idVal).innerHTML="Select"
    }

}


