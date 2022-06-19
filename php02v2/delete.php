<?php 

    require_once("funcs.php");

    // DBに接続する
    if (empty($_GET["id"])) {
      echo "IDを正しく入力してください";
      exit;
    }
    try {
        $id = (int)$_GET["id"];

        //Password:MAMP='root',XAMPP=''
        $dbh = new PDO('mysql:dbname=yuyakanno_yk_db;charset=utf8;host=mysql57.yuyakanno.sakura.ne.jp' , 'yuyakanno', '*******');
        // $dbh = new PDO('mysql:dbname=gs_bm_table;charset=utf8;host=localhost','root','');
        $sql = 'DELETE FROM gs_bm_table WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, "id", PDO::PARAM_INT);
        $stmt->execute();
        $dbh = null;
        echo 'ID: ' . h($id) . 'の削除が完了しました';

      } catch (PDOException $e) {
        exit('DBConnection Error:'.$e->getMessage());
      }

    ?>