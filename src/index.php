<?php
//データベースはデフォルトでは2つ上のdbというディレクトリ、設置するサーバに合わせて適宜変更してください
$dsn = new PDO('sqlite:../../db/code.db');
/*
 * データベースファイルが存在しなければ作成
 * プライマリキーは書き込み時にインクリメント
 */
$stmt = "CREATE TABLE IF NOT EXISTS code(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        datakey VARCHAR(128),
        source VARCHAR(128));";
$log = $dsn->prepare($stmt);
$log->execute();
$sqlcom = $dsn->prepare("SELECT datakey FROM code WHERE source");
$sqlcom->execute();
$com = $sqlcom->fetchAll(PDO::FETCH_ASSOC);
//echo $com;
$dsn = null;
?>

<!DOCTYPE html>
<html>
<header>
    <title>rabbit</title>
    <link rel="stylesheet" type="text/css" href="bbs.css">
</header>
<body>
<div class="allView">
    <?php
    //書き込みを表示
    foreach ($com as $kaki):?>
        <?php
        echo $kaki['source'];
        ?>
        <br>
    <?php endforeach;?>
    <!-- bbs.jsで送信時の規約同意の確認-->
    <form method="post" action="cafe.php" onsubmit="return conf()">
        <p>ID</p>
        <input type="text" name="datakey">
        <p>書き込み</p>
        <textarea cols="80" rows="20" name="source"></textarea>
        <button type="submit">書き込む</button>
    </form>
</div>
<form method="post" action="rabbit.php">
    <input type="text" name="datakey">
    <button type="submit">読み込む</button>
</form>
<!--bbs書き込み時の規約表示用JavaScriptファイル-->
<script src="bbs.js"></script>
</body>
</html>
