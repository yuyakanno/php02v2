<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$link = $_POST["link"];
$comment = $_POST["comment"];



//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  // $pdo = new PDO('mysql:dbname=yk_db;charset=utf8;host=localhost','root','');
  $pdo = new PDO('mysql:dbname=yuyakanno_yk_db;charset=utf8;host=mysql57.yuyakanno.sakura.ne.jp' , 'yuyakanno', '*****');
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(name, link, comment, date) values(:name, :link, :comment, sysdate())");
$stmt -> bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt -> bindValue(':link', $link, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt -> bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  header("Location: list.php");
  exit();

}
?>
