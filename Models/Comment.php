<?php

require_once(ROOT_PATH . 'Models/Db.php');

class Comment extends Db {

  /**
   * コメントをDBに登録する
   * @param $params
   * @return bool $result
   */
  public function createComment($params)
  {
    $result = false;
    //SQLの準備
    $sql = 'INSERT INTO comments(text, user_id, post_id)
            VALUES (:text, :user_id, :post_id)';
    //SQLの実行
    $this->dbh->beginTransaction(); //トランザクション処理の関数
    try {
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':text', $params['text'], PDO::PARAM_STR);
      $stmt->bindValue(':user_id', $params['user_id'], PDO::PARAM_INT);
      $stmt->bindValue(':post_id', $params['post_id'], PDO::PARAM_INT);
      $stmt->execute();
      //トランザクションコミット
      $this->dbh->commit();
      $result = true;
      return $result;
    } catch (\Exception $e) {
      $this->dbh->rollBack(); //トランザクションロールバック
      exit($e);
    }
  }

  /**
   * 指定のIDから投稿のコメント情報を取得する
   * @param integer $post_id
   * @return Array $result
   */
  public function commentFindByAll($id)
  {
    //SQLの準備
    $sql = 'SELECT c.id, c.user_id, c.text, c.post_id, c.comment_id, u.name
            FROM            posts p
            INNER JOIN      comments c
            ON p.id = c.post_id
            INNER JOIN      users u
            ON u.id = c.user_id
            WHERE c.post_id   =  :id';
    //SQLの実行
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

}
?>