<? require_once "header.php";
     $tovarCard = mysqli_query($connect,"SELECT * FROM `tovar` WHERE `id` = '$_GET[tovar_id]'");

?>
<div class="wrapper">
    <div class="tovar-card">
        <img src=<?=mysqli_fetch_assoc($tovarCard)['img'];?> alt="">
        <h1><?=mysqli_fetch_assoc($tovarCard)['title'];?></h1>
    </div>
</div>
<? require_once "footer.php"; ?>