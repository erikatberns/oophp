<?php

namespace Erika\game;

/**
 * A dicehand, consisting of dices.
 */
class Dice
{
    public $dice = [];
    public $sum;
    public $numberDices;
    public $number;

    public function __construct(int $number = 2)
    {
          return $this->numberDices = $number;
    }

    public function roll()
    {
          $this->number = rand(1, 6);
    }

  // public function saveRes()
  // {
  //   return $this->dice;
  // }



    public function sum()
    {
        $this->sum = array_sum($this->dice);
    }

    // public function showResult()
    // {
    //   echo nl2br("1. " . $this->dice[0] . "\n");
    //   echo nl2br("2. " . $this->dice[1] . "\n");
    //   echo nl2br("3. " . $this->dice[2] . "\n");
    //   echo nl2br("4. " . $this->dice[3] . "\n");
    //   echo nl2br("5. " . $this->dice[4] . "\n");
    //   echo nl2br("6. " . $this->dice[5] . "\n\n");
    //   echo nl2br("Sum: " . $this->sum . "\n");
    //   echo nl2br("Average: " . round($this->sum/1, 2));
    // }
}
