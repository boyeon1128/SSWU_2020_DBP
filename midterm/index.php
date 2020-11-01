<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title> 영화 대여 시스템 </title>
  <style>
  body {
    background: #B9DBF8;
  }
  h1, h2, form {
    text-align: center;
  }

  </style>
</head>

<body>
  <br>
  <br>
  <h1> -- 영화 대여 시스템 -- </h1>
  <br>
  <h2> <a href = "film_information.php"> (1) 전체 영화 정보 </a></h2>
  <h2> <a href = "store_information.php"> (2) 지점 별 각 영화 개수 </a></h2>
  <form action="rental_information.php" method="POST">
      <h2> <a href = rental_information_2.php> (3) 대여 정보 </a>
      <input type="text" name="name" placeholder="name">
      <input type="submit" value="Search"> </h2>
  </form>

</body>

</html>
