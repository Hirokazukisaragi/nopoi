<?php


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
