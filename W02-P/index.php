<?php
    $link = mysqli_connect("localhost", "root", "kimhj0314", "dbp");
    $query = "SELECT * FROM book";
    $result = mysqli_query($link, $query);
    $list = '';

    while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row["id"]}\">{$row["title"]}</a></li>";
    }

    $article = array(
      'title'=>'Welcome',
      'author'=>'',
      'summary'=>'Book is...'
    );

    if (isset($_GET['id'])) {
      $query = "SELECT * FROM book WHERE id={$_GET["id"]}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
        'title'=>$row["title"],
        'author'=>$row["author"],
        'summary'=>$row["summary"]
      );
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BOOK</title>
    <style>
    p {
      color: orange;
      font-style: italic;
    }
    </style>
  </head>
  <body>
    <body>
      <h1><a href="index.php">Books</a></h1>
      <ol>
        <?=$list?>
      </ol>
      <a href="create.php">책 추가하기</a>
      <h2><?="<".$article["title"].">"?></h2>
      <?="<p>".$article["author"]."</p>"?>
      <?=$article["summary"]?>
    </body>
  </body>
</html>
