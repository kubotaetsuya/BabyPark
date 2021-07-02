<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/base.css">
  <link rel="stylesheet" type="text/css" href="../public/css/sns_new.css">
  <title>ソーシャルアカウントで登録</title>
</head>
<body>

    <!-- header -->
    <?php include("header.html") ?>

  <div class="wrapper">
    <div class="main" id="sns_new">
      <div class="sns_new_title">
        <h2>ソーシャルアカウントで登録</h2>
      </div>
      <div class="sns_new_body">
        <p>SNSのアカウント登録が完了しました。下記ステータスを選択してください。</p>
        <form action="#" method="post">
          <dl>
            <dt><label for="sex">続柄</label></dt>
            <dd>
              <input type="radio" name="sex" value="0">パパ
              <input type="radio" name="sex" value="1">ママ
            </dd>
          </dl>
          <button type="submit" name="submit" value="" class="sns_new_submit">登録する</button>
        </form>
      </div>
    </div>
  </div>
  <!-- フッター -->
  <?php include("footer.html") ?>
</body>
</html>