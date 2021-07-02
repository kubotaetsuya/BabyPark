<?php

  // 直リンクを禁止
  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../Player/index.php');
    exit;
  }
  session_start();
  require_once(ROOT_PATH . '/Models/User.php');
  require_once(ROOT_PATH . '/Controllers/UserController.php');
  require_once(ROOT_PATH . 'Views/functions.php');

  // トークンのチェック
  $token = filter_input(INPUT_POST, 'token');
  //トークンがない、もしくは一致しない場合処理を中止
  if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエスト');
  }
  unset($_SESSION['csrf_token']);

  $result = $_POST;
  $user = new UserController();
  $params = $user->create($result);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link rel="stylesheet" type="text/css" href="css/register_comp.css">
  <title>新規登録完了画面</title>
</head>
<body>
  <!-- header -->
  <?php include("_header.html") ?>

  <div class="register_complete_main">
    <div class="register_comp_box">
      <h2>ようこそ</h2>
      <p>登録が完了しました。<br>
        あなたの悩みを投稿すれば<br>
        解決策が返ってきます。<br>
        育児に関する悩み・夫婦間での子育ての悩みを<br>
        投稿し、解決策を見つけましょう！<br>
      </p>
      <a href="login.php">ログイン画面へ</a>
    </div>
  </div>

  <!-- フッター -->
  <?php include("_footer.html") ?>
</body>
</html>