const Select = document.querySelector('.sub-catagorie');
var b = Select.value;
Select.addEventListener('change',function(){
    var a = this.value;
    $test = document.querySelector(".group-sub");
        if(a == "กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์" ){   
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
        else if(a == "กลุ่มวิทยาศาสตร์และคณิตศาสตร์"){
            $test.length = 1;
            const opt8 = document.createElement("option");
            opt8.value = "รายวิชาบังคับ";
            opt8.classList = "3"
            opt8.text = "รายวิชาบังคับ";

            const opt9 = document.createElement("option");
            opt9.value = "รายวิชาคณิตศาสตร์";
            opt9.classList = "3"
            opt9.text = "รายวิชาคณิตศาสตร์";

            const opt10 = document.createElement("option");
            opt10.value = "รายวิชาวิทยาศาสตร์";
            opt10.classList = "3"
            opt10.text = "รายวิชาวิทยาศาสตร์";

            $test.add(opt8, null);
            $test.add(opt9, null);
            $test.add(opt10, null);
        }
        else if(a == "กลุ่มบูรณาการ"){
            $test.length = 1;
            const opt11 = document.createElement("option");
            opt11.value = "รายวิชาบังคับ";
            opt11.classList = "4"
            opt11.text = "รายวิชาบังคับ";

            const opt12 = document.createElement("option");
            opt12.value = " รายวิชาบูรณาการ";
            opt12.classList = "4"
            opt12.text = " รายวิชาบูรณาการ";

            $test.add(opt11, null);
            $test.add(opt12, null);
        }
        else if(a == "กลุ่มวิชาแกน"){
            $test.length = 1;
            const opt13 = document.createElement("option");
            opt13.value = "วิชาแกน";
            opt13.classList = "5"
            opt13.text = "วิชาแกน";

            const opt14 = document.createElement("option");
            opt14.value = "วิชาเฉพาะด้าน";
            opt14.classList = "5"
            opt14.text = "วิชาเฉพาะด้าน";

            const opt15 = document.createElement("option");
            opt15.value = "วิชาเลือก";
            opt15.classList = "5"
            opt15.text = "วิชาเลือก";

            $test.add(opt13, null);
            $test.add(opt14, null);
            $test.add(opt15, null);
        }
        else if(a == "กลุ่มวิชาฝึกงานและประสบการณ์"){
            $test.length = 1;
            const opt16 = document.createElement("option");
            opt16.value = "แผนฝึกงาน";
            opt16.classList = "6"
            opt16.text = "แผนฝึกงาน";
            
            const opt17 = document.createElement("option");
            opt17.value = "แผนสหกิจศึกษา";
            opt17.classList = "6"
            opt17.text = "แผนสหกิจศึกษา";

            const opt18 = document.createElement("option");
            opt18.value = "แผนเรียนรู้ร่วมกับการทำงาน";
            opt18.classList = "6"
            opt18.text = "แผนเรียนรู้ร่วมกับการทำงาน";

            $test.add(opt16, null);
            $test.add(opt17, null);
            $test.add(opt18, null);
        }
        else if(a== "เลือกเสรี"){
            $test.length = 1;
            const opt19 = document.createElement("option");
            opt19.value = "เลือกเสรี";
            opt19.classList = "7";
            opt19.text = "เลือกเสรี";

            $test.add(opt19,null);
        }
        else{
            $test.length =1;
        }
})




