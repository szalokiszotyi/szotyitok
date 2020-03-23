<?php

$email = $_POST['email'];
$pass = $_POST['pass'];

$config = getConfig($confPath);
$pdo = getConnection($config);

$user = signIn($pdo, $email, $pass);

if (!$user)
{
    header('Location: index.php?page=signIn&error=1');
    die;
}

$_SESSION['userName'] = $user['name'];
$_SESSION['email'] = $user['email'];

header('Location: index.php');
die;