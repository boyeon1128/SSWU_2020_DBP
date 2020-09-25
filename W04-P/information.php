<?php
  $link = mysqli_connect('localhost:3307', 'root', '12345678', 'dbp');

  $query= "SELECT * FROM information";
  $result = mysqli_query($link, $query);
  $music_info = '';

  while ($row = mysqli_fetch_array($result)) {
    $filtered = array (
      'id' => htmlspecialchars($row['id']),
      'album_title' => htmlspecialchars($row['album_title']),
      'genre' => htmlspecialchars($row['genre'])
    );

    $music_info .= '<tr>';
    $music_info .= '<td>'.$filtered['id'].'</td>';
    $music_info .= '<td>'.$filtered['album_title'].'</td>';
    $music_info .= '<td>'.$filtered['genre'].'</td>';
    $music_info .= '<td><a href="information.php?id='.$filtered['id'].'">update</a></td>';
    $music_info .= '
      <td>
        <form action="process_delete_information.php" method="post">
          <input type = "hidden" name="id" value="'.$filtered['id'].'">
          <input type = "submit" value="delete">
          </form>
      </td>';
    $music_info .= '</tr>';
  };

  $escaped = array(
    'album_title' => '',
    'genre' => ''
  );

  $label_submit = 'Create information';
  $form_action = 'process_create_information.php';
  $form_id = '';

  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM information WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['album_title'] = htmlspecialchars($row['album_title']);
    $escaped['genre'] = htmlspecialchars($row['genre']);

    $form_action = 'process_update_information.php';
    $label_submit = 'Update information';
    $form_id = '<input type = "hidden" name="id" value="'.$_GET['id'].'">';
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
  <p><a href="index.php">playlist</a></p>

  <table border="1">
    <tr>
      <th>id</th>
      <th>album_title</th>
      <th>genre</th>
      <th>update</th>
      <th>delete</th>
    </tr>
    <?= $music_info ?>
  </table>
  <br>
  <form action="<?= $form_action ?>" method="post">
    <?= $form_id ?>
    <label for="fname">Album title:</label><br>
    <input type="text" id="album_title" name="album_title" placeholder="album title"
    value="<?=$escaped['album_title']?>"><br>
    <label for="lname">Genre:</label><br>
    <input type="text" id="genre" name="genre" placeholder="genre"
    value="<?=$escaped['genre']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
  </form>

</body>
</html>
