<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function iteratif($n)
    {
        if ($n < 0) 
        {
            return null;
        } else if ($n == 0 || $n == 1) 
        {
            return 1;
        } else 
        {
            $result = 1;
            for ($i = 2; $i <= $n; $i++) 
            {
            $result *= $i;
            }
            return $result;
        }
    }

    public function calculateIteratif(Request $request)
    {
        $number = (int) $request->input('number');
        $hasil = $this->iteratif($number);
        return redirect()->route('iteratif-tampilan')->with(['hasil' => $hasil, 'number' => $number])->withInput();
    }
}
