function turnVisible(id) {
    var elem = document.getElementById(id);
    if (elem.style.visibility === "hidden") {
        elem.style.visibility = "visible";
    } else {
        elem.style.visibility = "hidden";
    }
}

$(".toast").toast("show");

var isActive = 1;

function showMenu(id) {
    var element = document.getElementById("menu");
    if (isActive) {
        element.classList.remove("menu-hamburguer-open");
        isActive = 0;
    } else {
        element.classList.add("menu-hamburguer-open");
        isActive = 1;
    }
}

function imagePreview(input, img, def) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(img).attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }else{
        $(img).attr("src", def);
    }
}
