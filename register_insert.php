<?php
mb_internal_encoding("utf8");

try {
// DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;" ,"root" ,"");
} catch(PDOEXception $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>
    しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}

// プリペアードステートメントでSQL文の型を作る
$stmt = $pdo->prepare("insert into login_mypage (name,mail,password,picture,comments)values(?,?,?,?,?)");

// bindValueを使用し、実際に各カラムに何をinsertするかを記述
// values(?,?,?,?,?)に以下5つのbindValueで記述した内容が代入される。
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['path_filename']);
$stmt->bindValue(5,$_POST['comments']);

// executeでクエリを実行
$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');
?>