<?php

/*
You are given an integer array nums (0-indexed). In one operation, you can choose an element of the array and increment it by 1.

For example, if nums = [1,2,3], you can choose to increment nums[1] to make nums = [1,3,3].
Return the minimum number of operations needed to make nums strictly increasing.

An array nums is strictly increasing if nums[i] < nums[i+1] for all 0 <= i < nums.length - 1. An array of length 1 is trivially strictly increasing.

Example 1:

Input: nums = [1,1,1]
Output: 3
Explanation: You can do the following operations:
1) Increment nums[2], so nums becomes [1,1,2].
2) Increment nums[1], so nums becomes [1,2,2].
3) Increment nums[2], so nums becomes [1,2,3].
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        //Here we keep our result
        $result = 0;

        //Case if we have only one element
        if (count($nums) == 1) {
            return 0;
        }

        //for every element in array we check prev element and in case 
        //prev element >= current element we increase result on differece 
        //between prev and current elements + 1
        //and copy prev el and increase it
        for ($i=1; $i < count($nums); $i++) {
            if ($nums[$i-1] >= $nums[$i]) {
                $result += $nums[$i-1] - $nums[$i] + 1;
                $nums[$i] = $nums[$i-1] + 1;
            }
        }

        return $result;
    }
}

$obj = new Solution;

var_dump($obj->minOperations([1,1,1]));//3