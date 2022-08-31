document.querySelector("#btn-add-std").addEventListener("click",function(){
    document.querySelector(".overlay").classList.add("active");
});
document.querySelector(".popup-add-std .close-btn").addEventListener("click",function(){
    document.querySelector(".overlay").classList.remove("active");
});
//พงศกร ขำพิศ