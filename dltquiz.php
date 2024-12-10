<?php
include 'connect.php';
if (isset($_GET["Quiz_ID"])) {
    $id = $_GET["Quiz_ID"];
    
    $sql = "DELETE FROM quiz WHERE Quiz_ID=$id";
    $result = mysqli_query($con, $sql);
}
header("location:lecturer_quizzes.php");
exit;

?>