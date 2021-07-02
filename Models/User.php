<?php

require_once(ROOT_PATH . '/Models/Db.php');

class User extends Db {

  /**
  * 登録する
  * @param string $email 
  * @param string $password
  * @return bool $result
  */ 
  public function createUser($params) {
    $sql = 'INSERT INTO users (name, email, password, sex) VALUES(:name, :email, :password, :sex)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':name', $params['name'], PDO::PARAM_STR);
    $sth->bindValue(':email', $params['email'], PDO::PARAM_STR);
    $sth->bindValue(':password', password_hash($params['password'],PASSWORD_DEFAULT));
    $sth->bindValue(':sex', $params['sex']);
    $result = $sth->execute();
    return $result;
  }
  
  /**
   * ログイン処理
   * @param string $email
   * @param string $password
   * @return bool $result
   */
  public function login($email, $password) {
    // 結果
    $result = false;
    // ユーザーをemailから検索して取得
    $user = $this->getUserEmail($email);
    // メールアドレスが一致しない場合
    if (!$user) {
      $_SESSION['msg'] = 'メールアドレスが一致しません。';
      return $result;
    }

    // パスワードの照会
    if(password_verify($password, $user['password'])) {
      // 古いセッションを破棄して新しいセッションを作り直す
      session_regenerate_id(true);      // セッションハイジャック対策
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    }
    // パスワードが一致しない場合
    $_SESSION['msg'] = 'パスワードが一致しません。';
    return $result;
  }

  /**
   * emailからユーザーを取得
   * @param string $email
   * @return bool $user|false
   */
  public function getUserEmail($email) {
    //SQLの準備
    $sql = 'SELECT * FROM users WHERE email = :email';
    //SQLの実行
    try{
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':email', $email, PDO::PARAM_STR);
      $sth->execute();
      //SQLの結果を返す
      $user = $sth->fetch(PDO::FETCH_ASSOC);
      return $user;
    }catch (\Exception $e ){
      return false;
    }
  }

  /**
   * ログインチェック
   * @param  void
   * @return bool $result
   */ 
  public static function checkLogin() {
    $result = false;
    // セッションにログインユーザーが入っていなかったらfalse
    if(isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
      return $result = true;
    }
    return $result;
  }

  /**
   * ログアウト処理
   */
  public function logout(){
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
  }

  /**
  * プロフィールを更新する
  * @param Array $params
  * @return  リダイレクト
  */ 
  public function updateUser($params) {
    $sql = 'UPDATE users SET
          name = :name, description = :description, birthplace = :birthplace
          WHERE id = :id';
    $this->dbh->beginTransaction();
    try{
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':name', $params['name'], PDO::PARAM_STR);
      $sth->bindValue(':description', nl2br($params['description']), PDO::PARAM_STR);
      $sth->bindValue(':birthplace', $params['birthplace'],PDO::PARAM_INT);
      $sth->bindValue(':id', $params['id'],PDO::PARAM_INT);
      $result = $sth->execute();
      $this->dbh->commit();
      //リダイレクト
      header('Location:index.php');
    } catch(Exception $e) {
      $this->dbh->rollBack();
    }
  }
}
?>