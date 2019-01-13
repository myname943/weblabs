<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа 8</title>
</head>
<style>
    label {
        width: 250px;
        color: blueviolet;
    }
    input[type="text"]{
        width: 400px;
        padding: 0;
        margin: 0;
    }
    input[type="submit"]{
        background-color: white;
        border: 2px solid blueviolet;
        border-radius: 10px;
        text-align: center;
        width: 200px;
        padding: 5px;
		margin-left:10px;
		margin-top:10px;
    }
	input[type="reset"]{
        background-color: white;
        border: 2px solid red;
        border-radius: 10px;
        text-align: center;
        width: 200px;
        padding: 5px;
	    margin-top:10px;
    }
    .in{
        display: flex;
        margin: 20px 50px;
    }
    span{
        font-size: 20px;
        color: blueviolet;
    }
    th{
        color: blueviolet;
        font-size: 16px;
    }
    table{
        margin-top: 50px;
    }
    form{
        display: flex; flex-direction: column; align-items: center;
        margin-bottom: 50px;
    }
	.onebox {
        border: 2px solid blueviolet;
        border-radius: 10px;
        padding: 5px;
	}
</style>
<body>
<form action="task1.php" method="post">
    <span>Заполните пожалуйста анкету.</span><br>
    <div class="onebox">
        <div class="in"><label>Введите ваше ФИО: </label><input type="text" name="username"></div>
        <div class="in"><label>Введите пароль: </label><input type="text" name="pass"></div>
        <div class="in">
            <label>Ваш род занятий</label>
			<select name="sel_realty">
			    <option type="radio" value="Инф. технологии">Инф. технологии</option>
                <option type="radio" value="Метематика">Метематика</option>
            </select>
        </div>
		       <div class="in">
            <label>Пол</label>
				<input name="optiongen" type="radio" value="Мужской"> Мужской
				<input name="optiongen"  type="radio" value="Женский">Не мужской
        </div>
		<div class="in"><label>Сведения об образовании: </label><textarea name="edu"></textarea></div>
		 <div class="in">
            <label>Ваши предпочтения<br>(один или несколько вариантов)</label>
				<p><input type="checkbox" name="option1" value="a1" checked>Все равно<br>
				<input type="checkbox" name="option2" value="a2">Работа с клиентами<br>
				<input type="checkbox" name="option3" value="a3">Работа с документами<br> 
				<input type="checkbox" name="option4" value="a4">Работа в одиночку<br> 
				<input type="checkbox" name="option5" value="a5">Получать деньги не работая</p>
        </div>
    </div>
	<div class="in">
	<input class="button" type="reset" value="Очистить форму">
    <input class="button" type="submit" value="Отправка данных">
	</div>
</form>
<div class="onebox">
<?php
$max_no_img=2; // Maximum number of images value to be set here

echo "<form method=post action='' enctype='multipart/form-data'>";
echo "<table border='0' width='400' cellspacing='0' cellpadding='0' align=center>";
for($i=1; $i<=$max_no_img; $i++){
echo "<tr><td>Images $i</td><td>
<input type=file name='images[]' class='bginput'></td></tr>";
}
echo "<hr />";
echo "<tr><td colspan=2 align=center><input type=submit value='Загрузить изображение'></td></tr>";
echo "</form> </table>";
while(list($key,$value) = each($_FILES['images']['name']))
{
    //echo $key;
    //echo "<br>";
    //echo $value;
    //echo "<br>";
if(!empty($value)){   // this will check if any blank field is entered
$filename =rand(1,100000).$value;    // filename stores the value

$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line

$add = "C:/Users/frank/Downloads/OSPanel/domains/lab8/uploads/$filename";   // upload directory path is set
//echo $_FILES['images']['type'][$key];     // uncomment this line if you want to display the file type
//echo "<br>";                             // Display a line break
copy($_FILES['images']['tmp_name'][$key], $add);

    //  upload the file to the server
chmod("$add",0777);                 // set permission to the file.
}
}
?>
</div>
<!--<form enctype="multipart/form-data" action="load.php" method="POST" >-->
<!--     Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
<!-- <div class="in"> <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
<!--    Название элемента input определяет имя в массиве $_FILES -->
<!--     <label>Отправить этот файл: </label><input name="userfile" type="file" /> </div>-->
<!--    <input type="submit" value="Отправить файл" />-->
<!--</form>-->

<form action="mail.php" method="post">
    <span>Jтправка письма по указанному адресу</span>
    <div>
        <div class="in"><label>Фамилия: </label><input type="text" name="surname" ></div>
        <div class="in"><label>Имя: </label><input type="text" name="name"></div>
        <div class="in"><label>Отчество: </label><input type="text" name="backname"></div>
        <div class="in"><label>Текст сообщения: </label><textarea name="textmail">Ввудите текст</textarea></div>
        <div class="in"><label>E-mail отправителя </label><input type="text" name="email"></div>
        <div class="in"><label>E-mail получателя </label><input type="text" name="mail"></div>
    </div>
    <!--<textarea name="content" cols="9" rows="10"></textarea>-->

    <input class="button" type="submit" value="Отправить">
</form>
</body>
</html>