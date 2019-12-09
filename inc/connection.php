<?php
function getdb(){
$servername = "localhost";
$username = "dmd120997";
$password = "88Anemam_base";
$db = "dmd120997";

try {

    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully";
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
    /* change character set to utf8 */
if ($mysqli->set_charset("utf8")) {
    printf("Помилка завантаження набору символів utf8: %s\n", $mysql->error);
} else {
    printf("Поточний набір символів: %s\n", $mysqli->character_set_name());
}
}
?>
