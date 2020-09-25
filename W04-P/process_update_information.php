<?php
  $link = mysqli_connect("localhost:3307", "root", "12345678", "dbp");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'album_title' => mysqli_real_escape_string($link, $_POST['album_title']),
    'genre' => mysqli_real_escape_string($link, $_POST['genre'])
  );
  $query = "
    UPDATE information
      SET
        album_title = '{$filtered['album_title']}',
        genre = '{$filtered['genre']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if($result == false) {
    echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    header('Location: information.php?id='.$filtered['id']);
  }
?>
