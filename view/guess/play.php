<?php

namespace Anax\View;

if (($guess == $_SESSION["number"])) {
    ?> <h1> you won!! </h1>
  <form method="post">
    <input type="submit" name="doInit" value="Play again">
  </form>

    <?php
} else {
    if (!($_SESSION["tries"]==0)) {
        ?>
<h1> Guess my number </h1>
<p> guess a number between 1 and 100, you have <?= $tries ?> left. </p>
        <?php
        ?>
<form method="post">
  <input type="text" name="guess">
  <input type="hidden" name="number" value="<?= $_SESSION["number"] ?>">
  <input type="hidden" name="tries" value="<?= $_SESSION["tries"] ?>">
  <input type="submit" name="doGuess" value="Make a guess">
  <input type="submit" name="doInit" value="Start from beginning">
  <input type="submit" name="doCheat" value="Cheat">
</form>

        <?php if ($res) :?>
          <p> your guess <?= $guess ?> is <?= $res ?>.</p>
        <?php endif; ?>

        <?php if ($doCheat) :?>
          <p> Cheat: Correct answer is <?= $_SESSION["number"] ?> .</p>
        <?php endif;
    } else {
        ?>
<h1>Out of guesses..</h1>

<form method="post">
<input type="submit" name="doInit" value="Try again">
</form>
</body>
</html>
        <?php
    }
}
