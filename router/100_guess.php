<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init the game and redirect to play the game.
 */
$app->router->get("guess/init", function () use ($app) {
    // init the session for the gamestart
    $game = new \Erika\guess\Guess();
    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();
    return $app->response->redirect("guess/play");
});



/**
 * Play the game - status
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game";

    $tries      = $_SESSION["tries"] ?? null;
    $res        = $_SESSION["res"] ?? null;
    $guess        = $_SESSION["guess"] ?? null;
    $doCheat     = $_SESSION["doCheat"] ?? null;


    $_SESSION["res"] = null;
    $_SESSION["guess"] = null;
    $_SESSION["doCheat"] = null;

    $data = [
    "guess" => $guess ?? null,
    "res" => $res,
    "tries" => $tries,
    "number" => $number ?? null,
    "doGuess" => $doGuess ?? null,
    "doCheat" => $doCheat ?? null,
    ];

    $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug");

    return $app->page->render([
      "title" => $title,
    ]);
});



/**
 * Play the game - make a guess
 */
$app->router->post("guess/play", function () use ($app) {
    $title = "Play the game";

    //Deal with incoming variables
    $guess       = $_POST["guess"] ?? null;
    $doInit      = $_POST["doInit"] ?? null;
    $doGuess     = $_POST["doGuess"] ?? null;
    $doCheat     = $_POST["doCheat"] ?? null;

    // Get current dettings from SESSION
    $number     = $_SESSION["number"] ?? null;
    $tries      = $_SESSION["tries"] ?? null;

    if ($doGuess) {
        // Do a guess
        $game = new \Erika\guess\Guess($number, $tries);
        $res = $game->makeGuess($guess);
        $_SESSION["tries"] -= 1;
        // $_SESSION["tries"] = $game->tries();
        $_SESSION["res"] = $res;
        $_SESSION["guess"] = $guess;
    } if ($doInit) {
        $game = new \Erika\guess\Guess();
        $_SESSION["number"] = $game->number();
        $_SESSION["tries"] = $game->tries();
    } if (isset($doCheat)) {
        $_SESSION["doCheat"] = $doCheat;
        $number = $_SESSION["number"];
    }
    return $app->response->redirect("guess/play");
});
