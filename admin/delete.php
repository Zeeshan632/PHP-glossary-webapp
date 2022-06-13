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

    view('admin/delete', $term);
}

if (is_post()) {
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_SPECIAL_CHARS);


    if (empty($term)) {
        // TODO: display message
    } else {
        Data::delete_term($term);
        redirect('index.php');
    }
}
