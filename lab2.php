<?php

$sub = $_POST['subject'];
$input = $_POST['text'];

$file = fopen("data.txt", "w+") or die ("error");

$sub = trim($sub);
$input = trim($input);
if($sub == "" or $input == "" ) {
    die("Missing required data.");
}
$sub = strip_tags($sub);
$input = strip_tags($input);

$sub = mysql_real_escape_string($sub);
$input = mysql_real_escape_string($sub);
echo $sub;
echo $input;
fwrite($file, $sub . PHP_EOL);
fclose($file);
