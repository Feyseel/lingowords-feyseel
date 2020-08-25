<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tests\TestCase;

class WordAPITest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     *
     * Get all words from API
     */

    public function testAllWordsEndPoint(){

        $this->withoutExceptionHandling();

        $this->json('GET', 'api/words')
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);

    }
    public function testAllWordsEndPointWithFixedLength(){
        $this->withoutExceptionHandling();

        $random = rand(1, 100);
        $result = $this->json('GET', "api/words/$random");
        if ($random === 5 || $random === 6 || $random === 7) {
            $result->assertStatus(200)
                ->assertJson([
                   'status' => 'success',

                ]);
        } else {
            $result->assertStatus(200)
                ->assertJson([
                    'status'    => 'success',
                    'words'     => []
                ])
                ->assertJsonCount(0, 'words');
        }
    }
    public function testRandomWord(){
        $this->withoutExceptionHandling();

        factory(\App\Models\Word::class, 100)->create();

        $result = $this->json('GET', 'api/randomWord');

            $result
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);
            // ->assertJsonCount(4, 'word');
    }
    public function testRandomWordWithRange(){
        $random = rand(1, 100);
        $result = $this->json('GET', "api/randomWord/$random");
        if($random === 5 || $random === 6 || $random === 7) {
            $result
                ->assertStatus(200)
                ->assertJson([
                    'status' => 'success'
                ])
                ->assertJsonCount(4, 'word');
        } else {
            $result
                ->assertStatus(200)
                ->assertJson([
                    'status' => 'success'
                ])
                ->assertJsonCount(0, 'word');
        }

    }

}
