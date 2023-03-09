<? require_once "header.php";?>

<div class="wrapper">
    <div class="title">
        <h1>Каталог</h1>
    </div>

    <div class="con-cat">
        <?
        $tovars = mysqli_query($connect,"SELECT * FROM `tovar`");

        while(($tovar = mysqli_fetch_assoc($tovars))):
        ?>


            <div class="card">
                <img src=<?=$tovar['img']?> alt="">
                <h1><?=$tovar['title']?></h1>
                <div class="t-c">
                    <form action="/tovarCard.php" method="get">
                        <input type="hidden"  name = "tovar_id" value=<?=$item['id']?>>
                        <button  class="onCorz" type="submit">В корзину</button>
                    </form>
                </div>
            </div>

<?endwhile;?>
    </div>
</div>

<? require_once "footer.php"; ?>