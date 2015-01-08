<?php
  function splitMoneyLong($amount, $split, $decimals = 2) {
    // define the exponential value based on $decimals
    $power = pow(10,$decimals);

    // get the average, round it to defined number of decimals
    $average = round($amount / $split, $decimals);

    // create an array of size $split, fill it with $average, starting with index 0
    $numbers = array_fill(0, $split, $average);

    // work out the difference between original total and new total
    // this could be positive or negative
    $remainder = $amount - ($average * $split);

    // for every 0.01, we're going to add or subtract it from the $numbers array, starting from the beginning
    // we'll do it by a loop, and we know how many times we'll loop by remainder x 100
    // however we need to convert it to an absolute value first to work with the for loop
    // we'll also have to round the value to get rid of odd decimals (probably from floating point calculations)
    $loop = abs(round($remainder * $power));

    for ($i = 0; $i < $loop; $i++) {
      // now we need to decide whether to subtract or add to each value
      // shorthand version in the shortened function above
      if ($remainder > 0) {
        $numbers[$i] += 1 / $power;
      } else {
        $numbers[$i] -= 1 / $power;
      }
    }
    return $numbers;
  }
?>
