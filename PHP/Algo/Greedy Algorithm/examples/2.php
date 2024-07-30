<?php
/*
You are given a positive integer num consisting only of digits 6 and 9.

Return the maximum number you can get by changing at most one digit (6 becomes 9, and 9 becomes 6).

*/

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number ($num) {
        //We will convert our int to string array
        //After that we check every digit and change first 6 that we find to 9

        $str_num = strval($num);

        $str_arr = str_split($str_num);


        //only one changing marker
        $changed = false;

        //check every digit
        //if we find first digit = 6 we change it to 9
        foreach ($str_arr as $key => $value) {
            if ($value == "6" && !$changed) {
                $str_arr[$key] = 9;
                $changed = true;
            }
        }

        //convert digit array to answer format
        return intval(implode("",$str_arr));
    }
}

$obj = new Solution;

var_dump($obj->maximum69Number(9669)); //9969