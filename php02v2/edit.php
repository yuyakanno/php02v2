<?php 
    require_once("funcs.php");

    // DBに接続する
    if (empty($_GET["id"])) {
      echo "IDを正しく入力してください";
      exit;
    }
    $id = (int)$_GET["id"];
    try {
        // $dbh = new PDO('mysql:dbname=yuyakanno_yk_db;charset=utf8;host=mysql57.yuyakanno.sakura.ne.jp' , 'yuyakanno', '*****');
        $dbh = new PDO('mysql:dbname=yk_db;charset=utf8;host=localhost','root','');
        $sql = "SELECT * FROM gs_bm_table WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute(); 
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;

    }catch (PDOException $e) {
        exit('DBConnection Error:'.$e->getMessage());   
    }
        
        
?>

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


<form method="POST" action="update.php?id=<?= htmlspecialchars($res["id"], ENT_QUOTES) ?>">
        <div class="jumbotron">
            <fieldset>
                <legend><h2>書籍ブックマーク</h2></legend>
                <label><div>書籍名：</div><input type="text" name="name" value="<?=h($res["name"])?>" required></label><br>
                <label><div>書籍URL：</div><input type="text" name="link" value="<?=h($res["link"])?>" required></label><br>
                <label><div>内容：</div><textArea name="comment" rows="4" cols="40" required><?=h($res["comment"])?></textArea></label><br>
                <input type="hidden" name="id" value="<?=$res["id"]?>">
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>

<header>
</header>