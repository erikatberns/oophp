<?php

namespace Erika\game;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class ExampleTest extends TestCase
{
    public function testValues()
    {
        $guess = new game();
        $this->assertInstanceOf("\Erika\game\game", $guess);

        $res = $guess->valuesC();
        $exp = array();
        $this->assertEquals($exp, $res);

        $res = $guess->values();
        $exp = array();
        $this->assertEquals($exp, $res);
    }

    public function testRoll()
    {
        $guess = new game();
        $this->assertInstanceOf("\Erika\game\game", $guess);

        $res = $guess->roll();
        $exp = null;
        $this->assertEquals($exp, $res);
    }
    //
    // public function testDice()
    // {
    //       $guess = new game();
    //       $this->assertInstanceOf("\Erika\game\game", $guess);
    //
    //       $sum = array(1,2);
    //       $res = $guess->checkDice($sum);
    //       $exp = null;
    //       $this->assertEquals($exp, $res);
    //
    //       $sum = array(2,2);
    //       $res = $guess->checkDice($sum);
    //       $exp = null;
    //       $this->assertEquals($exp, $res);
    //
    //       $guess->valuesComp = array(1,2);
    //       $res = $guess->computerDice();
    //       $exp = null;
    //       $this->assertEquals($exp, $res);
    // }

    public function testSum()
    {
        $guess = new game();
        $this->assertInstanceOf("\Erika\game\game", $guess);

        $sum = array(1,2);
        $res = $guess->sum($sum);
        $exp = null;
        $this->assertEquals($exp, $res);

        $sum = array(2,2);
        $res = $guess->sum($sum);
        $exp = 4;
        $this->assertEquals($exp, $res);

        $res = $guess->sumComp();
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    // public function testSmall()
    // {
    //     $guess = new game();
    //     $this->assertInstanceOf("\Erika\game\game", $guess);
    //
    //     $res = $guess->getRandomSum();
    //     $exp = null;
    //     $this->assertEquals($exp, $res);
    //
    //     $res = $guess->__toString();
    //     $exp = null;
    //     $this->assertEquals($exp, $res);
    //
    //     $res = $guess->getCompStatus();
    //     $exp = null;
    //     $this->assertEquals($exp, $res);
    //
    //     $guess->values = array(5, 5, 5);
    //     $res = $guess->average();
    //     $exp = 3;
    //     $this->assertEquals($exp, $res);
    // }

    public function testDiceFunctions()
    {
        $guess = new Dice();
        $this->assertInstanceOf("\Erika\game\Dice", $guess);

        $res = $guess->roll();
        $exp = null;
        $this->assertEquals($exp, $res);

        $res = $guess->sum();
        $exp = null;
        $this->assertEquals($exp, $res);
    }
}
