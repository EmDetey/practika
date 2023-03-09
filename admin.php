<? require_once "header.php"; ?>

    <?if($_SESSION['login'] === 'admin'):?>
        <div class="container">
            <form action="" method="get">
                <h1>+</h1>
                <input type="file" name="file" id="">
                <input type="text" name="title" placeholder="имя товара">
                <input type="text" name="price" placeholder="цена">
                <input type="submit" name="newTovar">
            </form>
            <br> <br>
            <?
                $items = mysqli_query($connect,"SELECT * FROM `tovar` ORDER BY `id` DESC");
                while(($item = mysqli_fetch_assoc($items))):
            ?>
            <div class="item">
                
                <form action="" method="get">
                    <img src=<?=$item['img']?> alt="">
                    <input type="text" name="title" value="<?=$item['title']?>" >
                    <input type="text" name="price" value="<?=$item['price']?>">
                    <input type="hidden" value="<?=$item['id']?>">
                    <input type="submit" name="newTovar">

                </form>
            </div>
            <?endwhile?>
        </div>
    <?else:?>
        <h1>У вас нет доступа к админ панели !!!</h1>
    <?endif;?>    

<? require_once "footer.php"; ?>