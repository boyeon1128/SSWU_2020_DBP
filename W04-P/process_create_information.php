<?php
    $link = mysqli_connect('localhost:3307', 'root', '12345678', 'dbp');

    $filtered = array(
      'album_title' => mysqli_real_escape_string($link, $_POST['album_title']),
      'genre' => mysqli_real_escape_string($link, $_POST['genre'])
    );
    $query = "
        INSERT INTO information
            (album_title, genre)
            VALUES(
                '{$filtered['album_title']}',
                '{$filtered['genre']}'
            )
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: information.php');
    }
