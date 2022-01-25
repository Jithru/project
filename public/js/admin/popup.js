function deletex() {
    document.getElementById("pop-div").classList.replace("popup-container","popup-container-active");
}

function cancel() {
    document.getElementById("pop-div").classList.replace("popup-container-active","popup-container");
}

function yesDelete() {
    document.getElementById("pop-div").classList.replace("popup-container-active","popup-container");
    document.getElementById("pop-div2").classList.replace("popup-container2","popup-container2-active");
}

function cancel2() {
    document.getElementById("pop-div2").classList.replace("popup-container2-active","popup-container2");
}
