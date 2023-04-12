<?php

use function PHPSTORM_META\type;

include "Classes/DataBase.php";
include "utilities/formValidation.php";
include "utilities/uploadFile.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $remotePort = $_SERVER["REMOTE_ADDR"];
    $remoteAddr = $_SERVER["REMOTE_PORT"];
    $httpUserAgent = $_SERVER["HTTP_USER_AGENT"];

    $email = formValidation(htmlspecialchars($_POST["email"]), "email");
    $familyName = formValidation(htmlspecialchars($_POST["family_name"]), "text");
    $name = formValidation(htmlspecialchars($_POST["name"]), "text");
    $password = formValidation(htmlspecialchars($_POST["password"]), "password");

    $fileName = $email . "_" . $familyName . "_" . $name;
    $uploaded_file = uploadFile($_FILES["file"], $fileName);

    if ($email != false && $familyName != false && $name != false && $password != false) {

        $hostname = "localhost";
        $username = "";
        $dbPassword = "";
        $database = "";

        $dbObject = new DataBase($hostname, $username, $dbPassword, $database);

        $sql = "INSERT INTO `User`(`email`, `family_name`, `name`, `password`, `REMOTE_ADDR`, `REMOTE_PORT`, `HTTP_USER_AGENT`, `picture`) 
        VALUES ('$email','$familyName','$name','$password','$remotePort','$remoteAddr','$httpUserAgent','$uploaded_file')";

        if ($dbObject->setQuery($sql)) {

            $jArray[] = array('signed_up' => true);
            // echo "<pre>";
            echo json_encode($jArray, JSON_UNESCAPED_SLASHES);
            // echo "</pre>";
        } else {

            $jArray[] = array('signed_up' => false);
            // echo "<pre>";
            echo json_encode($jArray, JSON_UNESCAPED_SLASHES);
            // echo "</pre>";

            // header('Location: https://kazix.ir/sign_in.php');
        }
    } else {

        $arrayName = array(
            'email' => $email,
            'familyName' => $familyName,
            'name' => $name,
            'password' => $password
        );

        foreach ($arrayName as $key => $value) {

            if ($value == false) {
                echo $key . " = false" . "<br>";
            }
        }
    }
} else {
    header('Location: https://kazix.ir/sign_up.html');
}
