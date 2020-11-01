<?php
  $link = mysqli_connect('localhost:3307', 'root', '12345678', 'sakila');

  $query = "
    SELECT title, release_year, name, actor_id
    FROM film
    INNER JOIN film_actor ON film_actor.film_id = film.film_id
    INNER JOIN language ON language.language_id = film.language_id
";

$result = mysqli_query($link, $query);
  $article = '';
  while ($row = mysqli_fetch_array($result)) {
      $article .= '<tr><td>';
      $article .= $row['title'];
      $article .= '</td><td>';
      $article .= $row['release_year'];
      $article .= '</td><td>';
      $article .= $row['name'];
      $article .= '</td><td>';
      $article .= $row['actor_id'];
      $article .= '</td><tr>';
  }

  mysqli_free_result($result);
  mysqli_close($link);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset = "utf-8">
   <title> 영화 정보 </title>
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
   <h2><a href = "index.php"> -- 영화 대여 시스템 -- </a> | 전체 영화 정보</h2>
</form> <br>
   <table>
               <tr>
                   <th>제목</th>
                   <th>발매 연도</th>
                   <th>언어</th>
                   <th>배우 ID</th>
               </tr>
               <?= $article ?>
           </table>
 </body>
 </html>
