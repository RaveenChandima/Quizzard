<?php

use classes\DBConnector;

require_once 'classes/DBConnector.php';
include_once 'header_home.php';

// Calculate the time spent on the quiz
$end_time = time();
$time_spent = $end_time - $_SESSION['start_time'];

$db = new DBConnector();
$con = $db->getConnection();
?>

<br><br>
<div class="container d-flex flex-column">
    <div class="card shadow">
        <div class="card-body">
            <?php
            // Display the quiz results
            echo "<h1 class='text-center'>Quiz Results</h1><br>";
            echo "<h4>Time Spent: " . gmdate("H:i:s", $time_spent) . "</h4><br>";
            echo "<h4>Score: " . $_SESSION['score'] . " / " . count($questions) . "</h4>";
            echo "<br>";

            $Marks_Total = ($_SESSION['score'] / count($questions)) * 100;
            $query = "INSERT INTO Mark(User_ID, Quiz_ID, Marks_Total) VALUES(?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $_SESSION['User_ID']);
            $pstmt->bindValue(2, $_SESSION['Quiz_ID']);
            $pstmt->bindValue(3, $Marks_Total);
            $pstmt->execute();
            ?>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th>Question</th>
                            <th>Correct Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($questions as $index => $question) {
                            echo "<tr>";
                            echo "<td>" . ($index + 1) . "</td>";
                            echo "<td>" . $question['question'] . "</td>";
                            echo "<td>" . $question['options'][$question['correct_answer']] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php
include_once 'footer_home.php';
?>