<?php
  // 直リンクを禁止
  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: index.php');
    exit;
  }

session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . 'Views/functions.php');

$id = $_GET['id'];
$post = new PostController();
$result = $post->delete($id);

?>