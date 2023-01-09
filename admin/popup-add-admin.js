document.querySelector("#btn-add-admin").addEventListener("click",function(){
    document.querySelector(".overlay").classList.add("active");
});
document.querySelector(".popup-add-admin .close-btn").addEventListener("click",function(){
    document.querySelector(".overlay").classList.remove("active");
});