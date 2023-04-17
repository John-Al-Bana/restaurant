<?php session_start();
    include "connection.php";
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
    <main class="banner">
        <div><h1 class="watermerk">De chemist</h1></div>
        <?php 
            if(isset($_SESSION["username"])) {
                echo "<h1>Welcome " . $_SESSION["username"]. "</h1>";
            }
            if(!isset($_SESSION["username"])) {
                echo "<a href='./menu.php'><button>Menu</button></a>";
                echo "<a href='./login.php'><button>Log in</button></a>";
            }
            else {
                echo "<a href='./menu.php'><button>Menu</button></a>";
                echo "<a href='./logout.php'><button>Log out</button></a>";
                echo "<a href='./adminpanel.php'><button>Admin Panel</button></a>";

            }
        ?>

        
    </main>
</body>
</html>