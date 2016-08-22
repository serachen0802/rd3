<?php
$maxBomb = 40;
$arr = array(
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0'),
array('0','0','0','0','0','0','0','0','0','0')
);

for($setBomb = 0; $setBomb < $maxBomb; $setBomb++) {
    while(true) {
        // 隨機產生一個炸彈
        $row = rand(0, 9);
        $column = rand(0, 9);
        if ($arr[$row][$column] != 'M') {
            $arr[$row][$column] = 'M';
            break;
        }
    }
}

for($x = 0; $x < 10; $x++){
    for($y = 0; $y < 10; $y++){
        if($arr[$x][$y]!= 'M'){
            if ($arr[$x+1][$y] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x+1][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x+1][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
        }
    }
}

foreach($arr as $value) {
    foreach ($value as $val) {
        $result .= $val;
    }
    $result .= "N";
}
 echo substr_replace($result,'',-1);
