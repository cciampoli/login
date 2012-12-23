<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ChrisChross Spellbook Login</title>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>

<div id="container">
	<div align="center">
<h1>Members Area</h1>
<?php
$myArray = array(
array(
'Name:'=>'Chris',
'Status:'=>'Wait'),
array(
'Name:'=>'Steven',
'Status:'=>'Active'),
array(
'Name:'=>'Donald',
'Status:'=>'Wait'));
$json = json_encode($myArray);

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}


?>
</div>

	<p class="footer">ChrisChross Spellbook</p>
</div>
</body>
</html>
