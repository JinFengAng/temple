<?php
require 'Lunar.php';

$birthday  = $_POST['birthday'];

$birthdayArray = explode('-', $birthday);

$lunar = new Lunar();
$output = $lunar->convertSolarToLunar($birthdayArray[0], $birthdayArray[1], $birthdayArray[2]);
echo json_encode($output);
