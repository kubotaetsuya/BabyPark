<?php
session_start();
ini_set('display_errors', "On");

require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . 'Views/functions.php');
$user_id = $_SESSION['login_user']['id'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/edit.css">

  <title>投稿ページ</title>
</head>
<body>

  <?php include("_login_header.php") ?>

  <div class="wrapper">
    <div class="main">
      <div class="edit_main">
        <form action="edit_complete.php" method="POST">
          <dl>
            <dt><label for="title">タイトル</label></dt>
            <dd><input type="text" name="title" placeholder="タイトルを入力してください。"></dd>
          </dl>
          <dl>
            <dt><label for="body">質問の内容</label></dt>
            <dd>
            <textarea name="body" id="post_textarea" cols="10" rows="5" placeholder="質問の内容を入力してください。"></textarea>
            </dd>
          </dl>
          <dl>
            <dt><label for="category">カテゴリー</label></dt>
            <dd>
              <select name="category" id="category_box">
                <option value="0">選択してください</option>
                <option value="1">赤ちゃん育児</option>
                <option value="2">子育て</option>
                <option value="3">家族</option>
                <option value="4">病院</option>
                <option value="5">妊活</option>
                <option value="6">妊娠</option>
                <option value="7">出産</option>
                <option value="8">美容・ファッション</option>
                <option value="9">お仕事</option>
                <option value="10">お金</option>
                <option value="11">住まい</option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt><label for="tag">ステータス</label></dt>
            <dd>
              ステータス要素
            </dd>
          </dl>
          <input type="hidden" name="token" value="<?= h(setToken()) ?>">
          <input type="hidden" name="user_id" value="<?= $user_id ?>">
          <button type="submit" name="submit" value="送信" class="edit_btn">質問する</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>