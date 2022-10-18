var frm = document.querySelector('form.box_transfer');
var inputs = frm.querySelectorAll('.tranfer-validate');
frm.addEventListener('submit', function(e) {
    e.preventDefault();
    var classArr = [];


    for(var i = 0; i < inputs.length; i++) {
        classArr.push(inputs[i].value);
    }


    for(var i = 0 ;i < classArr.length;i++){
        if(classArr[i] === ""){
            classArr.splice(i,1);
            i--;
    }
}

function hasDuplicates(arr) {
    var counts = [];

    for (var i = 0; i <= arr.length; i++) {
        if (counts[arr[i]] === undefined) {
            counts[arr[i]] = 1;
        } else {
            return true;
        }
    }
    return false;
}
if (hasDuplicates(classArr)) {
    alert('มี รหัสวิชา หรือ วิชาได้ใช้ซ่ำ');
  } 
  
})
