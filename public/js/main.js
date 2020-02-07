function turnVisible(id){
    var elem = document.getElementById(id);
    if(elem.style.visibility === "hidden"){
        elem.style.visibility = "visible";
    }else{
        elem.style.visibility = "hidden";
    }
}

$('.toast').toast('show');
