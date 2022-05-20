const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
var edit_btn = document.querySelectorAll(".edit_btn");
var name_index = document.querySelectorAll(".name_index");
var modal = document.querySelector(".modall");
// setInterval(()=>{
//     alert("alo");
    
// },1000)
edit_btn.forEach((e,index)=> {
    
    edit_btn[index].addEventListener("click", ()=>{
        modal.style.display ="block";
        $('#name_edit').value = name_index[index].innerText;
        $('#id_edit').value = $$('.id_index')[index].innerText;
        $('#id_edit_x').value = $$('.id_index')[index].innerText;
        $('#age_edit').value = $$('.age_index')[index].innerText;
        $('#class_edit').value = $$('.class_index')[index].innerText;
        $('#score_edit').value = $$('.score_index')[index].innerText;
       if($$('.sex_index')[index].innerText == "Nam") {
        $('#nam_edit').checked = true;
       }else {
        $('#nu_edit').checked = true;
       }
    }) 
})
$$('.closee').forEach(e=>{
    e.addEventListener("click", ()=>{
        modal.style.display ="none";
        
    }) 
})

