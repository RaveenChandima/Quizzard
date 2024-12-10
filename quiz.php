<?php
use classes\DBConnector;

require_once 'classes/DBConnector.php';
include_once 'header_home.php';

// Start the session to store the quiz data
session_start();

$db = new DBConnector();
$con = $db->getConnection();

if (isset($_GET['Quiz_ID'])) {
    $_SESSION['Quiz_ID'] = $_GET['Quiz_ID'];
    $Quiz_ID = $_SESSION['Quiz_ID'];
    $query = "SELECT * FROM Question, Quiz WHERE Question.Quiz_Id = Quiz.Quiz_Id AND Question.Quiz_Id = ?";
    $pstmt = $con->prepare($query);
    $pstmt->bindValue(1, $Quiz_ID);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_BOTH);
    $count = count($rs);
}
if(!isset($_GET['Quiz_ID']) && isset($_SESSION['Quiz_ID'])){
    $Quiz_ID = $_SESSION['Quiz_ID'];
    $query = "SELECT * FROM Question, Quiz WHERE Question.Quiz_Id = Quiz.Quiz_Id AND Question.Quiz_Id = ?";
    $pstmt = $con->prepare($query);
    $pstmt->bindValue(1, $Quiz_ID);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_BOTH);
    $count = count($rs);
}

// Define the $questions array
$questions = array();

for ($i = 0; $i < $count; $i++) {
    $row = $rs[$i];
    $question = array(
        'question' => $row['Question'], // Change this to your desired question text
        'options' => array(
            $row['Wrong_Answer1'],
            $row['Wrong_Answer2'],
            $row['Wrong_Answer3'],
            $row['Correct_Answer']
        ),
        'correct_answer' => 3 // Change this to set the correct answer index
    );

    $questions[] = $question;}

// Check if it is the first question
if (!isset($_SESSION['question_number'])) {
    // Initialize session variables for the quiz
    $_SESSION['score'] = 0;
    $_SESSION['start_time'] = time();
    $_SESSION['question_number'] = 0;

    // Shuffle the question order
    shuffle($questions);
}

// Check if a previous answer has been submitted
if (isset($_POST['answer'])) {
    // Get the selected answer from the previous question
    $selected_answer = $_POST['answer'];

// Process the selected answer and update the score or other necessary data
    $current_question = $questions[$_SESSION['question_number']];
    if ($selected_answer == $current_question['correct_answer']) {
        $_SESSION['score'] ++;
    }

    // Increment the question number
    $_SESSION['question_number'] ++;

    // Check if it is the last question
    if ($_SESSION['question_number'] >= count($questions)) {
        // Calculate the time spent on the quiz
        $end_time = time();
        $time_spent = $end_time - $_SESSION['start_time'];

        // End the quiz and display the results
        include_once 'quiz_results.php';
        exit();
    }
}

// Retrieve the current question and options from the array
$current_question = $questions[$_SESSION['question_number']];
?>

<head>
    <title>Quiz Page</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <section class="text-dark" style="min-height: 760px">
        <div class="container py-4 py-xl-5">
            <br>
            <h2 class="text-center"><?php echo $rs[1]['Quiz_Name'];?></h2>
            <h3 class="text-center text-danger">(You Have 30 min to complete this quiz)</h3>
            <br><br>
            <h4>
                <span>Question <?php echo $_SESSION['question_number'] + 1; ?>:<br></span><?php echo $current_question['question']; ?>
            </h4>
            <form method="POST" action="quiz.php">          
                <?php foreach ($current_question['options'] as $index => $option) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="answer<?php echo $index ?>"
                            value="<?php echo $index ?>">
                        <label class="form-check-label" for="answer<?php echo $index ?>"><?php echo $option ?></label>
                    </div>
                <?php } ?>
                <br>
                <?php if ($_SESSION['question_number'] == count($questions) - 1) { ?>
                    <button class="btn btn-primary" type="submit" style="float: right;">Finish</button>
                <?php } else { ?>
                    <button class="btn btn-primary" type="submit" style="float: right;">Next</button>
                <?php } ?>
            </form>
            <br><br>
            <span id="timer"></span>
        </div>
    </section>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        var endTime = <?php echo $_SESSION['start_time'] + (30 * 60); ?> * 1000;
        var timer = setInterval(function () {
            var now = new Date().getTime();
            var timeRemaining = endTime - now;

            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = "Time Remaining: " + minutes + "m " + seconds + "s ";

            if (timeRemaining < 0) {
                clearInterval(timer);
                document.getElementById("timer").innerHTML = "Time's Up!";
                document.forms[0].submit();
            }
        }, 1000);
        
        function validateForm() {
            var answerSelected = false;

            var options = document.getElementsByName('answer');
            for (var i = 0; i < options.length; i++) {
                if (options[i].checked) {
                    answerSelected = true;
                    break;
                }
            }
            if (!answerSelected) {
                alert("You must select an answer before proceeding to the next question.");
                return false;
            }
            return true;
        }
    </script>
</body> 

<?php
include_once 'footer_home.php';
?> 