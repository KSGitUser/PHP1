<?php

//5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, 
//вывести текущий год в подвале при помощи встроенных функций PHP.



//<?php 
//
//$citeContent = "
//	<!DOCTYPE html>
//	<html>
//
//	<head>
//		$title
//	</head>
//
//	<body>
//		<center>
//			$h1
//		</center>
//		Краткая биография обо мне
//		Родился в 1985 году в городе Москва. Закончил в 2008 году МАИ.
//		На данный момент работаю ведущим инженером в крупной авиакомпании.
//		Поскольку я люблю авиацию, то хотел бы поделиться несколькими интересными
//		фотографиями на эту тему
//		<br><br>
//		Тут можете поместить картинку
//		<br><br>
//		<font style=\"color:green\">Этот текст зеленый</font>
//		<br><br>
//		<b>Просто пример жирного текста</b>
//		<br><br>
//		<center>
//			$date
//		</center>
//	</body>
//
//	</html>";
//echo $citeContent;


$indexTemplate = file_get_contents("site.tpl");

$headerTemplate = file_get_contents("header.tpl");

$contentTemplate = file_get_contents("content.tpl");

$footerTemplate = file_get_contents("footer.tpl");

$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$date = "&copy Все права защищены " . date("Y");

$header = str_replace("{{TITLE}}", $title, $headerTemplate);
$content = str_replace("{{HEADER}}", $h1, $contentTemplate);
$footer = str_replace("{{DATE}}", $date, $footerTemplate);

$citeContent = str_replace("{{HEADER}}", $header, $indexTemplate);
$citeContent = str_replace("{{CONTENT}}", $content, $citeContent);
$citeContent = str_replace("{{FOOTER}}", $footer, $citeContent);

echo $citeContent;









