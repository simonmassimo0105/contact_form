<?php

// ファイルの読み込み
require_once('function.php');

// echo '<pre>';
// var_dump($_SERVER['REQUEST_METHOD']);
// exit;

// POST送信ではなかったら、index.phpにリダイレクトする
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// 入力内容を取得
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$content = $_POST['content'];

// 入力内容のチェック
if ($nickname == '') {
    $nickname_result = 'ニックネームが入力されていません。';
} else {
    $nickname_result = 'ようこそ、' . $nickname .'様';
}

if ($email == '') {
    $email_result = 'メールアドレスが入力されていません。';
} else {
    $email_result = 'メールアドレス：' . $email;
}

if ($content == '') {
    $content_result =  'お問い合わせ内容が入力されていません。';
} else {
    $content_result = 'お問い合わせ内容：' . $content;
}

    // // ニックネーム
    // $nickname = $_POST['nickname'];
    // echo $nickname . '<br>';
    // echo '<br>';

    // // メールアドレス
    // $email = $_POST['email'];
    // echo $email . '<br>';
    // echo '<br>';

    // // お問い合わせ
    // $content = $_POST['content'];
    // echo $content . '<br>';
    // echo '<br>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>入力内容確認</h1>
    <!-- 画面に表示 -->
    <p><?php echo h($nickname_result); ?></p>
    <p><?php echo h($email_result); ?></p>
    <p><?php echo h($content_result); ?></p>
    <form method="POST" action="thanks.php">
        <input type="hidden" name='nickname' value="<?= h($nickname) ?>">
        <input type="hidden" name='email' value="<?= h($email) ?>">
        <input type="hidden" name='content' value="<?= h($content) ?>">
        <button type="button" onclick="history.back()">戻る</button>
        <?php if ($nickname != '' && $email != '' && $content != '') : ?>
            <input type="submit" value="OK">
        <?php endif; ?>
    </form>
</body>
</html>