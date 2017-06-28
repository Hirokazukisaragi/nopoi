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

$kakiko = $_POST['source'];
$datakey = $_POST['datakey'];
if($datakey == ""){
    $datakey = "名無し";
}
//サニタイジング
$datakey = htmlspecialchars($datakey,ENT_QUOTES);
$kakiko = htmlspecialchars($kakiko,ENT_QUOTES);
//改行をタグに
$kakiko = nl2br($kakiko);
//書き込み用データベースをオープン
//データベースはデフォルトでは2つ上のdbというディレクトリ
//パスは設置するサーバに合わせて適宜変更してください
$dsn = new PDO('sqlite:../../db/code.db');
//プリペアドステートメント
$stmt = "INSERT INTO code(datakey,source) VALUES (:datakey,:kakiko)";
$sql = $dsn->prepare($stmt);
$sql->bindValue(':kakiko',$kakiko,PDO::PARAM_STR);
$sql->bindValue(':datakey',$datakey,PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
//$sql = $pdo->prepare('INSERT INTO kako VALUES (?)');
//$sql->execute($kakiko);
$dsn = null;
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bbs.css">
    <title>書き込みました</title>
    <meta http-equiv="refresh" content="3;URL=./index.php">
</head>
<body>
<?php
echo $kakiko;
?>
<a href="index.php">が書き込まれました</a><br>
自動的にジャンプしない場合は上記のリンクをクリック
</body>
</html>
