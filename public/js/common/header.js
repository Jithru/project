function activeSB(){
    if(document.getElementById("sidebar").className=="sidebar"){
        document.getElementById("sidebar").classList.replace("sidebar","sidebar-active")
    }
    else{
        document.getElementById("sidebar").classList.replace("sidebar-active","sidebar")
    }
}