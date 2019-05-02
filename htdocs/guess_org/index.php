<?php

require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

session_name("Erika");
session_start();

//Deal with incoming variables
$guess       = $_POST["guess"] ?? null;
$doInit      = $_POST["doInit"] ?? null;
$doGuess     = $_POST["doGuess"] ?? null;
$doCheat     = $_POST["doCheat"] ?? null;

//Get current settings from the SESSION
$number = $_SESSION["number"] ?? null;
$tries = $_SESSION["tries"] ?? null;
$game = null;

if ($doInit || $number == null) {
    $game = new Guess();
    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();
} elseif ($doGuess) {
  // Do a guess
    $game = new Guess($number, $tries);
    $res = $game->makeGuess($guess);
    $_SESSION["tries"] = $game->tries();
}

require __DIR__ . "/view/index.php";
