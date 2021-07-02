<?php
  // 直リンクを禁止
  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: index.php');
    exit;
  }
  session_start();
  require_once(ROOT_PATH . '/Models/User.php');
  require_once(ROOT_PATH . '/Controllers/UserController.php');
  require_once(ROOT_PATH . 'Views/functions.php');

  // $err = $_SESSION;

  // // セッションを消す
  // $_SESSION = array();
  // session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>ログイン画面</title>
</head>
<body>

  <!-- header -->
  <?php include("_header.html") ?>

  <div class="wrapper" id="login_back">
    <div class="main">
      <h2 class="login_title">ログイン</h2>
      <div class="login_main">
        <div class="login_left">
          <h3>SNSアカウントでログイン</h3>
          <ul>
            <li class="Facebook">Facebookでログイン</li>
            <li class="Google">Googleでログイン</li>
            <li class="Twitter">Twitterでログイン</li>
          </ul>
        </div>
        <div class="login_right">
          <form action="index.php" method="POST">
            <?php if (isset($err['msg'])) : ?>
              <p><?php echo $err['msg']; ?></p>
            <?php endif; ?>
            <dl>
              <dt><label for="email">メールアドレス</label></dt>
              <dd><input type="text" name="email" placeholder="メールアドレスを入力"></dd>
              <?php if (isset($err['email'])) : ?>
                <p><?php echo $err['email']; ?></p>
              <?php endif; ?>
            </dl>
            <dl>
              <dt><label for="password">パスワード</label></dt>
              <dd><input type="text" name="password" placeholder="パスワードを入力"></dd>
              <?php if (isset($err['password'])) : ?>
                <p><?php echo $err['password']; ?></p>
              <?php endif; ?>
            </dl>
            <input type="hidden" name="token" value="<?= h(setToken()) ?>">
            <button type="submit" name="submit" class="login_submit">登録する</button>
            <div class="login_right_bottom">
              <a href="#">新規登録へ</a>
              <a href="#">パスワードを忘れた方</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- フッター -->
    <?php include("_footer.html") ?>

</body>
</html>