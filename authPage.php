<? require_once "header.php"; ?>
<?
if(isset($_REQUEST['sub-auth'])){
$errors = [];
foreach($_POST as $key => $value)
{
    $fields = trim($value);
    if(empty($fields))
    {
        $errors[] = "заполните поле ".$key;
    
    }
}

$selectUsers = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = '$_POST[login]' and `passwords` = '$_POST[pass]' ");
if(mysqli_num_rows($selectUsers) == 0)
{
    $errors [] = "неверный логин или пароль";
}
if(empty($errors))
{
    $user_id =  mysqli_query($connect,"SELECT * FROM `users` WHERE '$_POST[login]'= `login`");
    $user_id_assoc = mysqli_fetch_assoc($user_id);
   $_SESSION['login'] = $_POST['login'];
   $_SESSION['user_id'] = $user_id_assoc['id'];
   header("Location: /");
  

}
}
?>
<div class="wrapper">

<form action="" method="post" class="reg-form">
<div class="alert-error">
        <?if(isset($_REQUEST['sub-auth'])):?>
            <?if(!empty($errors)):?>
                <?foreach($errors as $error):?>
                    <p><?=$error?></p>
                <?endforeach?>
            <?else:?>
                <p>Успешно</p>
                <?endif?>
            <?endif?>            
    </div>
   
    <input type="text" name="login" placeholder="логин">
    
    <input type="password" name="pass" placeholder="пароль">
    
    <input type="submit" name="sub-auth">
</form>

</div>

<? require_once "footer.php"; ?>