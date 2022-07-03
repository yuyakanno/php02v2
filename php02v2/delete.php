<?php 
include("funcs.php");
sschk();

    // DBに接続する
    if (empty($_GET["id"])) {
      echo "IDを正しく入力してください";
      exit;
    }
    try {
        $id = (int)$_GET["id"];

        //Password:MAMP='root',XAMPP=''
        $dbh = db_conn();
        $sql = 'DELETE FROM gs_bm_table WHERE id = ?';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $dbh = null;

        if($stmt==false){
            sql_error($stmt);
          }else{
            redirect("list.php");
          }

      } catch (PDOException $e) {
        exit('DBConnection Error:'.$e->getMessage());
      }

    ?>