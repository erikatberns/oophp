<?php

namespace Erika\guess;

/**
 * Exception class for Guess.
 */
class GuessException extends \Exception
{
    public function guessexce($guess)
    {
        if (($guess < 1 || $guess > 100)) {
            return "out of bounds.";
        }
        return "ok";
    }
}
