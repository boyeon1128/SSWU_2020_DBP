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

$update_link = '';
$delete_link = '';

if(isset($_GET['id'])) {
  $query = "SELECT * FROM playlist WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'artist' => $row['artist'],
    'song_title' => $row['song_title']
  );
  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
  <form action="process_delete.php" method="POST">
    <input type="hidden" name="id" value="'.$_GET['id'].'">
    <input type="submit" value="delete">
  </form>
  ';
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
  <a href="create.php">create</a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2> <?= $article['artist'] ?> </h2>
  <?= $article['song_title'] ?>
</body>
</html>
