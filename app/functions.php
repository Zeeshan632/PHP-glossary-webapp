<?php

function redirect($url)
{
    header("Location: ${url}");
    die();
}

function view($name, $model = '')
{
    global $view_bag;
    require(APP_PATH . "views/layout.view.php");
}

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_get()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function authenticate_user($email, $password)
{
    // return CONFIG['users']['email'] === $email && CONFIG['users']['password'] === $password;
    $users = CONFIG['users'];
    if (!isset($users[$email])) {
        return false;
    }

    $user_password = $users[$email];
    return $user_password === $password;
}

function is_user_authenticated()
{
    return isset($_SESSION['email']);
}

function ensure_user_is_authenticated()
{
    if (!is_user_authenticated()) {
        redirect('authentication/login.php');
    }
}

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
