<?php
    $link = mysqli_connect('localhost:3307', 'root', '12345678', 'dbp');
    $filtered = array(
        'artist' => mysqli_real_escape_string($link, $_POST['artist']),
        'song_title' => mysqli_real_escape_string($link, $_POST['song_title']),
        'information_id' => mysqli_real_escape_string($link, $_POST['information_id'])
      );
    $query = "
        INSERT INTO playlist
            (artist, song_title, created, information_id)
            VALUES(
                '{$filtered['artist']}',
                '{$filtered['song_title']}',
                NOW(),
                '{$filtered['information_id']}'
                )
    ";

    $result = mysqli_multi_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }
