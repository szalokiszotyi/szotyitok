<?php

$name   = $_POST['name'];
$email  = $_POST['email'];
$pass   = password_hash ($_POST['pass'], PASSWORD_DEFAULT);

$config = getConfig($confPath);
$pdo    = getConnection($config);


if (!signUp($pdo, $name, $email, $pass))
{
    header('Location: index.php?page=signUp$error=1');
    die;
}

header('Location: index.php');

die;