<?php
header("content-type: text/html; charset=utf-8");
require("CheckLandmine2.php");

$test = new test();
$map = $_GET['map'];
$result = $test->check($map);

echo $result;
