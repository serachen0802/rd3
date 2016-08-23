<?php
header("content-type: text/html; charset=utf-8");

$aCheckMap = array(
 '01M2M101M1N0123210111N001M100000N0011211000N11101M2110N1M11222M10N1111M22210N000123M100N00001M2100N0000111000',
 '0M112MMM20NM532M35M30NMMM2113M41NMM32113MM2NM422M13MM2N13M4334M52N02M4MM3M4MN133M4434M3NM4M5M4M5M3NM4MM3MMM3M',
 '2m33m102mmNm5mm4214mmN2mmmm43mm3N136mmmm321N24mm6m4100Nmmm44m2000Nmm6m321111N4mm4m113m2Nm5m4221mm3N2m22m1123m',
 '2M21MMMM32N4M435MM7MMNMM3MM5MMMMN4433M44M5MNMM2223M331N23M11M4M21N244333M33MNMMMM3M33M2N35M4M3M321N1M22122M19',
 'M223MM322MN35MM33MM32NMMM32344M1N24321MM432N24M2234MM1NMMM32M3232NMMM22M312MN4M43234M53NM6M4M2MMMMNMMMM223M42N',
 '1111100000N111m101121NM123311M2MN111MM22231N0125M32M20N01M3M33M20N24332M2110NMMM2221000N3433M32210N1M12M3MM10',
 '02MM4M4MM3N13MM5MM7MMN2M324MMMM3NM2213M5M31N333M534231NMM3MMM4M4MN443355MM5MNMM12MM423MN4422MM3011NMM113M%200',
 '3M32MMMM3MNMM4M4443M3N34M22M222MNM32223M333NM21M24M5MMN1234M3M5MMN23MM2213MMNMM5420025MNM5MM2002MMN2M4M2002MM',
 '4M4M211111N24MM22M33MN1MM533M3MMN235MM2234MN2M4M433M31N3M65M5MM41N3MMMMMMM4MNM6M5M55M42NMM4333M3M1N3M3M2M2214',
 '2M4M4MM311NM4MMM7M5M3NM324MMM5MMN22124MM56MN1M22M44MMMN123M33M34MN01M3M43333N01122MM3MMN0011334M4MN222M2M3221NMM2122M100'
);

$map = $aCheckMap['7'];
$flag = true;
$result = "";
if (strlen($map)!=109) {
    // echo "不符合，輸入長度錯誤。";
    $result .= "輸入長度錯誤。";
    $flag = false;
}

// 最後一個字元不可以為N
$notN = substr($map, -1);
if ($notN == 'N'){
    // echo "不符合，因為最後一個字元不可以是N。";
    $result .= "最後一個字元不可以是N。";
    $flag = false;
}

if (!preg_match("/^([0-8MN]+)$/",$map)) {
    // echo "不符合字串內有不合法字元, 字串內只能有0~8, M, N";
    $result .= "字串內有不合法字元, 只能有0~8, M, N";
    $flag = false;
}

$countN = substr_count($map,"N");
if ($countN < 9){
    // echo "不符合，N的數量太少。";
    $result = "N的數量太少。";
    $falg = false;
} elseif ($countN > 9){
    // echo "不符合，N的數量太多。";
    $result = "N的數量太多。";
    $falg = false;
}

// 炸彈的數量需為40
$countM = substr_count($map,"M");
if ($countM > 40) {
    // echo "不符合，因為炸彈數量大於40。";
    $result = "炸彈數量大於40。";
    $flag = false;
}elseif ($countM < 40){
    // echo "不符合，因為炸彈數量小於40。";
    $result = "炸彈數量大於40。";
    $flag = false;
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
            // echo "不符合，(".$x.",".$y.")數字有誤。";
            $result .= "(".$x.",".$y.")數字有誤。";
            $flag = false;
        }
    }
}

if ($flag == true) {
    echo "符合。";
} elseif ($flag == false){
    echo "不符合。".$result;
}