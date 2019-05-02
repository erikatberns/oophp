<?php
require __DIR__ . "/guessException.php";
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    public $tries = 5;
    public $number = null;
    public $res;

    public function random()
    {
        $this->number = rand(1, 100);
    }

    public function getNumber()
    {
        return $this->number;
    }


    public function makeGuess($doInit, $doGuess, $guess)
    {
        if (!($guess > 0 && $guess <= 100 || $guess == null)) {
            throw new GuessException("You must enter a number between 1 and 100.");
        }

        if ($doInit || $this->number === null) {
            //init the game
            $this->number = rand(1, 100);
            $_SESSION["count"] = 5;
            // $tries = $_SESSION["count"]
        } elseif ($doGuess) {
            // Do a guess
            $_SESSION["count"] -= 1;
            if ($guess == $this->number) {
                $this->res = "CORRECT";
            } elseif ($guess > $this->number) {
                $this->res = "TOO HIGH";
            } else {
                $this->res = "TO LOW";
            }
        }
    }

    public function __toString()
    {
        return (string)$this->res;
    }
}
