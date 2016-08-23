<?php
$minesweeper = new Minesweeper();
$str = $_GET['map'];
$minesweeper->fund($str);

class Minesweeper {
//宣告陣列長度.炸彈大小
private $result = "不符合,";
private $row = 10;
private $column = 10;
private $n = 40;
private $numN = 0;
private $bomb;
private $arr;

function fund($str){
    if (isset($str)) {
        //正則 排除字元
        if (!preg_match("/^([0-8MN]+)$/",$str)) {
            $this->result .= "輸入字串有非0-8 or M or N等字樣/n";
        } 
        if(preg_match("/m/",$str)) {
            $str = str_replace("m","M",$str);
            $this->result .= "地雷大小寫有錯/n";
        }
        $a = explode ("N", $str);
       
        for($i = 0; $i < 10; $i++) {
            $this->arr[$i] = str_split($a[$i]);
        }
    
        //比對陣列
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->column; $j++) {
              $this->bomb[$i][$j] = "0";   
            }
    }
        //計算炸彈數
        $this->num = 0;
        $this->setbomb();
        $bombStr = $this->fundBombStr();
        $this->strCount($bombStr, $str);
        $this->verificationN($a);
        $this->bombCount();
        $this->verificationError($bombStr, $str);
        $this->verificationEqual($bombStr, $str);
    }
}
    //設置炸彈
    function setbomb(){
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->column; $j++) {
                if ($this->arr[$i][$j] == "M") {
                    $this->bomb[$i][$j] = "M";
                    $this->num++;
                    
                    if ($this->arr[$i - 1][$j - 1] != "M") {
                        $this->bomb[$i - 1][$j - 1]++;
                    }
                    if ($this->arr[$i - 1][$j] != "M") {
                        $this->bomb[$i - 1][$j]++;
                    }
                    if ($this->arr[$i - 1][$j + 1] != "M") {
                        $this->bomb[$i - 1][$j + 1]++;
                    }
                    if ($this->arr[$i][$j - 1] != "M") {
                        $this->bomb[$i][$j - 1]++;
                    }
                    if ($this->arr[$i][$j + 1] != "M") {
                        $this->bomb[$i][$j + 1]++;
                    }
                    if ($this->arr[$i + 1][$j - 1] != "M") {
                        $this->bomb[$i + 1][$j - 1]++;
                    }
                    if ($this->arr[$i + 1][$j] != "M") {
                        $this->bomb[$i + 1][$j]++;
                    }
                    if ($this->arr[$i + 1][$j + 1] != "M") {
                        $this->bomb[$i + 1][$j + 1]++;
                    }
                }
            }
        }
    }
    
    function fundBombStr() {
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->column; $j++) {
                $bombStr .= $this->bomb[$i][$j];    
            }
    
            if ($i != ($this->row - 1)) {
                $bombStr .= "N";
            }
    
        }
        return $bombStr;
    }
    //長度驗證
    function strCount($bombStr, $str){
        if (count(str_split($bombStr)) != count(str_split($str))) {
        $this->result .= "應該長度為" . count(str_split($bombStr)) . "//現有長度為" . count(str_split($str)) . "/n";
       
    }
    }
    //驗證N個數及位置是否正確
    function verificationN($a) {
        if (count($a) != $this->row) {
            $this->result .= "因為N的數目有錯/n";
    }
      //判斷N的位置
        for ($i = 0 ;$i < count($a) ;$i++) {
            if (count($this->arr[$i]) != 10) { 
                $this->result .= "因為第".($i+1)."個N位置有誤/n";
            }
        
    }
        
    }
    //驗證地雷數
    function bombCount() {
        if ($this->num != 40) {
            $this->result .= "炸彈數因該為" . $this->n . "//該字串炸彈數只有" . $this->num . "/n";
        }
    }
    //答案驗證
    function verificationError($bombStr, $str){
        if ($bombStr != $str) {
            $b = str_split($bombStr);
            $gg = str_split($str);
            
            for ($i = 0 ;$i < ($this->row*$this->column+$this->row); $i++ ) {
                    if ($b[$i] != $gg[$i]) {
                        // $ii = $i + 1;
                      $this->result .= "第" . ($i + 1) . "個答案'" . $gg[$i] . "'有錯//  答案應該為'" . $b[$i] . "'/n";
                }
            }
        }
    }
    //最後驗證
    function verificationEqual($bombStr, $str) {
        if (str_split($bombStr) == str_split($str) && $bombStr != $str) {
        echo "符合";
        } else {
            echo $this->result;
        }
        
    }
}
