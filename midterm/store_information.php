<?php
  $link = mysqli_connect('localhost:3307', 'root', '12345678', 'sakila');

  $query = "
    SELECT store.store_id, film.title, count(*)
    FROM inventory
    INNER JOIN store ON store.store_id = inventory.store_id
    INNER JOIN film ON film.film_id = inventory.film_id
    GROUP BY store.store_id, film.title
";

$result = mysqli_query($link, $query);
  $article = '';
  while ($row = mysqli_fetch_array($result)) {
      $article .= '<tr><td>';
      $article .= $row['store_id'];
      $article .= '</td><td>';
      $article .= $row['title'];
      $article .= '</td><td>';
      $article .= $row['count(*)'];
      $article .= '</td><tr>';
  }

  mysqli_free_result($result);
  mysqli_close($link);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset = "utf-8">
   <title> 지점 별 각 영화 개수</title>
   <style>
   body {
     background: #B9DBF8;
   }
   h2 {
     text-align: center;
   }
   th, td {
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
   <h2><a href = "index.php"> -- 영화 대여 시스템 -- </a> | 지점 별 각 영화 개수</h2>
   <form action="store_information_2.php" method="POST">
    <input type="text" name= "title"  placeholder="title">
    <input type="submit" value="Search">
</form> <br>

   <table>
               <tr>
                   <th>지점 ID</th>
                   <th>영화 제목</th>
                   <th>개수</th>
               </tr>
               <?= $article ?>
           </table>
 </body>
 </html>
