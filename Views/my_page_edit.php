<?php

session_start();
ini_set('display_errors', "On");
require_once(ROOT_PATH . '/Models/User.php');
require_once(ROOT_PATH . '/Models/Post.php');
require_once(ROOT_PATH . '/Controllers/UserController.php');
require_once(ROOT_PATH . '/Controllers/PostController.php');
require_once(ROOT_PATH . 'Views/functions.php');

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link rel="stylesheet" type="text/css" href="css/mypage_edit.css">
  <title>マイページ編集</title>
</head>
<body>

<?php include("_login_header.php") ?>
<div class="wrapper">
  <div class="my_page_edit_main">
    <h2>プロフィールを編集する</h2>
    <div class="my_page_edit_description">
      <form action="my_page_comp.php" method="POST">
        <dl>
          <dt><label for="name">ニックネーム</label></dt>
          <dd><input type="text" name="name" value="<?php echo $_SESSION['login_user']['name'] ?>"></dd>
        </dl>
        <dl>
          <dt><label for="">自己紹介</label></dt>
          <dd><textarea name="description" cols="20" rows="10"><?php echo $_SESSION['login_user']['description'] ?></textarea></dd>
        </dl>
        <dl>
          <dt><label for="">出身地</label></dt>
          <dd>
            <select name="birthplace" id="">
              <option value="">選択してください</option>
              <option value="01">北海道</option>
              <option value="02">青森県</option>
              <option value="03">岩手県</option>
              <option value="04">宮城県</option>
              <option value="05">秋田県</option>
              <option value="06">山形県</option>
              <option value="07">福島県</option>
              <option value="08">茨城県</option>
              <option value="09">栃木県</option>
              <option value="10">群馬県</option>
              <option value="11">埼玉県</option>
              <option value="12">千葉県</option>
              <option value="13">東京都</option>
              <option value="14">神奈川県</option>
              <option value="15">新潟県</option>
              <option value="16">富山県</option>
              <option value="17">石川県</option>
              <option value="18">福井県</option>
              <option value="19">山梨県</option>
              <option value="20">長野県</option>
              <option value="21">岐阜県</option>
              <option value="22">静岡県</option>
              <option value="23">愛知県</option>
              <option value="24">三重県</option>
              <option value="25">滋賀県</option>
              <option value="26">京都府</option>
              <option value="27">大阪府</option>
              <option value="28">兵庫県</option>
              <option value="29">奈良県</option>
              <option value="30">和歌山県</option>
              <option value="31">鳥取県</option>
              <option value="32">島根県</option>
              <option value="33">岡山県</option>
              <option value="34">広島県</option>
              <option value="35">山口県</option>
              <option value="36">徳島県</option>
              <option value="37">香川県</option>
              <option value="38">愛媛県</option>
              <option value="39">高知県</option>
              <option value="40">福岡県</option>
              <option value="41">佐賀県</option>
              <option value="42">長崎県</option>
              <option value="43">熊本県</option>
              <option value="44">大分県</option>
              <option value="45">宮崎県</option>
              <option value="46">鹿児島県</option>
              <option value="47">沖縄県</option>
            </select>
          </dd>
        </dl>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" value="送信">更新する</button>
      </form>
    </div>
  </div>
  <!-- フッター -->
  <?php include("_footer.html") ?>
</div>
</body>
</html>