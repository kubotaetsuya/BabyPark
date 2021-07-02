<?php

session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . 'Views/functions.php');

$params = $_POST;
$user = new UserController();
$result = $user->update($params);

?>