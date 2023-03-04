# Project transfer student Website โปรเจคจบ เว็บไซต์ระบบเทียบโอนนักศึกษามหาลัย 

เป็นโปรเจคจบ ของมหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก วิทยาเขตจักรพงษภูวนารถ เป็นโปรเจค เว็บไซต์เทียบโอนนักศึกษา
โดยใช้ภาษา PHP CSS Javascript และใช้ Database เป็น MySql และใช้ Xammp เพื่อใช้เป็น webserver

## ขั้นตอนการติดตั้ง

1. สร้างโฟล์เดอร์ชื่อ Senior Project ไว้ใน Htdocs ตัวอย่างเช่น path: C:\xampp\htdocs\Senior Project

2. git clone https://github.com/KunComNaKub/Project.git ในโฟล์เดอร์ Senior Project

3. แก้ไข CHARSET สำหรับบ้างเครื่องที่ ไม่มี CHARSET utf8mb4 COLLATE=utf8mb4_0900_ai_ci ไฟล์ database โดยเข้าไปที่ Project และเลือก project.sql กด ctrl+f ค้นหาชือ utf8mb4 COLLATE=utf8mb4_0900_ai_ci ลบทิ้ง แล้วแทนด้วย CHARSET ที่เครื่องของคุณมี

4. เข้า phpmyadmin import file ในโฟล์เดอร์ Project ชื่อไฟล์ คือ project.sql

## เครดิต
Pongsakorn Khumphis - ออกแบบโครงสร้างทั้งหมด ออกแบบเว็บไซต์ทั้งหมด วางแผนการทำงาน เขียนโค้ดทั้งหมด
