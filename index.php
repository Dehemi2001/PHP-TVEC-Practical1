<?php

include("database.php");

$regNumber = "";
$name = "";
$address = "";
$dob = "";
$nic = "";
$mobileNumber = "";
$email = "";
$course = "";
$query = "";

if (isset($_POST["add"])) {

    $regNumber = $_POST["regNumber"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $nic = $_POST["nic"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $query = "insert into student values ('$regNumber','$name','$address','$dob','$nic','$mobileNumber','$email','$course');";

    if ((strlen($nic) == 12 && ctype_digit($nic) || strlen($nic) == 10 && ctype_digit(substr($nic, 0, 9)) && substr($nic, 9, 1) == 'V') &&
        (strlen($mobileNumber) == 10 && ctype_digit($mobileNumber) && substr($mobilenumber, 0, 1) == '0' || strlen($mobileNumber) == 12 && ctype_digit(substr($mobileNumber, 1)) && substr($mobileNumber, 0, 1) == '+')
    ) {
        try {
            mysqli_query($conn, $query);
            echo"<script>window.alert('Successfully inserted!')</script>";
        } catch (Exception $e) {
            echo"<script>window.alert('Could not insert!')</script>";
        }
    } else {
        echo"<script>window.alert('Validation failed!')</script>";
    }
}

if (isset($_POST["search"])) {
    $regNumber = $_POST["regNumber"];
    $query = "select * from student where regNumber='$regNumber'";
    if (!empty($regNumber)) {
        try {
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $name = $row["name"];
                $address = $row["address"];
                $dob = $row["dob"];
                $nic = $row["nic"];
                $mobileNumber = $row["mobileNumber"];
                $email = $row["email"];
                $course = $row["course"];
            }else{
                echo"<script>window.alert('No student found with this registration number!')</script>";
            }
        } catch (Exception $e) {
            echo"<script>window.alert('Could not search!')</script>";
        }
    } else {
        echo"<script>window.alert('Registration Number is empty!')</script>";
    }
}

if (isset($_POST["update"])) {

    $regNumber = $_POST["regNumber"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $nic = $_POST["nic"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $query = "update student set name='$name', address='$address', dob='$dob', nic='$nic', mobileNumber='$mobileNumber', email='$email', course='$course' where regNumber='$regNumber'";

    if ((strlen($nic) == 12 && ctype_digit($nic) || strlen($nic) == 10 && ctype_digit(substr($nic, 0, 9)) && substr($nic, 9, 1) == 'V') &&
        (strlen($mobileNumber) == 10 && ctype_digit($mobileNumber) && substr($mobilenumber, 0, 1) == '0' || strlen($mobileNumber) == 12 && ctype_digit(substr($mobileNumber, 1)) && substr($mobileNumber, 0, 1) == '+')
    ) {
        try {
            mysqli_query($conn, $query);
            echo"<script>window.alert('Successfully updated!')</script>";
        } catch (Exception $e) {
            echo"<script>window.alert('Could not update!')</script>";
        }
    } else {
        echo"<script>window.alert('Validation failed!')</script>";
    }
}

if (isset($_POST["delete"])) {
    $regNumber = $_POST["regNumber"];

    $query = "delete from student where regNumber='$regNumber'";

    try {
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            echo"<script>window.alert('Successfully deleted!')</script>";
        } else {
            echo"<script>window.alert('No student found with this registration number')</script>";
        }
    } catch (Exception $e) {
        echo"<script>window.alert('Could not delete!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Page</title>
</head>

<body align="center" style="background-color: lightblue;">
    <h1>Future IT</h1>
    <form action="index.php" method="post">

        Registration Number: <input type="text" name="regNumber" style="background-color: lightblue; margin-left: 0px;" value="<?php echo $regNumber; ?>"><br><br>

        Name: <input type="text" name="name" style="background-color: lightblue; margin-left: 98px;" value="<?php echo $name; ?>"><br><br>

        Address: <input type="text" name="address" style="background-color: lightblue; margin-left: 85px;" value="<?php echo $address; ?>"><br><br>

        Date of Birth: <input type="text" name="dob" style="background-color: lightblue; margin-left: 55px;" value="<?php echo $dob; ?>"><br><br>

        NIC: <input type="text" name="nic" style="background-color: lightblue; margin-left: 114px;" value="<?php echo $nic; ?>"><br><br>

        Mobile Number: <input type="text" name="mobileNumber" style="background-color: lightblue; margin-left: 40px;" value="<?php echo $mobileNumber; ?>"><br><br>

        Email: <input type="email" name="email" style="background-color: lightblue; margin-left: 105px;" value="<?php echo $email; ?>"><br><br>

        Course:
        <select name="course" style="background-color: lightblue; margin-left:59px">
            <option <?php if($course == "Computer Application Assistant") {echo"selected = 'selected'";} ?>>Computer Application Assistant</option>
            <option <?php if($course == "Computer Graphic") {echo"selected = 'selected'";} ?>>Computer Graphic</option>
            <option <?php if($course == "Computer Hardware") {echo"selected = 'selected'";} ?>>Computer Hardware</option>
            <option <?php if($course == "Web Development") {echo"selected = 'selected'";} ?>>Web Development</option>
        </select><br><br>


        <input type="submit" name="add" value="Add" style="background-color: blue; color:white">

        <input type="submit" name="search" value="Search" style="background-color: blue; color:white">

        <input type="submit" name="update" value="Update" style="background-color: blue; color:white">

        <input type="submit" name="delete" value="Delete" style="background-color: blue; color:white">

        <input type="reset" name="reset" value="Reset" style="background-color: blue; color:white"><br><br>

        <a href="studentDetails.php">View Student Details</a><br><br>

    </form>

    
</body>

<footer>© Copyright 2020Future IT</footer>


</html>