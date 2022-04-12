<?php

namespace App\Models;

class Fib
{
    public function calc($n): int
    {
        $n = (int)$n;

        if ($n === 0) {
            return 0;
        }
        if ($n === 1) {
            return 1;
        }

        $a = self::calc($n - 1);
        $b = self::calc($n - 2);

        return $a + $b;
    }
}
