<?php

// ファイルの読み込み
require_once('function.php');
require_once('dbconnect.php');

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// 入力内容の取得
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$content = $_POST['content'];

$stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES (?, ?, ?)'); // VALUES ($nickname, $email, $content)
$stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

// 表示
// echo $nickname . '<br>';
// echo '<br>';
// echo $email . '<br>';
// echo '<br>';
// echo $content . '<br>';
// echo '<br>';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>お問い合わせありがとうございました！</h1>
    <p><?php echo h($nickname); ?></p>
    <p><?php echo h($email); ?></p>
    <p><?php echo h($content); ?></p>
</body>
</html>