<?php

session_start();
require('../app/app.php');
ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Glossary',
];

if (is_post()) {
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_SPECIAL_CHARS);
    $definition = filter_input(INPUT_POST, 'definition', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($term) || empty($definition)) {
        redirect('index.php');
    }

    $term_added = Data::add_term($term, $definition);
    redirect('index.php');
}

view('admin/create', Data::get_terms());
