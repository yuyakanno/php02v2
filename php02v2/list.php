<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍ブックマーク</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:32px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index_kadai.php">書籍登録画面へ</a>
      </div>
    </div>
  </nav>
</header>

<?php

include("funcs.php");

sschk();

try {
    // $dbh = new PDO('mysql:dbname=yuyakanno_yk_db;charset=utf8;host=mysql57.yuyakanno.sakura.ne.jp' , 'yuyakanno', '*****');
    $dbh = new PDO('mysql:dbname=yk_db;charset=utf8;host=localhost','root','');
    $sql = "SELECT * FROM gs_bm_table";
    $stmt = $dbh-> query($sql);
    $res = $stmt-> fetchAll(PDO::FETCH_ASSOC);

 // テーブル表示の記述
    echo "<table border =1>" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo "<th>書籍名</th><th>登録日時</th><th>書評</th><th>EDIT</th><th>DELETE</th>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;

    //書籍名と登録日時のデータ繰り返し表示
      foreach ($res as $row) {
          echo "<tr>" . PHP_EOL;
          echo "<td>" . h($row["name"]) . "</td>" . PHP_EOL;
          echo "<td>" . h($row["date"]) . "</td>" . PHP_EOL;
          echo "<td>" . '<a href="detail.php?id=' . $row["id"] . '">詳細</a>' . "</td>" . PHP_EOL;
          echo "<td>" . '<a href="edit.php?id=' . $row["id"] . '">変更</a>' . "</td>" . PHP_EOL;
          echo "<td>" . '<a href="delete.php?id=' . $row["id"] . '">削除</a>' . "</td>" . PHP_EOL;
          echo "</tr>" . PHP_EOL;
      }

    echo "</table>" . PHP_EOL;

    $dbh =null;

  } catch (PDOException $e){
    exit('DBConnection Error:'.$e->getMessage());

}

?>
