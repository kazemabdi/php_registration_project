<?php
session_start();
// echo "session_start" . "<br>";
// echo session_id();
// echo "<br>";

session_unset();
// echo "session_unset" . "<br>";
// echo session_id();
// echo "<br>";

session_destroy();
// echo "session_destroy" . "<br>";
// echo session_id();
// echo "<br>";
header('Location: https://kazix.ir/index.html');
