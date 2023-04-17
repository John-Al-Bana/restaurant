<?php 
    require_once("connection.php");

    if (isset($_POST['zoekveld']) && !empty($_POST['zoekveld'])) {
        $zoekveld = $_POST['zoekveld'];
        $stmt = $conn->prepare("SELECT * FROM `menu` WHERE `title` LIKE ?");
        $stmt->execute(["%$zoekveld%"]);
    } else {
        // Set $stmt to a default value when the form is not submitted
        $stmt = $conn->query("SELECT * FROM `menu`");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De chemist</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
    include("header.php");
?>

<main>

    <form class="search-bar-con" method="POST">
        <input class="search-bar" name="zoekveld" type="text" placeholder="Zoek uw gerecht..">
        <button class="index-button search-button" name="sub-but" type="submit">Zoek</button>
    </form>

    <?php if (isset($stmt)): ?>
        <?php while($row = $stmt->fetch()): ?>
            <div class="box-con">
                <div class="box">
                    <div class="titel"><h1><?php echo $row["title"] ?></h1></div>
                    <div class="omschrijving"><p><?php echo $row["omschrijving"] ?></p></div>
                    <div class="prijs"><h1><?php echo $row["prijs"] ?></h1></div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</main>

    
</body>
</html>
