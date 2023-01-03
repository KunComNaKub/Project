if(value_std_confirm == 0){
    let btntran = document.querySelectorAll(".pass,.pending");
    btntran.forEach(btn => btn.style.display = "none")
    let btncon = document.querySelectorAll(".preview-std,.download-std");
    btncon.forEach(btnd => btnd.classList.add("disable"));
}
if(value_std_confirm == 1){
    let btntran = document.querySelectorAll(".pass,.no-tran");
    btntran.forEach(btn => btn.style.display = "none")
    document.querySelector(".download-std").classList.add("disable");
    document.querySelector(".preview-std").classList.remove("disable");
}
if(value_std_confirm == 2){
    let btntran = document.querySelectorAll(".pending,.no-tran");
    btntran.forEach(btn => btn.style.display = "none")
    document.querySelector(".download-std").classList.remove("disable");
}
if(pic_upload != ""){
    document.querySelector(".sometime").classList.add("disable");
}
if(pic_upload == ""){
    document.querySelector(".sometime2").classList.add("disable");
    document.querySelector(".preview-pic").classList.add("disable");
}
/*พงศกร ขำพิศ*/