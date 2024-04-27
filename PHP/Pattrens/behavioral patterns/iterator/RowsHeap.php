<?php

class RowsHeap extends SplHeap
{
    protected function compare($row, $rowAnother): int {
        if ($row->total == $rowAnother->total) {
            return 0;
        }
        return $row->total < $rowAnother->total ? -1: 1;
    }
}