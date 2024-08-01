<?php
/*
You are given a string s consisting of lowercase English letters, and you are allowed to perform operations on it. In one operation, 
you can replace a character in s with another lowercase English letter.

Your task is to make s a palindrome with the minimum number of operations possible. 
If there are multiple palindromes that can be made using the minimum number of operations, make the lexicographically smallest one.

A string a is lexicographically smaller than a string b (of the same length) if in the 
first position where a and b differ, string a has a letter that appears earlier in the alphabet than the corresponding letter in b.
Return the resulting palindrome string.

 
Example 1:

Input: s = "egcfe"
Output: "efcfe"
Explanation: The minimum number of operations to make "egcfe" a palindrome is 1, and the lexicographically smallest palindrome string we can get by modifying one character is "efcfe", by changing 'g'.
*/

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeSmallestPalindrome($s) {
        //We will iterate through the string from both ends. Our goal is to make the letters the same. 
        //We will convert the letters to the smaller letter. If one letter remains in the middle, we do not change it.

        $left_index = 0;
        $right_index = strlen($s) - 1;

        //Since the algorithm is greedy, we make the locally optimal choice.
        while ($left_index <= $right_index) {
            if ($s[$left_index] <= $s[$right_index]) {
                $s[$right_index] = $s[$left_index];
            } else {
                $s[$left_index] = $s[$right_index];
            }

            $left_index++;
            $right_index--;
        }

        return $s;
    }
}

$obj = new Solution;

var_dump($obj->makeSmallestPalindrome('egcfe'));//efcfe