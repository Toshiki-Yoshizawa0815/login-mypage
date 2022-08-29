<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST['from_mypage'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>

        <main>
        
            <form action="mypage_update.php" method="post" enctype="multipart/form-data">                
                <h2>会員情報</h2>
                <div class="form_hello"><label>こんにちは！ <?php echo $_SESSION['name']; ?> さん</label></div>
                <div class="form_contents">
                    <div class="picture">
                        <img src="<?php echo $_SESSION['picture']; ?>">
                    </div>

                    <div class="name">
                        <label>氏名：<input type="text" class="formbox" size="35" name="name" value="<?php echo $_SESSION['name']; ?>" required></label>
                    </div>

                    <div class="mail">
                        <label>メール：<input type="text" class="formbox" size="35" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail']; ?>" required>                     
                    </div>

                    <div class="password">
                        <label>パスワード：<input type="text" class="formbox" size="35" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password']; ?>" required></label>
                    </div>

                    <div class="comments">
                        <textarea rows="5" cols="80" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
                    </div>
                    
                    <div class="hensyu">
                        <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id">
                    </div>
                </div>
            </form>

        </main>

        <footer>
            © 2018 InterNous.inc. All rights reserved
        </footer>
    </body>
</html>