<?php
  session_start();
  require_once(ROOT_PATH . 'Views/functions.php');

  $test;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <title>新規登録</title>
</head>
<body>

  <!-- header -->
  <?php include("_header.html") ?>

  <div class="wrapper" id="register_back">
    <div class="main">
      <h2 class="register_title">新規登録</h2>
      <div class="register_main">
        <div class="register_left">
          <h3>SNSアカウントで新規登録</h3>
          <ul>
            <li><a href="sns_new.php" class="facebook">Facebookアカウントで登録</a></li>
            <li><a href="sns_new.php" class="twitter">Twitterアカウントで登録</a></li>
            <li><a href="sns_new.php" class="google">Googleアカウントで登録</a></li>
          </ul>
        </div>
        <div class="register_right">
          <form action="register_complete.php" method="POST">
            <dl>
              <dt><label for="name">ニックネーム</label></dt>
              <dd><input type="text" name="name" value="" placeholder="ニックネームを入力"></dd>
            </dl>
            <dl>
              <dt><label for="email">メールアドレス</label></dt>
              <dd><input type="text" name="email" value="" placeholder="メールアドレスを入力"></dd>
            </dl>
            <dl>
              <dt><label for="password">パスワード</label></dt>
              <dd><input type="text" name="password" value="" placeholder="パスワードを入力"></dd>
            </dl>
            <dl>
              <dt><label for="password_conf">確認用パスワード</label></dt>
              <dd><input type="text" name="password_conf" value="" placeholder="パスワードを入力"></dd>
            </dl>
            <dl>
              <dt><label for="sex">続柄</label></dt>
              <dd>
                <input type="radio" name="sex" value="0">パパ
                <input type="radio" name="sex" value="1">ママ
              </dd>
            </dl>
            <input type="hidden" name="token" value="<?= h(setToken()) ?>">
            <button type="submit" name="submit" class="register_submit">登録する</button>
          </form>
        </div>
      </div>
    </div>
  
  <!-- フッター -->
  <?php include("_footer.html") ?>
  </div>

</body>
</html>