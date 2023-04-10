<?php 
error_reporting(0);
session_start();
$connect = mysqli_connect('127.0.0.1','root','','truegames');

if($connect === false) echo "erro connect to database";
if(isset($_REQUEST['OnExit'])) session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"
    />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
<header>
    <div class="logo">
        <h1>True<span>Games</span> </h1>
    </div>
    <div class="menu">
        <a href="/">О нас</a>
        <a href="/katalog.php">Каталог</a>
        
        
        <a href="/where.php">Где нас найти?</a>
        
        <?php if(empty($_SESSION)): ?>
        <a href="/regPage.php" id="rg-b">Регистрация</a>
        <a href="/authPage.php">Авторизация</a>
        <?php else:?>
        <a href="?OnExit">Выйти</a>
        <a href="javascript:return false" class='korz-item'>Корзина</a>
        <?endif?>
        <?if($_SESSION['login'] === 'admin'):?>
            <a href="/admin.php">Администрирование</a>
        <?endif?>    


    </div>
</header>
<div class="korz">
    <?
        $korz_items = mysqli_query($connect,"SELECT * FROM `korzina` WHERE '$_SESSION[user_id]'= `user_id` ORDER BY `id` DESC");
        
            while(($korz_item = mysqli_fetch_assoc($korz_items))):

        ?>
            <div class="k-item">
                <img src=<?=$korz_item['img']?> alt="">

                <h2 style="color:orange"><?=$korz_item['title']?></h2>

                <h2 style="color:green"><?=$korz_item['price']?> RUB</h2>

                
            </div>
        <?
        endwhile;
        
        ?>
        
    
</div>