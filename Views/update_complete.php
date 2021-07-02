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

$params = $_POST;
$post = new PostController();
$result = $post->update($params);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link rel="stylesheet" type="text/css" href="css/update_complete.css">
  <title>投稿編集完了ページ</title>
</head>
<body>
  <!-- header -->
  <?php include("_login_header.php") ?>

  <div class="update_comp_main">
    <div class="update_comp_box">
      <h2>更新が完了しました!</h2>
      <a href="show.php">投稿を確認する</a>
    </div>
  </div>

  <!-- フッター -->
  <?php include("_footer.html") ?>

</body>
</html>