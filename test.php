for($x = 0; $x < 10; $x++){
    for($y = 0; $y < 10; $y++){
        if($arr[$x][$y] != 'M'){
            if ($arr[$x+1][$y] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x-1][$y] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x][$y+1] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x][$y-1] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x+1][$y+1] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x-1][$y-1] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x-1][$y+1] == 'M') {
                $arr[$x][$y]--;
            }
            if ($arr[$x+1][$y-1] == 'M') {
                $arr[$x][$y]--;
            }
        }
        // if ($arr[$x][$y] != '0' && $arr[$x][$y] != 'M') {
        //     echo "(".$x.",".$y.")有誤<br>";
        // }

    }
}