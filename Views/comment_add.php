<?php
session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Models/Comment.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . '/Controllers/CommentController.php');
require_once(ROOT_PATH . 'Views/functions.php');

$params = $_POST;
$id = $_GET['id'];
$url = "show.php?id=" . $id;
$comment = new CommentController();
$result = $comment->create($params);
// if (isset($result) === true){
// }
//リダイレクト
header('Location:' . $url);
exit();

?>