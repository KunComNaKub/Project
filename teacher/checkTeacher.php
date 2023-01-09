<?php
if(!$_SESSION['teacher_name_login']){
    
    session_destroy();
    Header('Location: ../index.html');
}

?>
<!-- พงศกร ขำพิศ -->