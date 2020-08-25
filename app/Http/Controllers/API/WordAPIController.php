<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordAPIController extends Controller
{
    public function words($length = null){

        if ($length === null) {
            $words = Word::all();

        }
        else {
            $words = Word::where('length', $length)->get();
        }
        $data = [
            'status' => 'success',
            'words' => $words
        ];
        return response()->json($data);
    }
    public function randomWord($length = null){
            if ($length === null) {
                $word = Word::all()->random();
            } else {
                $word = Word::where('length', $length)->get();
                if ($word->count() > 0) {
                    $word = $word->random();
                }
            }


            $data = [
              'status' => 'success',

              'word' => $word,
            ];
            return response()->json($data);
    }
}
