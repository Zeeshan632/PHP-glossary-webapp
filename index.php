<?php

require("app/app.php");


$view_bag = [
    'title' => 'Glossary'
];


if (isset($_GET['search'])) {
    $items = Data::search_terms($_GET['search']);
} else {
    $items = Data::get_terms();
}

view("index", $items);
