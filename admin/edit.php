<?php

session_start();
require('../app/app.php');
ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Glossary'
];

if (is_get()) {
    $key = filter_input(INPUT_GET, 'key', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($key)) {
        view('not_found');
        die();
    }

    $term = Data::get_term($key);

    if ($term === false) {
        view('not_found');
        die();
    }

    view('admin/edit', $term);
}

if (is_post()) {
    $original_term = filter_input(INPUT_POST, 'original-term', FILTER_SANITIZE_SPECIAL_CHARS);
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_SPECIAL_CHARS);
    $definition = filter_input(INPUT_POST, 'definition', FILTER_SANITIZE_SPECIAL_CHARS);


    if (empty($term) || empty($definition) || empty($original_term)) {
        // TODO: display message
    } else {
        Data::update_term($original_term, $term, $definition);
        redirect('index.php');
    }
}
