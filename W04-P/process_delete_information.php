<?php
  $link = mysqli_connect("localhost:3307", "root", "12345678", "dbp");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );
  $query = "
    DELETE
      FROM information
      WHERE id = {$filtered['id']}
  ";

  $result = mysqli_query($link, $query);
  if($result == false) {
    echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    header('Location: information.php');
  }
?>
