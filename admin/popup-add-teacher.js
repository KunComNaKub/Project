document.querySelector("#box-add-teacher").addEventListener("click",function(){
    document.querySelector(".overlay").classList.add("active");
})
document.querySelector(".popup-add-teacher .close-btn").addEventListener("click",function(){
    document.querySelector(".overlay").classList.remove("active");
});