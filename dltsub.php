<?php
include 'connect.php';
if (isset($_GET["Subject_ID"])) {
    $id = $_GET["Subject_ID"];
    
    $sql = "DELETE FROM subject WHERE Subject_ID=$id";
    $result = mysqli_query($con, $sql);
}
header("location:lecturer_subjects.php");
exit;

?>