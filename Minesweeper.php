<?php
$row = 10;
$column = 10;
if (isset($_GET["map"])) {
    $a = explode ("N", $_GET["map"]);
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
                $bomb[$i][$j] = "M";
                $num++;
                
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
                
            }
        }
    }
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $column; $j++) {
            $bombStr .= $bomb[$i][$j];    
        }
        
        if ($i != ($row - 1)) {
            $bombStr .= "N";
        }
        
}
    
    if ($num != 40) {
        echo "炸彈數有錯";
        exit;
    }
    
    if (count($bombStr) != count($_GET["map"])) {
        echo "長度有誤";
        exit;
    }

    if ($bombStr != $_GET["map"]) {
        echo "答案有錯";
    } else {
        echo "符合";
    }
    
    
}