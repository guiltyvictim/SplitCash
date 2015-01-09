# SplitCash
PHP function that divides cash as evenly as possible amongst multiple people, with optional decimal place.

The function returns an array of the resulting values.

## Function

`array splitMoney (float $amount, int $split [,int $decimals = 2])`

Where:
- $amount = amount to be split
- $split = number of portions to split amount into
- $decimals = number of decimal places to split money down to

## Logic

1. Work out the rounded average of the amount
1. Create an array of $split size, putting the average in each index
1. Use the average to sum up a new total
1. Subtract new total from original amount to work out remainder
1. Using the decimal places to work out how to divide the remainder: e.g. if it's 2 decimal places, divide them by the pennies
1. Loop through the remainder to add each unit of remainder to the array. If amount - total is negative, this would subtract it instead

## Limitations

- As the function is meant for splitting cash, I've gone for decimal places. Don't think it'd work if you want to round the division by 10s, 100s, 1000s etc.
- There're no error checking, so you can put in an amount with 2 decimal places and request 1 decimal place division. May add this validation at some point but it's unlikely you'll need this
- As the logic adds the remainder from the start of the array to the end, and the remainder could be positive or negative, that means the first few values could either be larger or smaller. See optional improvement for more info

## Optional improvement

Currently the result is not sorted, so when using the function you could add the sort() or rsort() php functions to ensure the output is consistent:

`sort($result = splitMoney($amount, $split));`
