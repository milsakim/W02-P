<?php
    $link = mysqli_connect("localhost", "root", "kimhj0314", "dbp");
    $query = "INSERT INTO book(
      title, author, summary, created_date
    )
    VALUES(
      '{$_POST['title']}',
      '{$_POST['author']}',
      '{$_POST['summary']}',
      now()
    )";

    $result = mysqli_query($link, $query);

    if($result == true) {
      echo '성공했습니다. <p><a href="index.php">돌아가기</a></p>';
    }
    else {
      echo "저장하는 과정에서 문제가 발생했습니다.";
      error_log(mysqli_error($link));
    }
?>
