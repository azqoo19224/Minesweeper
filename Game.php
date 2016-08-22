<?php
    
echo "<div style='text-align:center; font-size:36px;'>";
$n = 0;
$bomb = array();

for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
      $bomb[$i][$j] = "0";   
    }
}




while ( $n < 40 ) {
    $i = rand(0,9);
    $j = rand(0,9);
    if ($bomb[$i][$j] == 0) {
        $bomb[$i][$j] = "M";
        $n++;
    }
    
}
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

for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
        echo $bomb[$i][$j]."       ";
    }
    
    echo "N<br>";
}

echo "</div>";

for ($i = 0; $i <10; $i++) {
    for ($j = 0; $j <10; $j++) {
        echo $bomb[$i][$j];    
    }
    
    echo "N";
}