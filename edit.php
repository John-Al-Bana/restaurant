<?php
session_start();
require_once("connection.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM menu WHERE id = :id";
  $statement = $conn->prepare($sql);
  $statement->execute(['id' => $id]);
  $menu = $statement->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $sql = "UPDATE menu SET title = :title, omschrijving = :description, prijs = :price WHERE id = :id";
  $statement = $conn->prepare($sql);
  if ($statement->execute(['title' => $title, 'description' => $description, 'price' => $price, 'id' => $id])) {
    header("Location: adminpanel.php");
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="admin-panel">
      <h1 class="title">Edit Menu Item</h1>
      <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $menu->id ?>">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" value="<?= $menu->title ?>" required>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea id="description" name="description" required><?= $menu->omschrijving ?></textarea>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" id="price" name="price" value="<?= $menu->prijs ?>" required>
        </div>
        <button type="submit" name="update">Update</button>
      </form>
    </div>
  </div>
</body>
</html>
