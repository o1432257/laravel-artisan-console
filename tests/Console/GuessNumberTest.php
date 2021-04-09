<?php

namespace Tests\Console;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_console_guess_number()
    {
        $this->artisan('guess:number');
    }
}