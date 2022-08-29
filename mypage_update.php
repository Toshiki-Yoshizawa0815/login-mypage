<?php
mb_internal_encoding("utf8");
session_start();

try {
    // DB接続
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;" ,"root" ,"");
} catch(PDOEXception $e) {
        die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>
        しばらくしてから再度ログインをしてください。</p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
}
    
// プリペアードステートメントでSQL文の型を作る(update文)
$stmt = $pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=? where id=?");

// bindValueを使用し、実際に各カラムに何をupdateするかを記述
// values(?,?,?,?,?)に以下4つのbindValueで記述した内容が代入される。
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_POST['id']);
    
// executeでクエリを実行
$stmt->execute();

// プリペアードステートメントでSQL文の型を作る(select文)
$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

// bindValueを使用し、実際にwhere句に何を入れるかを記述
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);

// executeでクエリを実行
$stmt->execute();
$pdo = NULL;

// $_SESSIONに代入
while ($row = $stmt->fetch()) {
    $_SESSION['id']  = $row['id'];
    $_SESSION['name']  = $row['name'];
    $_SESSION['mail']  = $row['mail'];
    $_SESSION['password']  = $row['password'];
    $_SESSION['comments']  = $row['comments'];
    $uploaded_img = $row['picture'];
}

// 画像フォルダ「image」とselect文で取得した「アップロードした画像のファイル名」を繋げて$image_pathに代入
// $image_path = "./image/".$uploaded_img;
$_SESSION['picture'] = "./image/".$uploaded_img;

header('Location:mypage.php');


?>