<?php

require("../../app/app.php");
session_start();

if (is_user_authenticated()) {
    redirect('/project/admin/index.php');
}

$view_bag = [
    'title' => 'Gross Glossary',
    'status' => ''
];

if (is_post()) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (authenticate_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('/envato-php-tut/project/admin/index.php');
        die();
    } else {
        $view_bag['status'] = "The provided credentials didn't work";
    }

    if (!$email || !$password) {
        $view_bag['status'] = "You can't leave any field empty";
    }
}

view("admin/login");
