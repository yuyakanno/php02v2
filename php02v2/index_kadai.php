<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍DB</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="list.php">書籍データベースへ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert_kadai.php">
  <div class="jumbotron">
   <fieldset>
    <legend><h2>書籍ブックマーク</h2></legend>
     <label><div>書籍名：</div><input type="text" name="name" required></label><br>
     <label><div>書籍URL：</div><input type="text" name="link" required></label><br>
     <label><div>内容：</div><textArea name="comment" rows="4" cols="40" required></textArea></label><br>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
