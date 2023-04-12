<?php

session_start();
// echo session_status();
echo session_id();

include "Classes/DataBase.php";
include "utilities/formValidation.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = formValidation(htmlspecialchars($_POST["email"]), "email");
    $password = formValidation(htmlspecialchars($_POST["password"]), "password");

    if ($email != false && $password != false) {

        $hostname = "localhost";
        $username = "";
        $dbPassword = "";
        $database = "";

        $dbObject = new DataBase($hostname, $username, $dbPassword, $database);

        $sql = "SELECT * FROM `User` WHERE `email`='$email' && `password`='$password'";

        $resultRows = $dbObject->getQuery($sql);

        if ($resultRows != false) {

            $_SESSION["profile"] = json_encode($resultRows);

            header('Location: https://kazix.ir/profile.php');

            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
        } else {

            header('Location: https://kazix.ir/sign_in.html');
        }
    } else {

        $arrayName = array(
            'email' => $email,
            'password' => $password
        );

        foreach ($arrayName as $key => $value) {

            if ($value == false) {
                echo $key . " = false" . "<br>";
            }
        }
    }
} else {
    header('Location: https://kazix.ir/index.html');
}
