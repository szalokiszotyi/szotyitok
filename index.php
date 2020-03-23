<?php

define('APPPATH', 'Application/');

$confPath='config.json';
$page = @$_GET['page'] ? $_GET['page'] : 'home';
$d = $_POST;
session_start();

require_once APPPATH.'functions.php';

switch ($page)
{
    case 'signUp':   require_once APPPATH.'Core/signUp.php';    break;
    case 'signIn':   require_once APPPATH.'Core/signIn.php';    break;
    case 'auth':     require_once APPPATH.'Core/auth.php';      break;
    case 'validate': require_once APPPATH.'Core/validate.php';  break;
    case 'logout':   require_once APPPATH.'Core/logout.php';    break;
    
}

if(@$d["add_termek"]) require_once APPPATH.'Core/ujtermekek.php';
if (isset($_GET['delete'])) require_once APPPATH.'Core/termektorlese.php';

require_once APPPATH.'Templates/_layout.php';
