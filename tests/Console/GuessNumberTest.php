<?php

namespace Tests\Console;

class GuessNumberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_console_guess_number()
    {
        $this->artisan('guess:number')
        ->expectsQuestion(' 0-100 猜個數字', '77')
        ->assertExitCode(0); 
    }
}