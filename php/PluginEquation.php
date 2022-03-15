<?php

$a = (int)$_POST['let1'];
$b = (int)$_POST['let2'];
$c = (int)$_POST['let3'];

$result = equation($a, $b, $c);
dataBase($a, $b, $c, $result);

function equation($a, $b, $c): array
{
    if ($a == 0) {
        headerAlert();
        die;
    }
    if ($b == 0) {
        if ($c < 0) {
            $x1 = sqrt(abs($c / $a));
            $x2 = sqrt(abs($c / $a));
        } elseif ($c == 0) {
            $x1 = $x2 = 0;
        } else {
            $x1 = sqrt($c / $a);
            $x2 = -sqrt($c / $a);
        }
    } else {
        $d = ($b * $b) - 4 * $a * $c;
        if ($d > 0) {
            $x1 = (-$b + sqrt($d)) / (2 * $a);
            $x2 = (-$b - sqrt($d)) / (2 * $a);
        } elseif ($d == 0) {
            $x1 = $x2 = (-$b) / 2 * $a;
        } else {
            $x1 = -$b + sqrt(abs($d));
            $x2 = -$b - sqrt(abs($d));
        }
    }


    return array($x1, $x2);
}

function headerAlert(){
    ?><script>alert('Коэффициент при первом слагаемом уравнения не может быть равным нулю измените его и попробуйте снова.')</script><?php
}

function dataBase($a, $b, $c, $result){
    require_once '../config/ConnectDatabase.php';
    $sqlCreateTable = "CREATE TABLE `data_values` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `a` FLOAT(50) NOT NULL ,
    `b` FLOAT(50) NOT NULL ,
    `c` FLOAT(50) NOT NULL ,
    `x1` FLOAT(50) NOT NULL ,
    `x2` FLOAT(50) NOT NULL ,
    `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";

    $sqlInsertEquation = "INSERT INTO `data_values`(`id`, `a`, `b`, `c`, `x1`, `x2`, `time`) VALUES (null, $a,$b,$c,$result[0],$result[1],now())";
    mysqli_query($connect,$sqlCreateTable);
    mysqli_query($connect, $sqlInsertEquation);
}


echo "<h3> $a * x<sup>2</sup> $b  * x + $c  = 0</h3>";
echo "<p>Корни уравнения :</p>";
echo "<p>X<sub>1</sub> = $result[0] </p> ";
echo "<p>X<sub>2</sub> = $result[1]</p>";












