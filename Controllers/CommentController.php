<?php

require_once(ROOT_PATH . '/Models/Comment.php');

class CommentController {
  private $request; // リクエストパラメーター(GET,POST)
  private $comment; //Userモデル

  public function __construct() {
    // リクエストパラメーターの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    // モデルオブジェクトの作成
    $this->Comment = new Comment();
  }

  public function create($params) {
    $comment = new Comment();
    $comment->createComment($params);
  }

  public function show() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }

    $comment = $this->Comment->commentFindByAll($this->request['get']['id']);
    $comment = [
      'comment' => $comment
    ];
    return $comment;
  }
}
?>