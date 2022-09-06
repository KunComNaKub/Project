<?php
if(!$_SESSION['student_name_login']){

    session_destroy();
    Header('Location: ../index.html');

}
?>