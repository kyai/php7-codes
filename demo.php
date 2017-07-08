<?php

// 不使用第三个变量，交换两个变量的值
function turnValues(){
    $a = "a";
    $b = "b";
    
    echo $a . " - " . $b . "\n";

    $a = $a ^ $b;
    $b = $b ^ $a;
    $a = $a ^ $b;

    echo $a . " - " . $b . "\n";
}

turnValues()

?>