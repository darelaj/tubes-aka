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
    public function rekursif($n)
    {
        // Validasi untuk mencegah stack overflow
        if ($n > 1000) {
            return "Angka terlalu besar untuk rekursif";
        }

        if ($n < 0) {
            return null;
        }

        if ($n <= 1) {
            return 1;
        }

        return $n * $this->rekursif($n - 1);
    }

    public function calculateRekursif(Request $request)
    {
        $number = (int) $request->input('number');

        // Validasi tambahan
        if ($number > 1000) {
            return redirect()->route('rekursif-tampilan')->with([
                'error' => 'Angka terlalu besar untuk perhitungan rekursif',
                'number' => $number
            ])->withInput();
        }

        $hasil = $this->rekursif($number);

        return redirect()->route('rekursif-tampilan')->with([
            'hasil' => $hasil,
            'number' => $number
        ])->withInput();
    }
}
