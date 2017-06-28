<?php
/*
Copyright (C) 2017  Hirokazu Seno

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
 */
//データベースはデフォルトでは2つ上のdbというディレクトリ、設置するサーバに合わせて適宜変更してください
$dsn = new PDO('sqlite:../../db/code.db');

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
<form method="post" action="amausa.php">
    <input type="text" name="clear">
    <button type="submit">クリア</button>
</form>
<!--bbs書き込み時の規約表示用JavaScriptファイル-->
<script src="bbs.js"></script>
<a href="http://free-of-x.com">作者のブログへ行く</a>
</body>
</html>
