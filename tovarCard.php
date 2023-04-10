<?php 
 session_start();
 $connect = mysqli_connect('127.0.0.1','root','','truegames');
 
 $tovaCard = mysqli_query($connect,"SELECT * FROM `tovar` WHERE '$_GET[tovarId]' = `id`");
$tovarC = mysqli_fetch_assoc($tovaCard);
$_SESSION['id_tovar'] = $_GET['tovarId'];
 $_SESSION = $tovarC['img_tovar'];
 $_SESSION = $tovarC['title_tovar'];
 $_SESSION['price_tovar'] = $tovarC['price'];

 echo $_SESSION['id_tovar'];