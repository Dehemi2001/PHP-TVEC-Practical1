<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body style="background-color: lightblue;">
    <a href="index.php">Register Student</a><br><br>
    <?php 
    include("database.php");

    $query = "select regNumber, name from student";

    try {
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            echo"{$row["regNumber"]} : {$row["name"]}<br>";
        }
    } catch (Exception) {
        echo"<script>window.alert('Couldn't search!')</script>";
    }
    ?>
</body>
</html>