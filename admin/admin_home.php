<?php
session_start();
require 'checkAdmin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>   
    </head>
    <body> 
        <!--web forms-->
        <header class="header">
        <img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo">
        </header>
        <div class="container">
            <nav class="sidebar">
                <div class="menu-bar">
                    <div class="menu">
                        <ul class="menu-links">
                            <li class="link">
                                <a href ="admin_home.php">
                                    <span class="text nav-text">หน้าหลัก ADMIN</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="admin_manageStd.php">
                                    <span class="text nav-text">จัดการรายชื่อนักศึกษา</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="add-user-teacher.php">
                                    <span class="text nav-text">เพิ่มผู้ใช้งานอาจารย์</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="Admin_manageSub.php">
                                    <span class="text nav-text">จัดการวิชา</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="add-admin.php">
                                    <span class="text nav-text">เพิ่ม Admin</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="logout.php">
                                    <span class="text nav-text">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--content-->
            <section class="home">
                <div class="text">test</div>
                <?php
                echo $_SESSION['admin_name_login']
                ?>
            </section>
        </div>
    </body>
</html>
<!--พงศกร ขำพิศ-->