<?php

if (isset($_GET["map"])) {
    $a = explode ("N", $_GET["map"]);
    // echo $a[0];
    for($i = 0; $i < 10; $i++){
        $arr[$i] = str_split($a[$i]);
    }
    //比對陣列
    $bomb = array();
    for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $column; $j++) {
      $bomb[$i][$j] = "0";   
    }
}
    //計算炸彈數
    $num = 0;
    
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $column; $j++) {
            if ($arr[$i][$j] == "M") {
                $bomb[$i][$j] == "M";
                
                if ($arr[$i - 1][$j - 1] != "M") {
                    $bomb[$i - 1][$j - 1]++;
                }
                if ($arr[$i - 1][$j] != "M") {
                    $bomb[$i - 1][$j]++;
                }
                if ($arr[$i - 1][$j + 1] != "M") {
                    $bomb[$i - 1][$j + 1]++;
                }
                if ($arr[$i][$j - 1] != "M") {
                    $bomb[$i][$j - 1]++;
                }
                if ($arr[$i][$j + 1] != "M") {
                    $bomb[$i][$j + 1]++;
                }
                if ($arr[$i + 1][$j - 1] != "M") {
                    $bomb[$i + 1][$j - 1]++;
                }
                if ($arr[$i + 1][$j] != "M") {
                    $bomb[$i + 1][$j]++;
                }
                if ($arr[$i + 1][$j + 1] != "M") {
                    $bomb[$i + 1][$j + 1]++;
                }
                $num++;
            }
        }
    }
    
    if ($num != 40) {
        echo "炸彈數有錯";
        exit;
    }
    
    if ($bomb != $arr) {
        echo "答案有錯";
    }

    if (count($bomb) != count($arr)) {
        echo "長度有誤";
    }
    
    
}