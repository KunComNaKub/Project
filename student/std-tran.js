if(value_std_confirm == 0){
    let btntran = document.querySelectorAll(".pass,.notpass,.pending");
    btntran.forEach(btn => btn.style.display = "none")
}
if(value_std_confirm == 1){
    let btntran = document.querySelectorAll(".pass,.notpass,.no-tran");
    btntran.forEach(btn => btn.style.display = "none")
}
if(value_std_confirm == 2){
    let btntran = document.querySelectorAll(".pass,.pending,.no-tran");
    btntran.forEach(btn => btn.style.display = "none")
}
if(value_std_confirm == 3){
    let btntran = document.querySelectorAll(".pending,.notpass,.no-tran");
    btntran.forEach(btn => btn.style.display = "none")
}