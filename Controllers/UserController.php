<?php
require_once(ROOT_PATH . '/Models/User.php');

class UserController {
  private $request; // リクエストパラメーター(GET,POST)
  private $user; //Userモデル

  public function __construct() {
    // リクエストパラメーターの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    // モデルオブジェクトの作成
    $this->User = new User();
  }

  // ログイン時の処理
  public function index($email, $password) {
    $user = new User();
    $user->login($email, $password);
  }

  // 新規ユーザー登録
  public function create($result) {
    $user = new User();
    $user->createUser($result);
  }

  //ユーザー情報の更新
  public function update($params) {
    $user = new User();
    $user->updateUser($params);
  }
}


?>