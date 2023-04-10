<?php require_once "header.php"; ?>

<div class="container">
    <div class="container__title">
        <h1>Девиз компании</h1>
    </div>
    <div class="container__block">
        <div class="container__block__img">
            <div class="logo">
        <h1>True<span>Games</span> </h1>
            </div>
        </div>
        <div class="container__block__text">
            <p>Играй по взрослому !!!</p>
        </div>
    </div>
</div>
<br><br>
<div class="slider-con">
    <div class="slider single-item">
        <?
            $slider_tovar = mysqli_query($connect, "SELECT * FROM `tovar` ORDER BY `id` DESC LIMIT 6");
        while(($slide = mysqli_fetch_assoc($slider_tovar))):?>
            <div class="slide">
                <img src=<?=$slide['img'];?> alt="">
                <div class="title"><?=$slide['title'];?></div>
                <div class="price"><?=$slide['price'];?></div>
            </div>
        <?endwhile;?>
    </div>
</div>



<?php require_once "footer.php"; ?>