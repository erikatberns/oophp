<?php

namespace Anax\View;

?>

<h1> 100-spelet. </h1>
<p> Kasta 2 tärningar, först till 100 vinner. </p>

<?php
if ($savedSum == 100 || $savedSum > 100) {?>
<p> du vann! Spela igen? </p>
<form method="post">
  <input type="submit" name="doInit" value="Börja om från början">
</form>
    <?php
} elseif ($savedSumComp == 100 || $savedSumComp > 100) {?>
<p> du förlorade! Spela igen? </p>
<form method="post">
  <input type="submit" name="doInit" value="Börja om från början">
</form>
    <?php
} else {?>
<form method="post">
  <input type="submit" name="rollDices" value="Kasta tärningarna">
  <input type="submit" name="savePoints" value="Spara poäng">
  <input type="submit" name="doInit" value="Börja om från början">
</form>
<br><br>
    <?php
    if ($rollDices) :?>
<br><b>Ditt kast:</b><br>
        <?=$res?>
<br><b> Din total:</b><br>
        <?= $savedSum?>
<br><br><b>Datorns kast:</b><br>
        <?=$resComp?>
 <br><b>Datorns total:</b><br>
        <?= $savedSumComp?></p>
    <?php endif;
}?>

<pre><?php print_r($histogram) ?></pre>
<!-- <pre>medelvärde: <?php print_r($statistik) ?></pre> -->
<!-- <pre><?php var_dump($histogram) ?></pre> -->
