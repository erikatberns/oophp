<?php

require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";


session_name("isca18");
session_start();

if (!isset($_SESSION["guess"])) {
    $_SESSION["guess"] = new Guess();
}

$guess = $_SESSION["guess"];
$number = $guess->number();
$tries = $guess->tries($guess->tries() - 1);
?>

<h1> Guess my number </h1>

<p> Guess a number between 1 and 100, you have <?= $tries; ?> tries left. </p>

<form method="post">
    <input type="text" name="guess">
    <input type="hidden" name="number" value="<?= $guess->number() ?>">
    <input type="hidden" name="tries" value="<?= $guess->tries() ?>">
    <input type="submit" name="doGuess" value="Make a guess">
    <input type="submit" name="doInit" value="Start from beginning">
    <input type="submit" name="doCheat" value="Cheat">
</form>

<?php
// $doInit= $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;
?>

<?php if ($doGuess) : ?>
    <?php $result = $guess->makeGuess($doGuess); ?>
    <p>Your guess <?= $guess ?> is <b><?= $result ?></b></p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p>The number is <?= $guess->number() ?></p>
<?php endif; ?>
