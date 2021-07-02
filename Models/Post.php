<?php

require_once(ROOT_PATH . 'Models/Db.php');

class Post extends Db {

  /**
   * 投稿をすべて取得する
   * @param void
   * @return $result
   */
  public function getPostAll($page = 0): array
  {
    //SQLの準備
    $sql = 'SELECT p.id AS post_id,  p.user_id, p.title, p.body, p.category, p.created_at,u.name
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id';
    $sql .= ' LIMIT 10 OFFSET ' . (10 * $page);
    //SQLの実行
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();
    //SQLの結果を返す 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * 投稿の全データ数を取得
   * @return Int $count
   */
  public function countALL(): Int
  {
    $sql = 'SELECT count(*) as count FROM posts';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
  }

  /**
   * 質問をDBに登録する
   * @param $params
   * @return void
   */
  public function createPost($params)
  {
    //SQLの準備
    $sql = 'INSERT INTO posts(title, body, category, user_id)
            VALUES (:title, :body, :category, :user_id)';
    //SQLの実行

    $this->dbh->beginTransaction(); //トランザクション処理の関数
    try {
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':title', $params['title'], PDO::PARAM_STR);
      $stmt->bindValue(':body', nl2br($params['body']), PDO::PARAM_STR);
      $stmt->bindValue(':category', $params['category'], PDO::PARAM_INT);
      $stmt->bindValue(':user_id', $params['user_id'], PDO::PARAM_INT);
      $stmt->execute();
      //トランザクションコミット
      $this->dbh->commit();
    } catch (\Exception $e) {
      $this->dbh->rollBack(); //トランザクションロールバック
      exit($e);
    }
  }

  /**
   * 指定のIDから投稿の詳細情報を取得する
   * @param integer $post_id
   * @return Array $result
   */
  public function postFindById($id = 0): array
  {
    //SQLの準備
    $sql = 'SELECT p.id AS  post_id,  p.user_id, p.title, p.body, p.category, p.created_at,u.name
            FROM            posts p
            INNER JOIN      users u
            ON p.user_id = u.id
            WHERE p.id   =  :id';
    //SQLの実行
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * 指定のIDに紐づく投稿の編集
   * @param Array $params
   * @return bool false
   */
    public function updatePost($params)
    {
      $sql = 'UPDATE posts
                SET title = :title, body = :body, category = :category
                WHERE id = :id';
      $this->dbh->beginTransaction();
      try {
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':title', $params['title'], PDO::PARAM_STR);
        $sth->bindValue(':body', $params['body'], PDO::PARAM_STR);
        $sth->bindValue(':category', $params['category'], PDO::PARAM_STR);
        $sth->bindValue(':id', $params['post_id'], PDO::PARAM_INT);
        $sth->execute();
        $this->dbh->commit();
      } catch (PDOException $e) {
        $this->dbh->rollBack();
        exit($e);
      }
    }


  /**
   * 投稿データの削除
   * @param $id 
   * @return bool リダイレクト
   */
  public function deletePost($id) {
    if (empty($id)) {
      exit('IDが不正です。');
    }

    $this->dbh->beginTransaction();
    try{
      //SQLの準備
      $stmt = $this->dbh->prepare('DELETE FROM posts Where id = :id');
      $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
      //SQL実行
      $stmt->execute();
      //トランザクションコミット
      $this->dbh->commit();
      //リダイレクト
      header('Location:index.php');
    }catch(\PDOException $e) {
      $this->dbh->rollBack();//トランザクションロールバック
      exit($e);
    }
  }
}