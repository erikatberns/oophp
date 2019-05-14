<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init the game and redirect to play the game.
 */
$app->router->get("game/init", function () use ($app) {
    // init the session for the gamestart
    $game = new \Erika\game\game();
    $game->roll();
    return $app->response->redirect("game/player");
});



/**
 * Play the game - status
 */
$app->router->get("game/player", function () use ($app) {
    $title = "Play the game";

    $rollDices     = $_SESSION["rollDices"] ?? null;
    $savePoints     = $_SESSION["savePoints"] ?? null;
    $doInit     = $_SESSION["doInit"] ?? null;
    $dice        = $_SESSION["dice"] ?? null;
    $diceComp        = $_SESSION["diceComp"] ?? null;
    $sum        = $_SESSION["sum"] ?? null;
    $compSum        = $_SESSION["compSum"] ?? null;
    $savedSum        = $_SESSION["savedSum"] ?? null;
    $savedSumComp        = $_SESSION["savedSumComp"] ?? null;
    $res        = $_SESSION["res"] ?? null;
    $resComp        = $_SESSION["resComp"] ?? null;
    $histogram        = $_SESSION["histogram"] ?? null;
    $statistik        = $_SESSION["statistik"] ?? null;

    $_SESSION["dice"] = null;
    $_SESSION["doInit"] = null;

    $data = [
    "resComp" => $resComp ?? null,
    "res" => $res ?? null,
    "rollDices" => $rollDices ?? null,
    "doInit" => $doInit ?? null,
    "savedSum" => $savedSum ?? null,
    "savedSumComp" => $savedSumComp ?? null,
    "savePoints" => $savePoints ?? null,
    "histogram" => $histogram ?? array(),
    "statistik" => $statistik ?? null,
    ];

    $app->page->add("game/player", $data);
    // $app->page->add("guess/debug");

    return $app->page->render([
      "title" => $title,
    ]);
});

/**
 * Play the game - make a guess
 */
$app->router->post("game/player", function () use ($app) {
    $title = "Play the game";
    $game = new \Erika\game\game();
    $game->roll();
    $game->computerDice();


    //Deal with incoming variables
    $rollDices        = $_POST["rollDices"] ?? null;
    $doInit         = $_POST["doInit"] ?? null;
    $savePoints     = $_POST["savePoints"] ?? null;


    if (isset($rollDices)) {
        $_SESSION["rollDices"] = $rollDices;
        $_SESSION["dice"] = $game->values();
        $_SESSION["sum"] = $game->sum($_SESSION["dice"]);
        $game->checkDice($_SESSION["dice"]);
        $_SESSION["res"] = $game->res;
        $_SESSION["resComp"] = $game->getCompStatus();
        $_SESSION["savedSumComp"] += $game->getRandomSum();
        $_SESSION["array"] = array_merge($game->values, $_SESSION["array"]);
        $_SESSION["histogram"] = $game->printHist($_SESSION["array"]);
        $_SESSION["statistik"] = $game->average($_SESSION["array"]);
    } if (isset($doInit)) {
        $_SESSION["sum"] = null;
        $_SESSION["rollDices"] = null;
        $_SESSION["savedSum"] = null;
        $_SESSION["savedSumComp"] = null;
        $_SESSION["array"] = array();
        $_SESSION["histogram"] = $_SESSION["array"];
        $_SESSION["statistik"] = null;
    } if (isset($savePoints)) {
        $_SESSION["savedSum"] += $_SESSION["sum"];
        $_SESSION["resComp"] = $game->getCompStatus();
        $_SESSION["array"] = array_merge($game->valuesComp, $_SESSION["array"]);
        $_SESSION["histogram"] = $game->printHist($_SESSION["array"]);
        $_SESSION["statistik"] = $game->average($_SESSION["array"]);
        $_SESSION["savedSumComp"] += $game->getRandomSum();
    }
    return $app->response->redirect("game/player");
});
