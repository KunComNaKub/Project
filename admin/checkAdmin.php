<?php
if(!$_SESSION['admin_name_login']){

    session_destroy();
    Header('Location: ../index.html');

}
?>
<!--พงศกร ขำพิศ-->