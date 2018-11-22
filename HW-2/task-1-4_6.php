<!-- 1. Объявить две целочисленные переменные $a и $b и задать им произвольные 
начальные значения. Затем написать скрипт, который работает по следующему 
принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.

2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора 
switch организовать вывод чисел от $a до 15.

3. Реализовать основные 4 арифметические операции в виде функций с двумя 
параметрами. Обязательно использовать оператор return.

4. Реализовать функцию с тремя параметрами: function mathOperation
($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, 
$operation – строка с названием операции. В зависимости от переданного значения 
операции выполнить одну из арифметических операций (использовать функции из 
пункта 3) и вернуть полученное значение (использовать switch).

5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, 
вывести текущий год в подвале при помощи встроенных функций PHP.

6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: 
function power($val, $pow), где $val – заданное число, $pow – степень.

7. *Написать функцию, которая вычисляет текущее время и возвращает его в 
формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты -->



<?php
/* Задание–1 */

//$a = random_int(-1000, 1000);
//$b = random_int(-1000, 1000);

$a = 0;
$b = 0;

if (($a >= 0 ) && ($b >= 0)) {
    $c = $a - $b;
    echo ("Разность чисел {$a} и {$b}: {$c}");
} else if (($a < 0) && ($b < 0)) {
    $c = $a * $b;
    echo ("Произведение чисел {$a} и {$b}: {$c}");
} else {
    $c = $a + $b;
    echo ("Сумма чисел {$a} и {$b}: {$c}");
}


/* Задание–2 */
$lineBracker = "<br /><hr /><br />";
echo $lineBracker;

$a = random_int(0, 15);

echo "Переменная {$a}";
echo "<br />";
switch ($a) {
    case 0: echo " 0 ";
    case 1: echo " 1 ";
    case 2: echo " 2 ";
    case 3: echo " 3 ";
    case 4: echo " 4 ";
    case 5: echo " 5 ";
    case 6: echo " 6 ";
    case 7: echo " 7 ";
    case 8: echo " 8 ";
    case 9: echo " 9 ";
    case 10: echo " 10 ";
    case 11: echo " 11 ";
    case 12: echo " 12 ";
    case 13: echo " 13 ";
    case 14: echo " 14 ";
    case 15: echo " 15 ";
}
?>


<?php
/* Задание–3 */
echo $lineBracker;

function addition($var1, $var2) {
    return $var1 + $var2;
}

function subtraction($var1, $var2) {
    return $var1 - $var2;
}

function multiplication($var1, $var2) {
    return $var1 * $var2;
}

function division($var1, $var2) {
    return ($var2 !== 0) ? $var1 / $var2 : "Делить на 0 нельзя";
}

$variable1 = random_int(-99, 99);
$variable2 = random_int(-99, 99);
echo "Переменные \$var1 = {$variable1} и \$var2 = {$variable2} <br />";
echo "<br /> Сложение: ";
echo addition($variable1, $variable2);
echo "<br /> Вычитание: ";
echo subtraction($variable1, $variable2);
echo "<br /> Умножение: ";
echo multiplication($variable1, $variable2);
echo "<br /> Деление: ";
echo division($variable1, $variable2);
?>

<?php
/* Задание–4 */
echo $lineBracker;

$randomOperation = random_int(1, 4);

switch ($randomOperation) {
    case 1: $mathOperation = "+";
        break;
    case 2: $mathOperation = "-";
        break;
    case 3: $mathOperation = "*";
        break;
    case 4: $mathOperation = "/";
}
/* Добавил переменную выше, что бы было больше switch */

echo "Переданный случайный оператор - \"{$mathOperation}\" <br />";

function mainMathOperations($variable1, $variable2, $mathOperation) {
    switch ($mathOperation) {
        case "+":
            echo "<br /> Сложение: ";
            echo addition($variable1, $variable2);
            break;
        case "-":
            echo "<br /> Вычитание: ";
            echo subtraction($variable1, $variable2);
            break;
        case "*":
            echo "<br /> Умножение: ";
            echo multiplication($variable1, $variable2);
            break;
        case "/":
            echo "<br /> Деление: ";
            echo division($variable1, $variable2);
    }
}

mainMathOperations($variable1, $variable2, $mathOperation);
?>

<?php
/* Задание–6 */
echo $lineBracker;

$val = random_int(-10, 10);
$pow = random_int(0, 10);

//функция для вычисления отрицательной степени вызывается в функции power

function pNegative($v, $p) {
    if ($p <= -1) {
        return $v * pNegative($v, $p + 1);
    } else {
        return 1;
    }
}

function power($val, $pow) {
    if (($val === 0) && ($pow > 0)) {
        return 0;
    } elseif (($val === 0) && ($pow === 0)) {
        return "NaN";
    }
    if ($pow >= 1) {
        return $val * power($val, $pow - 1);
    } elseif ($pow <= -1) {


        $interResult = pNegative($val, $pow);
        if ($interResult !== 0) {
            return 1 / $interResult;
        } else {
            return "INF";
        }
    } else {
        return 1;
    }
}

$result = power($val, $pow);
echo "Число - \"{$val}\", в степени - \"{$pow}\" = {$result}";
echo $lineBracker;

//случайные параментры для вычисления отрицательной степени
$val = random_int(-10, 10);
$pow = random_int(-10, 0);


$result = power($val, $pow);
echo "Число - \"{$val}\", в степени - \"{$pow}\" = {$result}";
?>

