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

$datakey = $_POST['datakey'];
$dsn = new PDO('sqlite:../../db/code.db');

//過去ログの読み出し
if($datakey != "") {
    $stmt = $dsn->prepare("SELECT source FROM code WHERE datakey = ?");
//$sql->bindValue(':datakey',$datakey,PDO::PARAM_STR);
    $stmt->bindValue(1, $datakey, PDO::PARAM_STR);
    $stmt->execute();
    $com = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo $com;
}
$dsn = null;
?>

<html>
<header>
    <title>rabbit</title>
    <link rel="stylesheet" type="text/css" href="bbs.css">
</header>
<body>
<div class="allView">
    <?php
    //書き込みを表示
    if($datakey != ""){foreach ($com as $kaki) {
        echo $kaki['source'];
    } }?>
</div>
<!--bbs書き込み時の規約表示用JavaScriptファイル-->
<script src="bbs.js"></script>
</body>
</html>
