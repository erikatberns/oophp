<style>
<?php include 'css/style.css'; ?>
</style>

<?php
if ($res == $number) {
    ?>
  <h1>YOU WON!</h1>
  <form method="post">
    <input type="submit" name="doInit" value="Play again?">
  </form>
    <?php
} else {
    if (!($_SESSION["tries"]==0)) {
        ?>

<h1> Guess my number </h1>
<p> guess a number between 1 and 100, you have <?= $tries ?> left. </p>


<form method="post">
  <input type="text" name="guess">
  <input type="submit" name="doGuess" value="make a guess">
  <input type="submit" name="doInit" value="Start from the beginning">
  <input type="submit" name="doCheat" value="Cheat">
</form>

        <?php if ($doGuess) :?>
          <p> your guess <?= $guess ?> is <?= $res ?>.</p>
        <?php endif; ?>

        <?php if ($doCheat) :?>
          <p> Cheat: Correct answer is <?= $number ?> .</p>
        <?php endif;
    } else {
        ?>
<h1>Out of guesses..</h1>

<form method="post">
<input type="submit" name="doInit" value="Start from beginning">
</form>
</body>
</html>
        <?php
    }
}
