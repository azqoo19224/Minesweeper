<?php
$n = 0;
$bomb = array();
//陣列塞0
for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
      $bomb[$i][$j] = "0";   
    }
}
//亂數炸彈塞入
while ( $n < 40 ) {
    $i = rand(0,9);
    $j = rand(0,9);
    //如果陣列沒有炸彈  則塞入
    if ($bomb[$i][$j] == 0) {
        $bomb[$i][$j] = "M";
        $n++;
    }
    
}

//搜尋炸彈(M) 周圍+1
for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
        if ($bomb[$i][$j] == "M") {
            if ($bomb[$i-1][$j-1] != "M") {
                $bomb[$i-1][$j-1]++;
            }
            if ($bomb[$i-1][$j] != "M") {
                $bomb[$i-1][$j]++;
            }
            if ($bomb[$i-1][$j+1] != "M") {
                $bomb[$i-1][$j+1]++;
            }
            if ($bomb[$i][$j-1] != "M") {
                $bomb[$i][$j-1]++;
            }
            if ($bomb[$i][$j+1] != "M") {
                $bomb[$i][$j+1]++;
            }
            if ($bomb[$i+1][$j-1] != "M") {
                $bomb[$i+1][$j-1]++;
            }
            if ($bomb[$i+1][$j] != "M") {
                $bomb[$i+1][$j]++;
            }
            if ($bomb[$i+1][$j+1] != "M") {
                $bomb[$i+1][$j+1]++;
            }
        }
    }
}

//印出字串
for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
        echo $bomb[$i][$j];    
    }
    if($i != 9){
        echo "N";
    }
        
}

// echo "<br>";
// //印出陣列
// echo "<table style='text-align:center; font-size:36px;'>";
// for ($i = 0; $i <10; $i++) {
//     echo "<tr>";
//     for ($j = 0; $j <10; $j++) {
//         echo "<td>".$bomb[$i][$j]."</td>";
//     }
    
//     echo "<td>N</td></tr>";
// }

// echo "</table>";
