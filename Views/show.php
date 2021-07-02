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

$post = new PostController();
$params = $post->show();
$comment = new CommentController();
$comment = $comment->show();
$post = $params['post'];
$user = $_SESSION['login_user']['id'];
// var_dump($comment['comment']);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/show.css">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <title>投稿の詳細ページ</title>
</head>

<body>
  <!-- ヘッダー -->
  <?php include("_login_header.php") ?>
  <div class="wrapper">
    <div class="show_main">
      <div class="show_post_box">
        <div class="show_post_top">
          <div class="show_post_title">
            <p><?php echo $post['title'] ?></p>
          </div>
          <div class="show_post_name">
            <p><?php echo $post['name'] ?>さん</p>
          </div>
          <div class="show_post_time">
            <p><?php echo $post['created_at'] ?></p>
          </div>
        </div>
        <div class="show_post_text">
          <p><?php echo $post['body'] ?></p>
        </div>
      </div>
      <ul class="show_post_tag">
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
        <li><a href="#">ステータス</a></li>
      </ul>
      
      <!-- 投稿したuser_idとログインユーザーのIDが一致したら表示 -->
      <?php if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] === $post['user_id']) {  ?>
        <div class="show_post_create">
          <a href="update.php?id=<?php echo $post['post_id'] ?>">編集</a>
          <a href="delete.php?id=<?php echo $post['post_id'] ?>">削除</a>
        </div>
        <?php } ?>
        
        <div class="comment_main">
          <div class="comment_box">
            <h2>コメント一覧</h2>
            <div class="comment_role">
              <a href="#" class="mammy">ママ</a>
              <a href="#" class="puppy">パパ</a>
            </div>
            <?php foreach ($comment['comment'] as $arr) : ?>
            <div class="comment_list">
              <div class="comment_name">
                <p><?php echo $arr['name'] ?></p>
              </div>
              <div class="comment_body">
                <p><?php echo $arr['text'] ?></p>
              </div>
              <a href="#" class="good_btn">いいね！</a>
            </div>
            <?php endforeach; ?>
            <form action="comment_add.php?id=<?php echo $post['post_id'] ?>" class="comment_form" method="POST">
              <h3 class="comment_post_title">コメントを投稿する</h3>
              <textarea name="text" class="comment_post_body" cols="20" rows="10"></textarea>
              <div class="comment_btn">
                <button type="submit" name="submit" class="comment_submit" value="送信">送信</button>
              </div>
              <input type="hidden" name="user_id" value="<?php echo $user ?>">
              <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
            </form>
          </div>
        </div>
        
        <div class="advertising">
          <p>広告枠</p>
        </div>
        <div class="advertising">
          <p>広告枠</p>
        </div>
      </div>
      
      <!-- フッター -->
      <?php include("_footer.html") ?>
    </div>
  </body>
  
  </html>