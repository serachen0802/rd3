<?php
header("content-type: text/html; charset=utf-8");

// 最後一個字元不可以為N
$map = $_GET['map'];
$notN = substr($map, -1);
if ($notN == 'N'){
    echo "不符合。因為最後一個字元不可以是N<br>";
}

// 炸彈的數量需為40
$countM = substr_count($map,"M");
if ($countM > 40) {
    echo "不符合。因為炸彈數量大於40<br>";
}elseif ($countM < 40){
    echo "不符合。因為炸彈數量小於40<br>";
}

$checkNum = explode('N', $map);
for ($i = 0; $i < 10; $i++) {
    $checkNum2 = preg_split('//', $checkNum[$i], -1, PREG_SPLIT_NO_EMPTY);
    $arr[$i] = $checkNum2;
}

// 將陣列不為M的位置改為0
$arr2=[$arr];
for($x = 0; $x < 10; $x++){
    for($y = 0; $y < 10; $y++){
        if($arr2[0][$x][$y] != "M"){
            $arr2[0][$x][$y] ='0';
        }
    }
}

for($x = 0; $x < 10; $x++){
    for($y = 0; $y < 10; $y++){
        if($arr2[0][$x][$y]!= 'M'){
            if ($arr2[0][$x+1][$y] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x-1][$y] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x][$y+1] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x][$y-1] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x+1][$y+1] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x-1][$y-1] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x-1][$y+1] == 'M') {
                $arr2[0][$x][$y]++;
            }
            if ($arr2[0][$x+1][$y-1] == 'M') {
                $arr2[0][$x][$y]++;
            }
        }
        if ($arr[$x][$y] != $arr2[0][$x][$y]) {
            echo "不符合。(".$x.",".$y.")數字有誤";
        }
    }
}
