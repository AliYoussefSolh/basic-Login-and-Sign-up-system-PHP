<?php
include 'config.php';
//error_reporting(0);
session_start();

if (isset($_SESSION["username"])) {
  header("Location: homePage.php");
}
if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Either email or password are wrong')</script>";
  } else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["username"] = $row['username'];
    header("Location:homePage.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7
.0/css/font-awesome.min.css" />

  <link rel="stylesheet" type="text/css" href="style.css" />

  <title>Login Form</title>
</head>

<body>
  <div class="container">

    <form class="login-email" method="POST">
      <p class="login-text">Log in</p>
      <div class="input-group">
        <input type="email" name="email" placeholder="Email" value="<?php echo (isset($email)) ? $email : ""; ?>" required />
      </div>
      <div class="input-group">
        <input type="password" value="<?php echo (isset($password)) ? $password : ""; ?>" name="password" placeholder="Password" required />
      </div>
      <div class="input-group">
        <button name="login" class="btn">Login</button>
      </div>
      <p class=login-register-text>Don't have an account? <a href="signUp.php">Sign Up here</a></p>
    </form>
  </div>
</body>

</html>