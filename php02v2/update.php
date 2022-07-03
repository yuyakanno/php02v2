<?php 

    require_once("funcs.php");

    // DBに接続する
    if (empty($_GET["id"])) {
      echo "IDを正しく入力してください";
      exit;
    }
    $name = $_POST["name"];
    $link = $_POST["link"];
    $comment = $_POST["comment"];
    $id = (int)$_GET["id"];

    try{
        $dbh = db_conn();
        $sql = "UPDATE gs_bm_table SET name = ?, link = ?, comment = ? WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $link, PDO::PARAM_STR);
        $stmt->bindValue(3, $comment, PDO::PARAM_STR);
        $stmt->bindValue(4, $id, PDO::PARAM_INT);
        $stmt -> execute();

        if($stmt==false){
            sql_error($stmt);
        }else{
            redirect("list.php");
        }

        $dbh = null;
        

    }
    catch (PDOException $e) {
    exit('DBConnection Error:'.$e->getMessage());
    }

?>

 