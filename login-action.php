<?php

include_once 'db.php';
include_once 'user.php';

$u = new user ($connection, $_POST['first_name'], $_POST['email'], $_POST['password']);

$u->authenticate();

if ($u->is_logged_in()){
    session_start();
    $_SESSION['user'] = serialize($u);

    header("location: home.php");
} else{
    echo 'Could not log in with these credentials';
}