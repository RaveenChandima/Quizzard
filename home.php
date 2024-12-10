<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzard";

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedQuizId = $_POST["Quiz_ID"];
        $enteredPassword = $_POST["Quiz_Password"];

        $pstmt = $con->prepare("SELECT Quiz_Password FROM quiz WHERE Quiz_ID = :Quiz_ID");
        $pstmt->bindParam(':Quiz_ID', $selectedQuizId);
        $pstmt->execute();

        $rs = $pstmt->fetch(PDO::FETCH_ASSOC);


        if ($rs) {
            $actualPassword = $rs["Quiz_Password"];

            if ($actualPassword === $enteredPassword) {

                header("Location: quiz.php?Quiz_ID=$selectedQuizId");
                exit();

            } else {

                $errorMessage = "Incorrect quiz password. Please try again.";
            }
        } else {

            $errorMessage = "Invalid quiz ID. Please select a valid quiz.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>

<!--home page-->

<?php
include_once 'header_home.php';
?>

<head>
    <title>Home</title>
</head>

<body>
    <section>
        <div>
            <div class="d-flex flex-column justify-content-center align-items-center"
                style="background: url(&quot;assets/img/background.jpg&quot;) center / cover;height: 750px;">
                <div class="row">
                    <div
                        class="text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <form action="home.php" method="POST">
                            <div class="form-group">
                                <div class="mb-3">
                                    <select class="form-select" name="Quiz_ID">
                                        <?php
                                        $pstmt = $con->query("SELECT * FROM quiz");
                                        while ($rs = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $rs["Quiz_ID"] . '">' . $rs["Quiz_ID"] . " - " . $rs['Quiz_Name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control" name="Quiz_Password"
                                        placeholder="Quiz Password">
                                </div>

                                <?php if (isset($errorMessage)): ?>
                                    <div class="alert alert-danger <?php if (empty($errorMessage))
                                        echo 'd-none'; ?>"
                                        role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>

                                <button class="btn btn-danger btn-lg" type="submit">Attempt Quiz</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br><br><br>

                <!--Library Access-->
                <h3 class="text-light fw-bold">Access the library</h3>
                <a class="btn btn-danger btn-lg" type="button" href="https://openlibrary.org/">Click Here</a>
            </div>
        </div>

    </section>

    <?php
    include_once 'footer_home.php';
    ?>

</body>