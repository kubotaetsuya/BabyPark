<?php

session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . 'Views/functions.php');

$id = $_GET['id'];
if(!isset($id) === $_SESSION['login_user']['id']){
  exit('IDが不正です。');
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link rel="stylesheet" type="text/css" href="css/mypage.css">
  <title>マイページ</title>
</head>
<body>
  <!-- header -->
  <?php include("_login_header.php") ?>

  <div class="wrapper" id="my_page">
    <div class="my_page_main">
      <div class="my_page_box">
        <div class="my_page_edit_btn">
          <a href="my_page_edit.php?id=<?php echo $id ?>">プロフィールを編集する</a>
        </div>
        <div class="my_page_name">
          <h2><?php echo $_SESSION['login_user']['name'] ?></h2>
        </div>
        <div class="my_page_content">
          <h3>質問数</h3>
          <h3>回答数</h3>
          <h3>いいね</h3>
        </div>
        <div class="my_page_content2">
          <p>0</p>
          <p>0</p>
          <p>0</p>
        </div>
        <div class="my_page_description">
          <p><?php echo $_SESSION['login_user']['description'] ?></p>
        </div>
        <div class="my_page_post_list">
          <h2>ニックネームさんが質問した内容</h2>

        </div>
      </div>
    </div>
  
    <!-- フッター -->
    <?php include("_footer.html") ?>
  </div>
</body>
</html>