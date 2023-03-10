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
                    <p><?=$tovar['price']?> RUB</p>
                   
                        
                        <button  class="onCorz" type="submit">В корзину
                        <input type="hidden" class="tovarId"  name = "tovar_id" value=<?=$tovar['id']?>>
                        <input type="hidden" class="tovarImg"  name = "tovar_id" value=<?=$tovar['img']?>>
                        <input type="hidden" class="tovarTitle"  name = "tovar_id" value=<?=$tovar['title']?>>
                        <input type="hidden" class="tovarPrice"  name = "tovar_id" value=<?=$tovar['price']?>>
                        </button>
                    
                </div>
            </div>

<?endwhile;?>
    </div>
</div>

<? require_once "footer.php"; ?>