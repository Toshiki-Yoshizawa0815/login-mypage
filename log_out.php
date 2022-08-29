<?php

session_start();

// destoryすることですべてのセッションを削除(無効化)できる。
session_destroy();

header('Location:login.php');
?>