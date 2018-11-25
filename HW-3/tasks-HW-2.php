<?php

/*
 * PHP-1 HW-2
 * 
  1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые
  делятся на 3 без остатка.






  6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое
 * через PHP. Необходимо представить пункты меню как элементы массива и вывести 
 * их циклом. Подумать, как можно реализовать меню с вложенными подменю? 
 * Попробовать его реализовать через рекурсию. Чтобы любой уровень вложенности 
 * формировался по массиву. Не забудьте чтобы гиперссылки тоже были в массиве.
  7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла.
 * Выглядеть должно так:
  for (…){ // здесь пусто}

  8. *Повторить третье задание, но вывести на экран только города, начинающиеся
 * с буквы «К».

  10. * Заполнить массив в 100 элементов случайными числами от 1 до 200, так,
 * чтобы они не повторялись. Задача на бесконечный цикл while(true)
 * 
 */

$task = "<pre>1. С помощью цикла while вывести все числа в промежутке от 0 до 100,  
    которые делятся на 3 без остатка. </pre> <br /><br /><br />";

$lineBracker = "<br /><hr /><br />";


$count = 0;

echo "{$task}";

while ($count <= 100) {
    if (($count % 3) === 0) {
        $strOfNumbers .= "{$count} ";
    }
    $count++;
}

echo $strOfNumbers;

echo $lineBracker;
$task = "<pre>2. С помощью цикла do…while написать функцию для вывода чисел от 0 до  10, чтобы 
   
результат выглядел так: 
0 – это ноль. 
1 – нечетное число. 
2 – четное число. 
3 – нечетное число. 
…
10 – четное число.</pre> <br /><br /><br />";

echo "{$task}";

$count = 0;

$strOfNumbers = "";

while ($count <= 10) {
    if ($count === 0) {
        $strOfNumbers .= "{$count} - это ноль. <br />";
        $count++;
    }

    $strOfNumbers .= ($count % 2 === 0) ? "{$count} - это четное число. <br />" : "{$count} - это нечетное число. <br />";

    $count++;
}

echo $strOfNumbers;

//задание №3
echo $lineBracker;
$task = "<pre>3. Объявить массив, в котором в качестве ключей будут использоваться 
названия областей, а в качестве значений – массивы с названиями городов из 
соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)</pre>
<br />
";

echo "{$task}";

$arrayOfCities = [
    "Московская область" => [
        "Москва",
        "Зеленоград",
        "Клин"
    ],
    "Ленинградская область" => [
        "Санкт-Петербург",
        "Всеволожск",
        "Павловск",
        "Кронштадт"
    ]
];

$strOfNumbers = "";

foreach ($arrayOfCities as $key => $value) {
    $strOfNumbers .= "{$key} : <br />";
    foreach ($value as $k => $val) {
        $strOfNumbers .= ($k != (count($value) - 1)) ? "{$val}, " : "{$val}";
    }
    $strOfNumbers .= "<br />";
}

echo $strOfNumbers;


//Задание №4

echo $lineBracker;
$task = "<pre>4. Объявить массив, индексами которого являются буквы русского языка, а
значениями – соответствующие латинские буквосочетания 
 (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. Алгоритм должен быть эффективен по
итерациям, если найдете готовую функцию, сделайте ее вторым вариантом,
реализовать самому через цикл, строчку можно в массив через регулярку, 
но не обязательно (см.допматериалы)</pre>";

echo "{$task}";

$arrayOfLetters = ["а" => "a",
    "б" => "b",
    "в" => "v",
    "г" => "g",
    "д" => "d",
    "е" => "e",
    "ё" => "e",
    "ж" => "zh",
    "з" => "z",
    "и" => "i",
    "й" => "y",
    "к" => "k",
    "л" => "l",
    "м" => "m",
    "н" => "n",
    "о" => "o",
    "п" => "p",
    "р" => "r",
    "с" => "s",
    "т" => "t",
    "у" => "u",
    "ф" => "f",
    "х" => "kh",
    "ц" => "ts",
    "ч" => "ch",
    "ш" => "sh",
    "щ" => "shch",
    "ъ" => "",
    "ы" => "y",
    "ь" => "",
    "э" => "e",
    "ю" => "yu",
    "я" => "ya"];

$stringToChange = "Cтрока которую нужно Переделать!";
$lengthOfStr = mb_strlen($stringToChange);

function toLatin($arrayOfLetters, $letter, $newString) {
    if ($letter != mb_strtoupper($letter)) {
        $newString .= $arrayOfLetters[$letter] ?? $letter;
    } else {
        if (isset($arrayOfLetters[mb_strtolower($letter)])) {
            $newString .= strtoupper($arrayOfLetters[mb_strtolower($letter)]);
        } else {
            $newString .= $letter;
        }
    }
    return $newString;
}

for ($i = 0; $i < $lengthOfStr; $i++) {
    $letter = mb_substr($stringToChange, $i, 1);
    $newString = toLatin($arrayOfLetters, $letter, $newString);
}

echo $stringToChange . "<br><br>";
echo $newString;





echo $lineBracker;
$task = "<pre>5. Написать функцию, которая заменяет в строке пробелы на 
подчеркивания и возвращает видоизмененную строчку. Можно через str_replace

9. *Объединить две ранее написанные функции в одну, которая получает строку на
русском языке, производит транслитерацию и замену пробелов на подчеркивания 
(аналогичная задача решается при конструировании url-адресов на основе 
названия статьи в блогах).</pre><br>";

echo $task;

$arrayOfLetters = ["а" => "a",
    "б" => "b",
    "в" => "v",
    "г" => "g",
    "д" => "d",
    "е" => "e",
    "ё" => "e",
    "ж" => "zh",
    "з" => "z",
    "и" => "i",
    "й" => "y",
    "к" => "k",
    "л" => "l",
    "м" => "m",
    "н" => "n",
    "о" => "o",
    "п" => "p",
    "р" => "r",
    "с" => "s",
    "т" => "t",
    "у" => "u",
    "ф" => "f",
    "х" => "kh",
    "ц" => "ts",
    "ч" => "ch",
    "ш" => "sh",
    "щ" => "shch",
    "ъ" => "",
    "ы" => "y",
    "ь" => "",
    "э" => "e",
    "ю" => "yu",
    "я" => "ya"];

$arrayOfOtherSimbols = [
    " " => "_"
];

//$stringToChange = "Cтрока которую нужно Переделать!";
$stringToChange = "5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и
возвращает видоизмененную строчку. Можно через str_replace";

$lengthOfStr = mb_strlen($stringToChange);
$newString = "";

function toLatin2($arrayOfLetters, $letter, $newString, $arrayOfOtherSimbols) {
    if ($letter != mb_strtoupper($letter)) {
        if (isset($arrayOfLetters[$letter])) {
            $newString = $arrayOfLetters[$letter];
        } else { $newString = $arrayOfOtherSimbols[$letter] ?? $letter;}
    } else {
        if (isset($arrayOfLetters[mb_strtolower($letter)])) {
            $newString = strtoupper($arrayOfLetters[mb_strtolower($letter)]);
        } else {
            $newString = $arrayOfOtherSimbols[$letter] ?? $letter;
        }
    }
    return $newString;
}

for ($i = 0; $i < $lengthOfStr; $i++) {
    $letter = &mb_substr($stringToChange, $i, 1);
    $newletter = toLatin2($arrayOfLetters, $letter, $newString, $arrayOfOtherSimbols);
    $stringToChange = str_replace($letter, $newletter, $stringToChange);
  
}
//$stringToChange = str_replace($russianLetters, $englishLerrers, $stringToChange);
echo $stringToChange . "<br><br>";

?>

