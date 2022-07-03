<?php
include("funcs.php");
sschk();

if (empty($_GET["id"])) {
    echo "idを正しく入力してください";
    exit;
}
try {
    $id = (int)$_GET["id"];
    $dbh = db_conn();

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


?>

