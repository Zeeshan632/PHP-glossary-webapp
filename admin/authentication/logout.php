<?php

require("../../app/app.php");

$view_bag = [
    'title' => 'Glossary'
];

session_start();
session_unset();
session_destroy();

redirect('/envato-php-tut/project/index.php');
