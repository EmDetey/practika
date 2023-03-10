<?php 
sleep(3);
    $connect = mysqli_connect('127.0.0.1','root','','truegames');
    session_start();
   
    mysqli_query($connect," INSERT INTO `korzina` (`user_id`,`tovar_id`,`img`,`title`,`price`) VALUES ( '$_SESSION[user_id]' , '$_POST[tovarId]' , '$_POST[tovarImg]','$_POST[tovarTitle]','$_POST[tovarPrice]')");
    echo $_POST['tovarPrice']."\n";
    echo $_POST['tovarTitle']."\n";
    echo $_POST['tovarImg']."\n";
