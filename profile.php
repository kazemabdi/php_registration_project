<?php
session_start();
echo session_id();

if (isset($_SESSION["profile"])) {

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {

    header('Location: https://kazix.ir/sign_in.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Profile</title>
</head>

<body>
    <a href="log_out.php">log out</a>

</body>

</html>