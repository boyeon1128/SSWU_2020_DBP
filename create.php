<?php
  $link = mysqli_connect('localhost:3307', 'root', '12345678', 'dbp');
  $query = "SELECT * FROM playlist";
  $result = mysqli_query($link, $query);
  $list ='';
  while($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['song_title']}</a></li>";
  }

$article = array (
  'artist' => 'Welcome to my playlist',
  'song_title' => 'song is ...'
);

if(isset($_GET['id'])) {
  $query = "SELECT * FROM playlist WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'artist' => $row['artist'],
    'song_title' => $row['song_title']
  );
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> PLAYLIST </title>
</head>
<body>
  <h1><a href="index.php">PLAYLIST</a></h1>
  <ol> <?= $list ?> </ol>
  <form action="process_create.php" method="POST">
    <p><input type="text" name="artist" placeholder="Please enter an artist"</p>
    <p><textarea name="song_title" placeholder="Please enter a song title"></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>
