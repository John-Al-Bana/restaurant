<?php 
session_start();
require("connection.php");
include("header.php");

if(isset($_POST['submit_button'])) {
    $title = $_POST["title"];
    $omschrijving = $_POST["omschrijving"];
    $prijs = $_POST["prijs"];

        $sql = "INSERT INTO menu(title, omschrijving, prijs) VALUES(:title, :omschrijving, :prijs)";
        $statement = $conn->prepare($sql);
        $statement->execute([":title" => $title, ":omschrijving" => $omschrijving, ":prijs" => $prijs]);
        header("Location:adminpanel.php");
        exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="add-main">
        <form method="POST" action="add.php" class="add-form">
            Titel: <input type="text" id="title" name="title">
            Omschrijving: <input type="text" id="omschrijving" name="omschrijving">
            Prijs: <input type="text" id="prijs" name="prijs">
            <button type="submit" style="color: black;" class="index-button add2-button" name="submit_button">Submit</button>
        </form>
    </main>
</body>
</html>
