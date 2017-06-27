<?php
//データベースはデフォルトでは2つ上のdbというディレクトリ、設置するサーバに合わせて適宜変更してください

$datakey = $_POST['datakey'];
$dsn = new PDO('sqlite:../../db/code.db');
//過去ログの読み出し
$stmt = $dsn->prepare("SELECT source FROM code WHERE datakey = ?");
//$sql->bindValue(':datakey',$datakey,PDO::PARAM_STR);
$stmt->bindValue(1,$datakey, PDO::PARAM_STR);
$stmt->execute();
$com = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo $com;
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
    foreach ($com as $kaki):?>
        <?php
        echo $kaki['source'];
        ?>
        <br>
    <?php endforeach;?>
</div>
<!--bbs書き込み時の規約表示用JavaScriptファイル-->
<script src="bbs.js"></script>
</body>
</html>
