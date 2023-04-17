<?php session_start(); 

  include("header.php");

  include "connection.php";
  if(isset($_POST["login"])) {
    if($_POST["username"] == "" or $_POST["email"] == "" or $_POST["password"] == "") {
      echo "<center><h1>Username, email and password cannot be empty</h1></center>";
    } else {
      $email=trim($_POST["email"]);
      $username=strip_tags(trim($_POST["username"]));
      $password=strip_tags(trim($_POST["password"]));
      $query=$conn->prepare("SELECT * FROM login WHERE email=? AND password=?");
      $query->execute(array($email, $password));
      $control=$query->fetch(PDO::FETCH_OBJ);
      if($control>0) {
        $_SESSION["username"] = $username;
        header("Location:index.php");
      }
      echo "<center><h1>Incorrect password or email</h1></center>";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="container">
      <form method="post" action="login.php">
          <label>Username:</label><br>
          <input type="text" name="username"><br><br>
          <label>E-mail:</label><br>
          <input type="text" name="email"><br><br>
          <label>Password:</label><br>
          <input type="text" name="password"><br><br>
          <button type="submit" name="login">Log-in</button>
      </form>
    </div>
</body>
</html>