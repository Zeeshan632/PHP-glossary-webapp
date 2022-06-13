<?php

require("app/app.php");

if (!isset($_GET['term'])) {
    redirect('index.php');
}
$view_bag = [
    'title' => 'Glossary',
];
$data = Data::get_term(filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS));


if (!$data) {
    view('not_found');
    die();
}

view('detail', $data);
