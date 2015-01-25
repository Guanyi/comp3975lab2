<?php

define("PRIVATELINE", PHP_EOL . "private private private private private!" . PHP_EOL);

$sub = $_GET['subject'];
$input = $_GET['text'];

$file = fopen("data.txt", "w+") or die ("error");

$sub = trim($sub);
$input = trim($input);
if($sub == "" or $input == "" ) {
    die("Missing required data.");
}

if($sub != strip_tags($sub) or $input != strip_tags($input)) {
    die("breakin attempt detected");
}

//$sub = mysql_real_escape_string($sub);
//$input = mysql_real_escape_string($sub);

if (isset($_GET['private'])) {
    fwrite($file, PRIVATELINE);
}
fwrite($file, PHP_EOL . "\n-----\n" . PHP_EOL);
fwrite($file, PHP_EOL . $sub . PHP_EOL);
if (filter_var($sub, FILTER_VALIDATE_EMAIL)) {
    fwrite($file, "(email address)" . PHP_EOL);
}
fwrite($file, PHP_EOL . $input . PHP_EOL);
fwrite($file, 'POSTED AT ' . date('g:ia') . ' ON ' . strtoupper(date('l F d, Y')));
fclose($file);
