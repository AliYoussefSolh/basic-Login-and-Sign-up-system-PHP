<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");  //in case entered sign up page from url after he logged in
}
if (isset($_POST["submit"])) {
    //submit is clicked
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];
    if ($password === $confirmpassword) {
        $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('You already have an account')</script>";
        } else {
            $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
            $result = mysqli_query($connection, $sql);
            if (!$result) {
                echo "<script>alert('error')</script>";
            } else {
                echo "<script>alert('signed up successfully. you can now log in')</script>";
                $username = "";
                $password = "";
                $email = "";
                $confirmpassword = "";
            }
        }
    } else {
        echo "<script>alert('password not matched')</script>";
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

    <title>Sign Up Form</title>

</head>

<body>
    <div class="container">
        <form class="login-email" method="POST">
            <p class="login-text">Sign Up</p>
            <div class="input-group">
                <input type="text" placeholder="Username" value="<?php echo (isset($username)) ? $username : ""; ?>" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" value="<?php echo (isset($email)) ? $email : ""; ?>" name="email" required />
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" value="<?php echo (isset($password)) ? $password : ""; ?>" name="password" required />
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" value="<?php echo (isset($confirmpassword)) ? $confirmpassword : ""; ?>" name="confirm-password" required />
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Sign Up</button>
            </div>
            <p class=login-register-text>Already have an account? <a href="index.php">Log in here</a></p>
        </form>
    </div>
</body>

</html>