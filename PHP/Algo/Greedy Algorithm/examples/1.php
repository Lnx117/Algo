<?php
/*
You are given a positive integer num consisting of exactly four digits. Split num into two new integers new1 and new2 by using the digits found in num. Leading zeros are allowed in new1 and new2, and all the digits found in num must be used.

For example, given num = 2932, you have the following digits: two 2's, one 9 and one 3. Some of the possible pairs [new1, new2] are [22, 93], [23, 92], [223, 9] and [2, 329].
Return the minimum possible sum of new1 and new2.

*/

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function minimumSum($num) {
        //We must check only double digit integers, because, for example in case
        //1999 91 and 99 is better than 199 and 9

        //first of all exploude our integer to digits
        $array_nums = [];

        for ($i=0; $i<=3; $i++) {
            $array_nums[] = $num % 10;
            $num =  intval($num / 10);
        }

        //sort our array 1 9 9 9
        sort($array_nums);
        
        //reserve two vars to collect our numbers
        $string1 = $string2 = '';

        //We will repeatedly pick the smallest available digit and alternately place it into one of two numbers. 
        //This way, our numbers will start with the smallest digits and end with the largest ones.
        $marker = 0;

        foreach ($array_nums as $value) {
            if ($marker == 0) {
                $string1 .= $value;
                $marker = 1;
                continue;
            }
            $string2 .= $value;
            $marker = 0;
        }

        return intval($string2) + intval($string1);
    }
}

$obj = new Solution;

var_dump($obj->minimumSum(2923)); //52   23 29 