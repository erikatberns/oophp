<?php

namespace Erika\game;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class game
{
/**
 * @var Dice $dices   Array consisting of dices.
 * @var int  $values  Array consisting of last roll of the dices.
 */
    public $dices;
    public $values;
    public $res;
    public $sumRes;
    public $randomSum;
    public $compStatus;

/**
 * Constructor to initiate the dicehand with a number of dices.
 *
 * @param int $dices Number of dices to create, defaults to five.
 */
    public function __construct(int $dices = 5, $dicesComp = 2)
    {
        $this->dices  = [];
        $this->dicesComp  = [];
        $this->values = [];
        $this->valuesComp = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice();
        }

        for ($i = 0; $i < $dicesComp; $i++) {
            $this->dicesComp[]  = new Dice();
        }
    }

/**
 * Roll all dices save their value.
 *
 * @return void.
 */
    public function roll()
    {
        for ($i = 0; $i < 2; $i++) {
            array_push($this->values, rand(1, 6));
            array_push($this->valuesComp, rand(1, 6));
        };
    }

/**
 * Get values of dices from last roll.
 *
 * @return array with values of the last roll.
 */
    public function valuesC()
    {
        return $this->valuesComp;
    }
/**
 * Get values of dices from last roll.
 *
 * @return array with values of the last roll.
 */
    public function values()
    {
        return $this->values;
    }
/**
 * Get the sum of all dices.
 *
 * @return int as the sum of all dices.
 */
    public function sum($value)
    {
        if (in_array(1, $value)) {
            return $value = 0;
        } else {
            return array_sum($value);
        }
    }

/**
 * Get the sum of all dices.
 *
 * @return int as the sum of all dices.
 */
    public function sumComp()
    {
          return array_sum($this->valuesComp);
    }

    public function checkDice($dice)
    {
        if (in_array(1, $dice)) {
            $this->res = "tärningskastet innehåller en etta, inga poäng sparas.";
            $this->computerDice();
        } else {
            $this->res = implode(", ", $dice);
            $this->compStatus = "Väntar på sin tur";
            $this->randomSum = 0;
        }
    }

    public function computerDice()
    {
        if (in_array(1, $this->valuesComp)) {
              $this->randomSum = null;
              $this->compStatus = "Dator slog en etta, inga poäng sparas.";
        } else {
              $this->randomSum = array_sum($this->valuesComp);
              $this->compStatus = "Dator har sparat.";
        }
    }

    public function getRandomSum()
    {
          return $this->randomSum;
    }

    public function getCompStatus()
    {
          return $this->compStatus;
    }

    public function __toString()
    {
          return (string)$this->res;
    }
/**
 * Get the average of all dices.
 *
 * @return float as the average of all dices.
 */
    public function average($dices = 5)
    {
          return array_sum($this->values)/$dices;
    }
}
