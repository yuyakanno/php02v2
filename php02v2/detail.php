<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍詳細</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:32px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
</header>

<?php
require_once("funcs.php");


if (empty($_GET["id"])) {
    echo "idを正しく入力してください";
    exit;
}
try {
    $id = (int)$_GET["id"];
    $dbh = new PDO('mysql:dbname=yuyakanno_yk_db;charset=utf8;host=mysql57.yuyakanno.sakura.ne.jp' , 'yuyakanno', '*******');
    // $dbh = new PDO('mysql:dbname=gs_bm_table;charset=utf8;host=localhost','root','');

    $sql = "SELECT * FROM gs_bm_table WHERE id = ?";
    $stmt = $dbh-> prepare($sql);
    $stmt -> bindValue(1, $id, PDO::PARAM_INT);
    $stmt -> execute();
    $res = $stmt -> fetch(PDO::FETCH_ASSOC);

        echo "No." . $res["id"] . "<br>" . PHP_EOL;
        echo "登録日時：" . $res["date"] . "<br>" . PHP_EOL;
        echo "書籍名：" . h($res["name"]) . "<br>" . PHP_EOL;
        echo "URL：" . h($res["link"]) . "<br>" . PHP_EOL;
        echo "書評：" . h($res["comment"]) . "<br>" . PHP_EOL;


    $dbh = null;


} catch (PDOException $e){
    exit('DBConnection Error:'.$e->getMessage());
}