<?php
session_start();
session_destroy();

echo "<script>alert('Logout เรียบร้อยแล้ว');</script>"; 
Header('Refresh:0; url=index.php');

?>