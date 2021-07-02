<?php
session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . 'Views/functions.php');

// ログイン時のトークンのチェック
$token = filter_input(INPUT_POST, 'token');
//トークンが存在するときは、ログイン処理を行う
if (isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token']) {
  $user = new UserController();
  $email = $_POST['email'];
  $password = $_POST['password'];
  $params = $user->index($email, $password);
} else {
}
unset($_SESSION['csrf_token']);

// 投稿一覧機能呼び出し
$posts = new PostController();
$params = $posts->index();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <title>BabyPark</title>
</head>

<body>
  <!-- 未ログイン時のヘッダー -->
  <?php if (!isset($_SESSION['login_user'])) : ?>
    <?php include("_header.html") ?>
  <?php endif; ?>

  <!-- ログイン時のヘッダー -->
  <?php if (isset($_SESSION['login_user'])) : ?>
    <?php include("_login_header.php") ?>
  <?php endif; ?>
<div class="wrapper">

  <!-- 未ログイン時のジャンボトロン -->
  <?php if (!isset($_SESSION['login_user'])) : ?>
    <div class="back_img">
      <div class="jumbotron_main ">
        <div class="jumbotron">
          <div class="left_title">
            <p class="title_description">育児に関するQ&Aサイト</p>
            <h2>BabyPark</h2>
            <p>育児に関する悩みを質問として投稿し様々な方から回答が投稿されます。<br>
            さらにママの意見とパパの意見を分けることによりそれぞれの立場からの<br>
            考え方を知ることができるサービスです。</p>
          </div>
          
          <div class="sign_in_box">
            <div class="mail_sign_in">
              <a href="register.php">メールアドレスで登録する</a>
            </div>
            <div class="or">OR</div>
            <div class="sosyal">
              <a href="#" class="facebook">Facebook</a>
            </div>
            <div class="sosyal">
              <a href="#" class="twitter">Twitter</a>
            </div>
            <div class="sosyal">
              <a href="#" class="google">Google</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
    <!-- カテゴリー枠 -->
    <div class="wrapper">
      <div class="category_list">
        <div class="category_title">
          <h3>カテゴリー</h3>
        </div>
        <ul>
          <li class="category_1"><a href="#" class="category_btn">赤ちゃん育児</a></li>
          <li class="category_2"><a href="#" class="category_btn">子育て</a></li>
          <li class="category_3"><a href="#" class="category_btn">家族</a></li>
          <li class="category_4"><a href="#" class="category_btn">病院</a></li>
          <li class="category_5"><a href="#" class="category_btn">妊活</a></li>
          <li class="category_6"><a href="#" class="category_btn">妊娠</a></li>
          <li class="category_7"><a href="#" class="category_btn">出産</a></li>
          <li class="category_8"><a href="#" class="category_btn">美容・ファッション</a></li>
          <li class="category_9"><a href="#" class="category_btn">お仕事</a></li>
          <li class="category_10"><a href="#" class="category_btn">お金</a></li>
          <li class="category_11"><a href="#" class="category_btn">住まい</a></li>
        </ul>
      </div>
      
      <!-- 広告枠 -->
      <div class="advertising">
        <div class="ad_box">広告枠</div>
        <div class="ranking">
          <div class="ranking_title">よく見られている質問</div>
          <div class="ranking_post">
            <div class="ranking_post_title">
              タイトル
            </div>
            <div class="ranking_post_category">
              カテゴリー
            </div>
          </div>
        </div>
      </div>
      
      <!-- 投稿一覧 -->
      <div class="main">
        <div class="post_list">
          <h2><span>質問の一覧</span></h2>
          <?php foreach ($params['posts'] as $post) : ?>
            <div class="post_list_top">
              <div class="post_title">
                <a href="show.php?id=<?php echo $post['post_id'] ?>"><?php echo $post['title'] ?></a>
              </div>
              <div class="post_text">
                <p><?php echo mb_substr($post['body'], 0, 100, 'utf8') ?>... <a href="#">続きを見る</a></p>
              </div>
              <div class="post_footer">
                <p class="post_name">
                  <?php echo $post['name'] ?>
                </p>
                <p class="post_time">
                  <?php echo $post['created_at'] ?>
                </p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      
      <!-- フッター -->
      <?php include("_footer.html") ?>
    </div>
    </body>
    
    </html>