var nav = document.querySelectorAll(".nav_item");
var form = document.querySelector("#add");
var list = document.querySelector("#list");
var edit = document.querySelector("#edit");
nav.forEach(e => {
    e.addEventListener("click", function() {
        if(e == nav[0]) {
            list.style.display = "none";
            edit.style.display = "none";
            form.style.display = "block";
        }
        else if(e == nav[1]) {
            list.style.display = "block";
            edit.style.display = "none";
            form.style.display = "none";
        }
        else if(e == nav[2]) {
            list.style.display = "none";
            edit.style.display = "block";
            form.style.display = "none";
        }
    })
});
