<?php
  function splitMoney($amount, $split, $decimals = 2) {
    $numbers=array_fill(0,$split,$average=round($amount/$split,$decimals));
    $loop=abs(round(($remainder=$amount-$average*$split)*($power=pow(10,$decimals))));
    for($i=0;$i<$loop;$i++)$numbers[$i]+=($remainder>0)?1/$power:-1/$power;
    return $numbers;
  }
?>
