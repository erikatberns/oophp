<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Gissa-spel",
            "url" => "guess-game",
            "title" => "Gissa nummer.",
        ],
        [
            "text" => "100-spelet",
            "url" => "game",
            "title" => "100-spelet.",
        ],
        [
            "text" => "Filmer",
            "url" => "movie",
            "title" => "Filmer.",
        ],
        // [
        //     "text" => "Styleväljare",
        //     "url" => "style",
        //     "title" => "Välj stylesheet.",
        // ],
        [
            "text" => "Docs",
            "url" => "dokumentation",
            "title" => "Dokumentation av ramverk och liknande.",
        ],
        // [
        //     "text" => "Test &amp; Lek",
        //     "url" => "lek",
        //     "title" => "Testa och lek med test- och exempelprogram",
        // ],
        [
            "text" => "Anax dev",
            "url" => "dev",
            "title" => "Anax development utilities",
        ],
    ],
];
