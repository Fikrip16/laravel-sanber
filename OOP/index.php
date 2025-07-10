<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once "frog.php";
require_once "Ape.php";
require_once 'animal.php';

$sheep = new Animal("shaun");
echo" name: " . $sheep->name ."<br>";// shaun
echo" legs:  " . $sheep->legs ."<br>"; // 4
echo"cold blooded: ". $sheep->cold_blooded ."<br>" ."<br>";// no


$kodok = new Frog("buduk");
echo"name : " . $kodok->name. "<br>";
echo"legs: " .$kodok->legs. "<br>";
echo"cold blooded: ".$kodok->cold_blooded. "<br>";
echo "jump : ";
$kodok->jump() ; // "hop hop"

echo"<br> <br>";


$sungokong = new Ape("kera sakti");
echo"name : " . $sungokong->name. "<br>";
echo"legs: " .$sungokong->legs. "<br>";
echo"cold blooded: ".$sungokong->cold_blooded. "<br>";
echo"yell: " ;
$sungokong->yell();// "Auooo"
?>

</body>
</html>