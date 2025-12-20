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
        
        // Gunakan BCMath untuk angka besar
        if ($number > 170) {
            $hasil = $this->iteratifBC($number);
        } else {
            $hasil = $this->iteratif($number);
        }
        
        return redirect()->route('iteratif-tampilan')->with(['hasil' => $hasil, 'number' => $number])->withInput();
    }

    public function iteratifBC($n)
    {
        if ($n < 0) {
            return null;
        } else if ($n == 0 || $n == 1) {
            return 1;
        } else {
            $result = '1';
            for ($i = 2; $i <= $n; $i++) {
                $result = bcmul($result, (string)$i);
            }
            $exponent = strlen($result) - 1;
            $mantissa = substr($result, 0, 1) . '.' . substr($result, 1, 2);
            return $mantissa . 'E+' . $exponent;
        }
    }

    public function rekursif($n)
    {
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

        // Gunakan BCMath untuk angka besar
        if ($number > 170) {
            $hasil = $this->rekursifBC($number);
        } else {
            $hasil = $this->rekursif($number);
        }

        return redirect()->route('rekursif-tampilan')->with([
            'hasil' => $hasil,
            'number' => $number
        ])->withInput();
    }

    public function rekursifBC($n)
    {
        if ($n < 0) {
            return null;
        } else if ($n == 0 || $n == 1) {
            return 1;
        } else {
            $result = '1';
            for ($i = 2; $i <= $n; $i++) {
                $result = bcmul($result, (string)$i);
            }
            $exponent = strlen($result) - 1;
            $mantissa = substr($result, 0, 1) . '.' . substr($result, 1, 2);
            return $mantissa . 'E+' . $exponent;
        }
    }
}
