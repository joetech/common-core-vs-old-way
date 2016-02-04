<?php
/**
 * Generate and return an array of random numbers
 * @return array
 */
function randoms() {
    $max = 1000;
    $arr = [rand(1, $max), rand(1, $max)];
    rsort($arr);

    $len = strlen($arr[0]);
    $arr[1] = str_pad($arr[1], $len, '0', STR_PAD_LEFT);

    return [str_split($arr[0]), str_split($arr[1])];
}

function mtime()
{
    return microtime(true);
}

/**
 * Subtract two numbers the 'old math' way
 * @param  array $arr Two numbers to subtract
 * @return int        Result to return
 */
function ow($arr) {
    $result = [];

    // Start with the last digit from each number and work right to left
    $place1 = count($arr[0]) - 1;
    $place2 = count($arr[1]) - 1;

    // This is a repeated process for each digit, so let's loop.
    while ($place1 >= 0) {
        // Remember adding 10 and then subtracting 1 from the previous digit (carry the 1 over)?
        // That's what this is here.
        if ($arr[0][$place1] < $arr[1][$place2]) {
            $arr[0][$place1] += 10;
            $arr[0][$place1 - 1] -= 1;
        }

        $result[] = $arr[0][$place1] - $arr[1][$place2];
        $place1--;
        $place2--;
    }

    return (int) implode(array_reverse($result));
}

/**
 * Subtract two numbers the 'new way' (common core)
 * @param  array $arr Two numbers to subtract
 * @return int        Result to return
 */
function cc($arr) {
    $result = [];
    $round_precision = 1;

    // Start with the last digit from each number and work right to left
    $place = count($arr[1]) - 1;

    //This is a repeated process for each digit, so let's loop.
    while ($place > 0) {
        $result[] = pow(10, $round_precision) - $arr[1][$place] * pow(10, $round_precision-1);
        $arr[1][$place] = 0;
        $arr[1][$place - 1] += 1;

        $place--;
        $round_precision++;
    }
    if ($arr[1][$place] < $arr[0][$place]) {
        $result[] = $arr[0][$place] * pow(10, $round_precision - 1) - implode($arr[1]);
    }
    $result[] = substr(implode($arr[0]), 1);

    return array_sum($result);
}


/* 
// ===================================================================================================
// Uncomment this block if you want to just run each once and see the details

$nums = randoms();

// Do the math the old way and time it
$start = mtime();
$ow = ow($nums);
$time = mtime() - $start;
echo implode($nums[0]) . " - " . implode($nums[1]) . " = " . $ow . " (ow = " . $time . ")" . "<br>";

// Do the math the new way and time it
$start = mtime();
$cc = cc($nums);
$time = mtime() - $start;
echo implode($nums[0]) . " - " . implode($nums[1]) . " = " . $cc . " (cc = " . $time . ")" . "<br>";

// ===================================================================================================
*/



// ===================================================================================================
// Uncomment this block if you want to test a lot.

$cycles = 1000;
$owtime = 0;
$cctime = 0;

echo number_format($cycles) . " cycles - random numbers between 1 and 1000.<br>";
for ($i=0; $i < $cycles; $i++) {
    $nums = randoms();

    // Do the math the old way and time it
    $start = mtime();
    $ow = ow($nums);
    $end = mtime();
    $owtime += ($end - $start);

    // Do the math the new way and time it
    $start = mtime();
    $cc = cc($nums);
    $end = mtime();
    $cctime += ($end - $start);
}
echo "Total time for the old way : " . abs($owtime) . " seconds<br>";
echo "Total time for the new way : " . abs($cctime) . " seconds<br>";
// ===================================================================================================


