<?php

namespace Erika\guess;

// require __DIR__ . "/guessException.php";
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    public $tries = 5;
    public $number = null;

    public function __construct(int $number = -1, int $tries = 5)
    {
        $this->tries = $tries;
        if ($number === -1) {
            $number = rand(1, 100);
        }
        $this->number = $number;
    }

    /**
    * @return void
    */
    public function random() : void
    {
        $this->number = rand(1, 100);
    }

    /**
    * @return int
    */
    public function tries() : int
    {
        return $this->tries;
    }

    /**
    * @return int
    */
    public function number() : int
    {
        return $this->number;
    }

    /**
    * @param int
    * @throws GuessException
    * @return string
    */
    public function makeGuess(int $guess) : string
    {
        if ($guess < 1 || $guess > 100) {
            throw new GuessException("number is out of bonds.");
        }

        // $this->$tries--;

        if ($guess == $this->number) {
            $res = "CORRECT";
        } elseif ($guess > $this->number) {
            $res = "TOO HIGH";
        } elseif ($guess < $this->number) {
            $res = "TOO LOW";
        }

        return $res;
    }
}
