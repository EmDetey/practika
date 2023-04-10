<? require_once "header.php";?>
<?
if(isset($_REQUEST['sub-reg'])){
$errors = [];
foreach($_POST as $key => $value)
{
    $fields = trim($value);
    if(empty($fields))
    {
        $errors[] = "заполните поле ".$key;
        
    }
}
if(trim($_POST['pass2']) !== trim($_POST['pass']))
{
    $errors[] = "пароли не совпадают";
   
}
$selectLogin = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = ".$_POST['login']);
$selectEmail = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = ".$_POST['email']);
if(mysqli_num_rows($selectLogin)!= 0) $errors[]= "логин уже занят";
if(mysqli_num_rows($selectEmail)!= 0) $errors[]= "email уже занят";

if(empty($errors))
{
    mysqli_query($connect,"INSERT INTO `users` (`name`,`sername`,`login`,`email`,`passwords`) VALUES ('$_POST[name]','$_POST[surname]','$_POST[login]','$_POST[email]','$_POST[pass]')");
    header("Location: /");

}
}
?>
<div class="wrapper">

<form action="" method="post" class="reg-form">
    <div class="alert-error">
        <?if(isset($_REQUEST['sub-reg'])):?>
            <?if(!empty($errors)):?>
                <?foreach($errors as $error):?>
                    <p><?=$error?></p>
                <?endforeach?>
            <?else:?>
                <p>Успешно</p>
                <?endif?>
            <?endif?>            
    </div>
    <input type="text" name="name" placeholder="имя">
    <input type="text" name="surname" placeholder="фамилия">
    <input type="text" name="login" placeholder="логин">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="pass" placeholder="пароль">
    <input type="password" name="pass2" placeholder="повторите пароль">
    <input type="submit" name="sub-reg">
</form>

</div>


<?require_once "footer.php";?>