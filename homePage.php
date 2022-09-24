<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); //in case the user enter this page from the url without log in
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <?php echo "Welcome " . $_SESSION['username']; ?>
    <p><a href="logout.php"> Log Out</a></p>



</body>

</html>