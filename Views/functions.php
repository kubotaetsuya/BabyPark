<?php
  /**
   * XSS対策：エスケープ処理
   * 
   * @param string $$ 対象の文字列
   * @return string 処理された文字列
   */
  function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }

  /**
   * CSRF対策
   * @param void  // 引数がない
   * @return string $csrf_token
   */
  function setToken() {
    //トークンを生成
    //フォームからそのトークンを送信
    //送信後の画面でそのトークンを照会
    //トークンを削除

    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
  }

  function validation() {
    //エラーメッセージ
    $err = [];

    // バリデーション
    if(!$name = filter_input(INPUT_POST, 'name')) {
      $err[] = 'ニックネームを記入してください';
    }

    if(!$email = filter_input(INPUT_POST, 'email')) {
      $err[] = 'メールアドレスを記入してください。';
    }

    $password = filter_input(INPUT_POST, 'password');
    //正規表現
    if (!preg_match("/\A[a-z\d]{6,12}+\z/i",$password)) {
      $err[] = 'パスワードは英数字6文字以上12文字以下にしてください。';
    }

    $password_conf = filter_input(INPUT_POST, 'password_conf');
    if($password !== $password_conf) {
      $err[] = '確認用パスワードとことなっています。';
    }

    $sex = filter_input(INPUT_POST, 'sex');
    if($sex === 0 || $sex === 1) {
      $err[] = '続柄を選択してください。';
    }
    
    return $err;
  }
?>