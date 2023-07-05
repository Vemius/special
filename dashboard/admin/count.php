<?php
session_start();
include_once ('session.php');

include 'dbconnect.php';

$sql = "SELECT * FROM account ORDER BY id";
$sql1 = "SELECT * FROM ticket ";
$sql2 = "SELECT * FROM transfer";
$sql3 = "SELECT * FROM account WHERE verify ='N' ORDER BY id DESC LIMIT 200";


if ($result = mysqli_query($connection, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);

    // Free result set
    mysqli_free_result($result);

    if ($result1 = mysqli_query($connection, $sql1)) {
        // Return the number of rows in result set
        $rowcount1 = mysqli_num_rows($result1);

        // Free result set
        mysqli_free_result($result1);

        if ($result2 = mysqli_query($connection, $sql2)) {
            // Return the number of rows in result set
            $rowcount2 = mysqli_num_rows($result2);

            // Free result set
            mysqli_free_result($result2);

            if ($result3 = mysqli_query($connection, $sql3)) {
                // Return the number of rows in result set
                $rowcount3 = mysqli_num_rows($result3);

                // Free result set
                mysqli_free_result($result3);
            }
        }
    }
}

mysqli_close($connection);

?>