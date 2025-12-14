<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Hello";
echo 'Hello';

$x = "John";
echo "Hello $x";

$x = "John";
echo 'Hello $x';

echo strlen("Hello world!");

echo str_word_count("Hello world!");

echo strpos("Hello world!", "world");

$x = "Hello World!";
echo strtoupper($x);

$x = "Hello World!";
echo strtolower($x);

$x = "Hello World!";
echo str_replace("World", "Dolly", $x);

$x = "Hello World!";
echo strrev($x);

$x = " Hello World! ";
echo trim($x);

$x = "Hello World!";
$y = explode(" ", $x);
//Use the print_r() function to display the result:
print_r($y);
/*
Result:
Array ( [0] => Hello [1] => World! )
*/

$x = "Hello";
$y = "World";
$z = $x . $y;
echo $z;

$x = "Hello World!";
echo substr($x, 6, 5);

$x = "Hello World!";
echo substr($x, 6);

$x = "Hello World!";
echo substr($x, -5, 3);

$x = "Hi, how are you?";
echo substr($x, 5, -3);


$x = "We are the so-called \"Vikings\" from the north.";


    ?>
</body>
</html>