<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>［書籍DB］ID登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="login_kadai.php">ログイン画面へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="id_insert_kadai.php">
  <div class="jumbotron">
   <fieldset>
    <legend><h2>ID登録</h2></legend>
     <label><div>お名前：</div><input type="text" name="name" required></label><br>
     <label><div>ID：</div><input type="text" name="lid" required></label><br>
     <label><div>PW：</div><input type="password" name="lpw" required></label><br>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
