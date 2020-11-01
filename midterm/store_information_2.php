<?php
    $link = mysqli_connect("localhost:3307", "root", "12345678", "sakila");

    if(isset($_POST['title'])) {
      $filtered = mysqli_real_escape_string($link, $_POST['title']);
    }
    else {
      $filtered = mysqli_real_escape_string($link, $_GET['title']);
    }

    $query = "
    SELECT store.store_id, film.title, count(*)
    FROM inventory
    INNER JOIN store ON store.store_id = inventory.store_id
    INNER JOIN film ON film.film_id = inventory.film_id
    GROUP BY store.store_id, film.title
    HAVING film.title = '{$filtered}'
    ";

    $result = mysqli_query($link, $query);
    $store_info = '';


    while($row = mysqli_fetch_array($result)) {
            $store_info .= '<tr>';
            $store_info .= '<td>'.$row['store_id'].'</td>';
            $store_info .= '<td>'.$row['title'].'</td>';
            $store_info .= '<td>'.$row['count(*)'].'</td>';
            $store_info .= '</tr>';
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 지점 별 각 영화 개수 </title>
    <style>
    body {
      background: #B9DBF8;
    }
    h2 {
      text-align: center;
    }
    th, td, tr {
      text-align: center;
      font-family: 12px, Georgia;
      padding: 10px;
      border-bottom: 1px dashed;
    }
    table {
      width: 80%;
      margin: auto;
    }
    form {
      text-align: center;
    }

    </style>
</head>

<body>
    <h2><a href="index.php"> -- 영화 대여 시스템 -- </a> | 지점 별 각 영화 개수</h2>

    <table>
        <tr>
          <th>지점 ID</th>
          <th>영화 제목</th>
          <th>개수</th>
        </tr>
        <?=$store_info?>
    </table>

    <br>
    <a href="store_information.php"> 돌아가기 </a><br>
</body>

</html>
