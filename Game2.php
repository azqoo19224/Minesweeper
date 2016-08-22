<?php
// $iTinel = microtime(true);
$n = 0;
$row = 50;
$column = 60;
$bomb = array();
//陣列塞0
for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $column; $j++) {
      $bomb[$i][$j] = "0";   
    }
}
//亂數炸彈塞入
while ( $n < 1200 ) {
    $i = rand(0, ($row - 1));
    $j = rand(0, ($column -1));
    //如果陣列沒有炸彈  則塞入
    if ($bomb[$i][$j] == 0) {
        $bomb[$i][$j] = "M";
        $n++;
    }
    
}

//搜尋炸彈(M) 周圍+1
for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $column; $j++) {
        if ($bomb[$i][$j] == "M") {
            if ($bomb[$i - 1][$j - 1] != "M") {
                $bomb[$i - 1][$j - 1]++;
            }
            if ($bomb[$i - 1][$j] != "M") {
                $bomb[$i - 1][$j]++;
            }
            if ($bomb[$i - 1][$j + 1] != "M") {
                $bomb[$i - 1][$j + 1]++;
            }
            if ($bomb[$i][$j - 1] != "M") {
                $bomb[$i][$j - 1]++;
            }
            if ($bomb[$i][$j + 1] != "M") {
                $bomb[$i][$j + 1]++;
            }
            if ($bomb[$i + 1][$j - 1] != "M") {
                $bomb[$i + 1][$j - 1]++;
            }
            if ($bomb[$i + 1][$j] != "M") {
                $bomb[$i + 1][$j]++;
            }
            if ($bomb[$i + 1][$j + 1] != "M") {
                $bomb[$i + 1][$j + 1]++;
            }
        }
    }
}



//印出字串
for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $column; $j++) {
        echo $bomb[$i][$j];    
    }
    if ($i != ($row - 1)) {
        echo "N";
    }
        
}

// echo "<br>";
// //印出陣列
// echo "<table style='text-align:center; font-size:36px;'>";
// for ($i = 0; $i < $row; $i++) {
//     echo "<tr>";
//     for ($j = 0; $j < $column; $j++) {
//         echo "<td>".$bomb[$i][$j]."</td>";
//     }
//     if ($i != ($row - 1)) {
//         echo "<td>N</td></tr>";
//     }
// }

// $iTine2 = microtime(true);
// // echo "</table>";
// echo "<br>";
// echo $iTine2 - $iTinel;