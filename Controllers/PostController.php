<?php
require_once(ROOT_PATH . '/Models/Post.php');

class PostController {
  private $request; // リクエストパラメーター(GET,POST)
  private $post; //Userモデル

  public function __construct() {
    // リクエストパラメーターの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    // モデルオブジェクトの作成
    $this->Post = new Post();
  }

  // 投稿一覧
  public function index() {
    $page = 0;
    if(isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }

    $result = $this->Post->getPostAll($page);
    $post_count = $this->Post->countALL();
    $params = [
      'posts' => $result,
      'pages' => $post_count / 10
    ];
    return $params;
  }

  // 新規投稿機能
  public function create($params) {
    $post = new Post();
    $post->createPost($params);
  }

  // 投稿詳細機能
  public function show() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }

    $post = $this->Post->postFindById($this->request['get']['id']);
    $params = [
      'post' => $post
    ];
    return $params;
  }

  // 投稿の編集機能
  public function update($params) {
    $post = new Post();
    $post->updatePost($params);
  }

  // 投稿の削除機能
  public function delete($id) {
    $post = new Post();
    $post->deletePost($id);
  }

}


?>