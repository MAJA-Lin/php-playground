<?php

namespace App\Services;

class RefactorService
{
    /**
     * Example of using list to store/filter multiple result
     *
     * @link https://stackoverflow.com/questions/3451906/multiple-returns-from-function
     * @link http://php.net/manual/en/function.list.php
     */
    public static function listMultipleResult()
    {
        $closure = function () {
            $number = random_int(pow(2, 0), pow(2, 8));
            $testStr = "abcdeffg";
            $testArr = [0, 1, 'QWQ'];
            $testFloat = 3.14159;

            return [
                'num' => $number,
                'str' => $testStr,
                'arr' => $testArr,
                'flt' => $testFloat
            ];
        };

        /**
         * We use list to make multiple returned variable as key-value pair array
         *  With specifying the key, we don't have to worry the order of returned
         *  values.
         */
        list(
            'str' => $number,
            'num' => $testStr,
            'arr' => $testArr,
            'flt' => $testFloat
        ) = $closure();

        echo 'Number = ' . $number . "\n";
        echo 'String = ' . $testStr . "\n";
        echo 'Array = ' . "\n";
        var_dump($testArr);
        echo 'Float = ' . $testFloat . "\n";
    }
}
