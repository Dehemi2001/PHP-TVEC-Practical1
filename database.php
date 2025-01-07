<?php

try {
    $conn = mysqli_connect("localhost", "root", "", "practical1");
} catch (Exception $e) {
    echo"Could not connect!";
}

?>