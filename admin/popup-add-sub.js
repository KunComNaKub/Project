
document.querySelector("#btn-add-sub").addEventListener("click",function(){
    document.querySelector(".overlay").classList.add("active");
})
document.querySelector(".poppup-add-sub .close-btn").addEventListener("click",function(){
    document.querySelector(".overlay").classList.remove("active");
});

const Select = document.querySelector('.sub-catagorie');
Select.addEventListener('change',function(){
    var a = this.value;
        if(a == "กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์"){
            $test = document.querySelector(".group-sub");
            $test.length = 1;
            const opt1 = document.createElement("option");
            opt1.value = "รายวิชาบังคับ";
            opt1.classList = "1"
            opt1.text = "รายวิชาบังคับ";

            const opt2 = document.createElement("option");
            opt2.value = "รายวิชาสังคมศาสตร์";
            opt2.classList = "1"
            opt2.text = "รายวิชาสังคมศาสตร์";

            const opt3 = document.createElement("option");
            opt3.value = "รายวิชามนุษศาสตร์";
            opt3.classList = "1"
            opt3.text = "รายวิชามนุษศาสตร์";

            $test.add(opt1, null);
            $test.add(opt2, null);
            $test.add(opt3, null);

            console.log($test.length)
        }
        else if(a == "กลุ่มภาษา"){
            $test.length = 1;
            const opt4 = document.createElement("option");
            opt4.value = "รายวิชาบังคับ";
            opt4.classList = "2"
            opt4.text = "รายวิชาบังคับ";

            const opt5 = document.createElement("option");
            opt5.value = "รายวิชาภาษาไทย";
            opt5.classList = "2"
            opt5.text = "รายวิชาภาษาไทย";

            const opt6 = document.createElement("option");
            opt6.value = "รายวิชาภาษาอังกฤษ";
            opt6.classList = "2"
            opt6.text = "รายวิชาภาษาอังกฤษ";

            const opt7 = document.createElement("option");
            opt7.value = "รายวิชาภาษาต่างประเทศอื่น";
            opt7.classList = "2"
            opt7.text = "รายวิชาภาษาต่างประเทศอื่น";
            $test.add(opt4, null);
            $test.add(opt5, null);
            $test.add(opt6, null);
            $test.add(opt7, null);
    }

})
