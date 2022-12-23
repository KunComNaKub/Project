if(value_std_confirm == 1){
    let btnLinkTran = document.querySelectorAll(".btn_link_tran,.btn_delete_trans");
    btnLinkTran.forEach(btn => btn.classList.add("disable"));
    document.querySelector(".btn-confirm-tran").classList.add("disable");
}
if(value_std_confirm == 0){
    document.querySelector(".btn-cancle_tran").classList.add("disable");
}
//พงศกร ขำพิศ