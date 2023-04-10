<? require_once "header.php"; ?>
<?

//function can_upload($file){
// 	// если имя пустое, значит файл не выбран
//     if($file['name'] == '')
// 		return 'Вы не выбрали файл.';
	
// 	/* если размер файла 0, значит его не пропустили настройки 
// 	сервера из-за того, что он слишком большой */
// 	if($file['size'] == 0)
// 		return 'Файл слишком большой.';
	
// 	// разбиваем имя файла по точке и получаем массив
// 	$getMime = explode('.', $file['name']);
// 	// нас интересует последний элемент массива - расширение
// 	$mime = strtolower(end($getMime));
// 	// объявим массив допустимых расширений
// 	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
// 	// если расширение не входит в список допустимых - return
// 	if(!in_array($mime, $types))
// 		return 'Недопустимый тип файла.';
	
// 	return true;
//   }
  
//   function make_upload($file){	
// 	// формируем уникальное имя картинки: случайное число и name
// 	$name = mt_rand(0, 10000) . $file['name'];
// 	$file['tmp_name']=  'img/' . $name;
//   }

 if(isset($_REQUEST['delete']))
 {
    mysqli_query($connect,"DELETE FROM `tovar` WHERE `id`=".$_REQUEST['tovar_id']);
    echo $_REQUEST['tovar_id'];
 }


 if(isset($_REQUEST['updateTovar']))
 {
    $errors = [];
    if(empty($_GET['title']) && empty($_GET['price'])) $errors[]='поля не заполнены';
    if(empty($errors))
    {
        
        
            mysqli_query($connect,"UPDATE `tovar` SET `title`='$_GET[title]',`price`='$_GET[price]' WHERE `id`= ".$_REQUEST['tovar_id']);
        
    }

 }
    

    if(isset($_REQUEST['newTovar']))
    {
        
       
        
        $errors = [];
        foreach($_GET as $key => $value)
        {
            
            if(empty(trim($value)))
            {
                $errors[] = 'заполните поле '.$key;
            }
            
        }
       

            
        
            if(empty($errors)){
                
               if(move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'\\img\\'.$_FILES['file']['name'])){
                echo 'nice';
               }
               else{
                echo "nope";
               }
               $fileName = '/img/'.$_FILES['file']['name'];
                mysqli_query($connect,"INSERT INTO `tovar` (`title`,`img`,`price`) VALUES ('$_POST[title]','$fileName',$_POST[price])");
                

            }

    }
?>
    <?if($_SESSION['login'] === 'admin'):?>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="alert-error">
        <?if(isset($_REQUEST['newTovar'])):?>
            <?if(!empty($errors)):?>
                <?foreach($errors as $error):?>
                    <p><?=$error?></p>
                <?endforeach?>
            <?else:?>
                <p>Успешно</p>
                <?endif?>
            <?endif?>            
    </div>
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
                <div class="alert-error">
        <?if(isset($_REQUEST['updateTovar'])):?>
            <?if(!empty($errors)):?>
                <?foreach($errors as $error):?>
                    <p><?=$error?></p>
                <?endforeach?>
            <?else:?>
                <p>Успешно</p>
                <?endif?>
            <?endif?>            
    </div>          
                    <img src=<?=$item['img']?> alt="">
                    <input type="text" name="title" value="<?=$item['title']?>" >
                    <input type="text" name="price" value="<?=$item['price']?>">
                    <input type="hidden" name='tovar_id' value="<?=$item['id']?>">
                    <input type="submit" name="updateTovar">
                    <input type="submit" value="delete" name="delete">

                </form>
            </div>
            <?endwhile?>
        </div>
        
    <?else:?>
        <h1>У вас нет доступа к админ панели !!!</h1>
    <?endif;?>    

<? require_once "footer.php"; ?>