  <header>
    <div class="sub_wrapper">
      <div class="no_member_contact">
        <nav class="motion">
          <div class="logo"><a href="index.php"><img src="img/logo.png" alt="BabyPark"></a>
          </div>
      
          <div class="search_nav">
            <form action="#" method="GET" class="search_container">
              <input type="text" name="search" size="25" placeholder="キーワードを入力">
              <input type="submit" name="search" value="検索">
            </form>
          </div>
    
          <div class="sign_box">
            <div class="header_post">
              <a href="edit.php">質問する</a>
            </div>
            <div class="header_my_page">
              <a href="my_page.php?id=<?php echo $_SESSION['login_user']['id'] ?>">マイページ</a>
            </div>
            <div class="header_logout">
              <form action="logout.php" method="POST">
                <input type="submit" name="logout" value="ログアウト">
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>