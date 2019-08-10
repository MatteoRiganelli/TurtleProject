<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveController extends Controller
{

    function maxConsecutiveOnes($x)
    {
        // Initialize result
        $count = 0;

        // Count the number of
        // iterations to reach x = 0.
        while ($x != 0)
        {
            // This operation reduces
            // length of every sequence
            // of 1s by one.
            $x = ($x & ($x << 1));

            $count++;
        }

        return $count;
    }

    public function index(Request $request)
    {



        $n = 439;

        $binary = decbin($n);
dd($binary);
        $maxConsecutive = 0;

        $lenght = strlen($binary);


        for ($i = 0; $i < $lenght; $i++) {
            if (isset($binary[$i + 1]) ) {
                if ($binary[$i] === '1' )
                   $maxConsecutive++;
            }

        }

        return $maxConsecutive;

        //if ($maxConsecutive == 0 && (strpos($binary, '1') !== false) )
        //    $maxConsecutive++;

        //dd(max($arrayOfConsecutive));


    }


}
