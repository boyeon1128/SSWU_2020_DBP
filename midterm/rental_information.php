<?php
    $link = mysqli_connect("localhost:3307", "root", "12345678", "sakila");

    if(isset($_POST['name'])) {
      $filtered = mysqli_real_escape_string($link, $_POST['name']);
    }
    else {
      $filtered = mysqli_real_escape_string($link, $_GET['name']);
    }

    $query = "
      SELECT rental_id, first_name, last_name, rental_date, return_date
      FROM customer
      INNER JOIN rental ON rental.customer_id = customer.customer_id
      WHERE first_name = '{$filtered}'
    ";

    $result = mysqli_query($link, $query);
    $rental_info = '';


    while($row = mysqli_fetch_array($result)) {
            $rental_info .= '<tr>';
            $rental_info .= '<td>'.$row['rental_id'].'</td>';
            $rental_info .= '<td>'.$row['first_name'].'</td>';
            $rental_info .= '<td>'.$row['last_name'].'</td>';
            $rental_info .= '<td>'.$row['rental_date'].'</td>';
            $rental_info .= '<td>'.$row['return_date'].'</td>';
            $rental_info .= '</tr>';
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 대여 정보 </title>
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
    <h2><a href="index.php"> -- 영화 대여 시스템 -- </a> | 대여 정보</h2>

    <table>
        <tr>
          <th>대여 ID</th>
          <th>이름</th>
          <th>성</th>
          <th>대여 날짜</th>
          <th>반납 날짜</th>
        </tr>
        <?=$rental_info?>
    </table>

</body>

</html>
