<?php

/*
  0 часов	минут	10 часов минут 20 часов минут	30 минут  40 минут    50 минут
  1 час	        минута	11 часов минут 21 час	минута	31 минута 41 минута   51 минута
  2 часа	минуты	12 часов минут 22 часа	минуты	32 минуты 42 минуты   52 минуты
  3 часа	минуты	13 часов минут 23 часа	минуты	33 минуты 43 минуты   53 минуты
  4 часа	минуты	14 часов минут 24 	минуты	34 минуты 44 минуты   54 минуты
  5 часов	минут	15 часов минут 25	минут	35 минут  45 минут    55 минут
  6 часов	минут	16 часов минут 26	минут	36 минут  46 минут    56 минут
  7 часов       минут	17 часов минут 27	минут	37 минут  47 минут    57 минут
  8 часов	минут	18 часов минут 28	минут	38 минут  48 минут    58 минут
  9 часов       минут	19 часов минут 29	минут	39 минут  49 минут    59 минут
 *                                                                            60 минут
 */

//Получаем время в часах от 0 до 23 и проиводим дополнительные вычисления
$hours = date("G");
$getLastHourDigit = ($hours > 19) ? $hours % 10 : $getLastHourDigit = $hours;
$arrayOfHoursNames = array("часов", "час", "часа");

//Получаем время в минутах от 0 до 60 и проиводим дополнительные вычисления
$minutes = date("i");
$getLastMinuteDigit = ($minutes > 19) ? $minutes % 10 :
        $getLastMinuteDigit = $minutes;
$arrayOfMinutesNames = array("минут", "минута", "минуты");

echo date("G:i");
echo "<br />";

//Вызывем функции для отоброжения результата
namingTime($hours, $getLastHourDigit, $arrayOfHoursNames);
namingTime($minutes, $getLastMinuteDigit, $arrayOfMinutesNames);

//Функция для определиеня и подстановки правильного склонения
function namingTime($time, $getLastDigit, $arrayOfNames) {
    switch ($getLastDigit) {
        case 0:
        case ($getLastDigit >= 5 && $getLastDigit <= 19):
            echo "{$time} {$arrayOfNames[0]} ";
            break;
        case 1:
            echo "{$time} {$arrayOfNames[1]} ";
            break;
        case 2:
        case 3:
        case 4:
            echo "{$time} {$arrayOfNames[2]} ";
            break;
    }
}
