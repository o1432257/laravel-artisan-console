<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GuessNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guess:number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Guess Number';

    protected $number = 0;
    protected $guessNumber = 0;
    protected $round = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->setNumber(rand(0,100));

        $this->guessNumber();
    }

    protected function setNumber($randomNumber)
    {
        $this->number = $randomNumber;
    }

    protected function setGuessNumber($guessNumber)
    {
        $this->guessNumber = $guessNumber;
    }

    protected function newRound()
    {
        $this->round += 1;
    }

    protected function guessNumber()
    {
        $this->newRound();

        if ($this->round <= 10){

            $this->setGuessNumber($this->ask(' 0-100 猜個數字'));

            if (is_numeric($this->guessNumber))
            {
                $this->checkHighLow();
            }else{
                $this->warn('猜數字好嗎');
            }

        } else {
            $this->warn('你好爛喔 都猜10次了');
        }
    }

    protected function checkHighLow()
    {
        if ($this->number > $this->guessNumber)
        {
            $this->info("$this->guessNumber 太低");
            $this->guessNumber();
        }else if ($this->number < $this->guessNumber)
        {
            $this->info("$this->guessNumber 太高");
            $this->guessNumber();
        }else{
            $this->info('恭喜你 猜中了!!');
        }

    }
}
