
function clearComplaint(){

    document.getElementById("text-1").value=""
    document.getElementById("text-2").value=""

}

function submitComplaints(){

    let descript =document.getElementById("text-1").value
    descript=descript.replace(/\s+/g, '-');

    let suggestion =document.getElementById("text-2").value
    suggestion=suggestion.replace(/\s+/g, '-');

    if(descript.length==0){
        document.getElementById("text-1").placeholder = "This Field cannot be empty."
    }else{
        let httpRequest= new XMLHttpRequest()
        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState==4 && httpRequest.status==200){
                console.log(httpRequest.responseText)
                    
            }
        }

        const data=[descript,suggestion]
        let url = "http://localhost/project/Student/complaintLogic/"+data
        httpRequest.open("POST",url,true)
        httpRequest.send()

        clearComplaint()
    }
}

// review

function clearreview(){
    document.getElementById("text-1").value="";
    document.getElementById("text-2").value="";
    document.getElementById("text-3").value="";

}

function submitreview(){
    
    let idea =document.getElementById("text-1").value;
    idea=idea.replace(/\s+/g, '-');

    let satisfy =document.getElementById("text-2").value;
    satisfy=satisfy.replace(/\s+/g, '-');

    let improvement =document.getElementById("text-3").value;
    improvement=improvement.replace(/\s+/g, '-');


    if(idea.length==0 || satisfy.length==0){
        document.getElementById("text-1").placeholder = "This Field cannot be empty.";
        document.getElementById("text-2").placeholder = "This Field cannot be empty.";
       
    }else{
        let httpRequest= new XMLHttpRequest()
        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState==4 && httpRequest.status==200){
                console.log(httpRequest.responseText)
                
            }
        }

        const data=[idea,satisfy,improvement]
        let url = "http://localhost/project/Student/reviewLogic/"+data
        httpRequest.open("POST",url,true)
        httpRequest.send()

        clearreview()
    }
}