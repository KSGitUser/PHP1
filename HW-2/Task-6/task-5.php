<?php

//5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, 
//вывести текущий год в подвале при помощи встроенных функций PHP.






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











