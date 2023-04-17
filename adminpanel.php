<?php session_start();
    include "header.php";
    require_once("connection.php");

    $sql = "SELECT * FROM menu";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $snack = $statement->fetchALL(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
  <div class="container">
    <div class="admin-panel">
      <div class="add-button">
        <a href="add.php"><button>Voeg toe</button></a>
      </div>
      <h1 class="title">Admin Panel</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($snack as $menu): ?>
            <tr>
              <td><?= $menu->id ?></td>
              <td><?= $menu->title ?></td>
              <td><?= $menu->omschrijving ?></td>
              <td><?= $menu->prijs ?></td>
              <td>
              <a href="edit.php?id=<?= $menu->id ?>"><button class="edit-button">Edit</button></a>
              <a href="delete.php?id=<?= $menu->id ?>"><button class="delete-button">Delete</button></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</body>
</html>