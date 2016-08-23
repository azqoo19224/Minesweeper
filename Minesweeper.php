<?php
//宣告陣列長度.炸彈大小
$row = 10;
$column = 10;
$n = 40;
$numN = 0;
//正則 排除字元
if (isset($_GET["map"])) {
    if (!preg_match("/^([0-9MN]+)$/",$_GET["map"])) {
        echo "不符合,輸入字串有非0-9 or M or N等字樣";
        exit;
    } 

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
    //長度判斷
    if (count(str_split($bombStr)) != count(str_split($_GET["map"]))) {
        echo "不符合,應該長度為".count(str_split($bombStr))."//現有長度為".count(str_split($_GET["map"]));
        exit;
    }
    //N個數判斷
    if (count($a) != $row) {
        echo "不符合,因為N的數目有錯";
        exit;
    }
    //炸彈數判斷
    if ($num != 40) {
        echo "不符合，炸彈數因該為".$n."//該字串炸彈數只有".$num;
        exit;
    }
    //答案驗證
    if ($bombStr != $_GET["map"]) {
        $b = str_split($bombStr);
        $gg = str_split($_GET["map"]);
   
        for ($i = 0 ;$i < ($row*$column+$row); $i++ ) {
           
                if ($b[$i] != $gg[$i]) {
                    // $ii = $i + 1;
                   $p .= "第".($i+1)."個答案'".$gg[$i]."'有錯//  答案應該為'".$b[$i]."'//";
            }
        }
        echo "不符合,因為".$p;
        exit;
    }
    
    echo "符合";
}
