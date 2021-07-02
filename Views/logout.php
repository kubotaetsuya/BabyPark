<?php
  // 直リンクを禁止
  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: index.php');
    exit;
  }
  session_start();
  require_once(ROOT_PATH . '/Models/User.php');
  require_once(ROOT_PATH . '/Models/Post.php');
  require_once(ROOT_PATH . '/Controllers/UserController.php');

  if (!$logout = filter_input(INPUT_POST, 'logout')) {
    exit('不正なリクエストです。');
  }

  //ログインしているか判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
  $user = new User();
  $result = $user->checkLogin();


  if (!$result) {
    exit('セッションが切れましたので、ログインし直してください。');
  }

  //ログアウトする
  $user->logout();

?>