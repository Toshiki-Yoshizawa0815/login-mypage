<?php
// ログイン状態でログインページにアクセスするとマイページへリダイレクト
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン画面</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <form action="mypage.php" method="post">
                <div class="form_contents">
                    <div class="error">
                        <label>メールアドレスまたはパスワードが間違っています。</label>
                    </div>

                    <div class="mail">
                        <label>メールアドレス</label><br>
                            <input type="text" class="formbox" size="50" value="" name="mail" required>
                    </div>

                    <div class="password">
                        <label>パスワード</label><br>
                            <input type="text" class="formbox" size="50" value="" name="password" required>
                    </div>

                    <div class="check">
                    <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep">ログイン状態を保持する</label>
                    </div>

                    <div class="login_button">
                        <input type="submit" class="submit_button" size="35" value="ログイン">
                    </div>
                </div>
            </form>
        </main>

        <footer>
            © 2018 InterNous.inc. All rights reserved
        </footer>
    </body>
</html>