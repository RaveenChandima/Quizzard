<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzard";

session_start(); 

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $loggedInUserId = $_SESSION['User_ID']; 

    $pstmt = $con->prepare("SELECT quiz.Quiz_ID, quiz.Quiz_Name, mark.Marks_Total FROM quiz INNER JOIN mark ON quiz.Quiz_ID = mark.Quiz_ID WHERE mark.User_ID = :User_ID");
    $pstmt->bindParam(':User_ID', $loggedInUserId);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>

<!--Quiz History Page-->
<?php
include_once 'header_home.php';
?> 
<head>
    <title>Quiz History</title>
</head>
<body>
    <section style="min-height: 750px">
        <div class="container py-4 py-xl-5">
            <h2>Quiz History</h2>
            <div class="row mb-5">
                <table class="table table-bordered table-hover" style="table-layout: fixed;">
                    <thead class="thead-dark table-active">
                        <tr>
                            <th scope="col">Quiz ID</th>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rs as $quiz): ?>
            <tr>
                <td><?php echo $quiz["Quiz_ID"]; ?></td>
                <td><?php echo $quiz["Quiz_Name"]; ?></td>
                <td><?php echo $quiz["Marks_Total"]; ?></td>
            </tr>
        <?php endforeach; ?>
                       
                </table>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body> 

<?php
include_once 'footer_home.php';
?>

