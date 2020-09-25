<?php
  $link = mysqli_connect('localhost:3307', 'root', '12345678', 'dbp');
  $query = "SELECT * FROM playlist";
  $result = mysqli_query($link, $query);
  $list ='';
  while($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['song_title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  }

$article = array (
  'artist' => 'Welcome to my playlist',
  'song_title' => 'song is ...'
);

$update_link = '';
$delete_link = '';
$information = '';

if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
  $query = "SELECT * FROM playlist LEFT JOIN information
  ON playlist.information_id = information.id WHERE playlist.id={$filtered_id}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article['artist'] = htmlspecialchars($row['artist']);
  $article['song_title'] = htmlspecialchars($row['song_title']);
  $article['album_title'] = htmlspecialchars($row['album_title']);

  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
  <form action="process_delete.php" method="POST">
    <input type="hidden" name="id" value="'.$_GET['id'].'">
    <input type="submit" value="delete">
  </form>
  ';

  $information = "<p> {$article['album_title']} </p>";
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
  <a href = "information.php">information</a>
  <ol> <?= $list ?> </ol>
  <a href="create.php">create</a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2> <?= $article['artist'] ?> </h2>
  <?= $article['song_title'] ?>
  <?= $information ?>
</body>
</html>
