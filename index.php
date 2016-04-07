<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 07.04.2016
 *
 */

use Classes\GenerateFiles;
use Classes\Data;
use Classes\Main;

//Загрузчик
include_once('System/Loader.php');
new \System\Loader();

//Генерация файлов с данными
(new GenerateFiles());


//Функции для вывода CLI

function space($all, $string)
{

    for ($i = $all - strlen($string); $i > 1; $i--) {
        echo ' ';
    }
}

function show($day1, $day2, $type)
{

    echo ' | ';
    echo $type;
    space(14, $type);
    echo ' |    ';
    echo $day1;
    space(30, $day1);
    echo ' |    ';
    echo $day2;
    space(30, $day2);
    echo ' | ' . "\n";
}

///


//Вывод данных

$Day1 = (new Main(new Data(GenerateFiles::$file1)));
$Day2 = (new Main(new Data(GenerateFiles::$file2)));


?>

---------------------------------------------------------------------------------------
| Param         |    Data Set 1                    |   Data Set 2                     |
---------------------------------------------------------------------------------------
<?php echo show($Day1->getMin(), $Day2->getMin(), 'Min'); ?>
<?php echo show($Day1->getMax(), $Day2->getMax(), 'Max'); ?>
<?php echo show($Day1->getVariance(), $Day2->getVariance(), 'Variance'); ?>
<?php echo show($Day1->getExpectation(), $Day2->getExpectation(), 'Expectation'); ?>
<?php echo show($Day1->getRange(), $Day2->getRange(), 'Range'); ?>
<?php echo show($Day1->getMediana(), $Day2->getMediana(), 'Mediana'); ?>

