<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    function index(){
        $file = fopen(public_path('basiswoorden-gekeurd.txt'), "r");
        while (!feof($file)){
            $word = fgets($file);
            $word = rtrim($word);
            $result = $this->validateWord($word);
            if (!$result) {
                continue;
            }
            else{
                Word::firstOrCreate([
                    'word' => $word
                ], [
                    'word' => $word,
                    'length' => Str::length($word)
                ]);

            }
            echo 'passed: ' . $word . '<br />' ;
        }
        fclose($file);
    }


    private function validateWord($word){


        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_.+¬-]/', $word)) {
            return false;
        }
        if (ctype_digit(substr($word, 0,1)) || $word === ucfirst($word)) {
            return false;
        }
        if (Str::length($word) < 5  || Str::length($word) > 7) {
            return false;
        }

        return  true;
    }

}
