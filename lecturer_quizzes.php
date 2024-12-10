<?php
include_once 'headerteacher.php';
include 'connect.php';
if (isset($_POST['addQuiz'])) {
    $quizname = $_POST['quizname'];
    $quizpassword = $_POST['quizpassword'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $sql = "INSERT INTO quiz (Quiz_Name,Quiz_Password,Start_Time,End_Time) VALUES ('$quizname','$quizpassword',' $starttime','$endtime')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Quiz Added successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>

<?php
include_once 'headerteacher.php';
include 'connect.php';
if (isset($_POST['addQuestion'])) {
    $quizid = $_POST['quizid'];
    $question = $_POST['question'];
    $wronganswer1 = $_POST['wronganswer1'];
    $wronganswer2 = $_POST['wronganswer2'];
    $wronganswer3 = $_POST['wronganswer3'];
    $correctanswer = $_POST['correctanswer'];

    $sql = "INSERT INTO question (Quiz_ID,Question,Wrong_Answer1,Wrong_Answer2,Wrong_Answer3,Correct_Answer) VALUES ('$quizid','$question','$wronganswer1','$wronganswer2','$wronganswer3','$correctanswer')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Question Added successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>

<body>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Quizzes Details</h3>
        <div class="mb-2">
            <button class="btn btn-dark" type="submit" data-bs-toggle="modal" data-bs-target="#addNewQuiz"
                style="float:right;">Add New Quiz</button>
        </div>
        </br>
        </br>

        <!-- Add new quiz modal -->
        <form action="#" method="POST">
            <div class="modal fade" id="addNewQuiz" tabindex="-1" aria-labelledby="addNewQuizLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h3" id="addNewQuizLabel">Add Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-body" class="modal-body">
                            <form action="#" method="POST">
                                <div class="form-outline form-white h5">

                                    <label class="form-label h5" for="quizname">Quiz Name</label>
                                    <br />
                                    <input type="text" class="form-control" name="quizname" required />
                                    <br />
                                    <label class="form-label h5" for="quizpassword">Quiz Password</label>
                                    <br />
                                    <input type="text" class="form-control" name="quizpassword" required />
                                    <br />
                                    <label class="form-label h5" for="starttime">Start Time</label>
                                    <br />
                                    <input type="text" class="form-control" name="starttime" required />
                                    <br />
                                    <label class="form-label h5" for="endtime">End Time</label>
                                    <br />
                                    <input type="text" class="form-control" name="endtime" required />
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="addQuiz" name="addQuiz">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Add new question modal -->
        <form action="#" method="POST">
            <div class="modal fade" id="addNewQuestions" tabindex="-1" aria-labelledby="addNewQuestionsLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h3" id="addNewQuestionsLabel">Add New Questions </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-body" class="modal-body">
                            <form action="#" method="POST">
                                <div class="form-outline form-white h5">
                                    <label class="form-label h5" for="quizid">Enter Quiz ID</label>
                                    <br />
                                    <input type="text" class="form-control" name="quizid" required />
                                    <br />
                                    <label class="form-label h5" for="question">Enter Question</label>
                                    <br />
                                    <input type="text" class="form-control" name="question" required />
                                    <br />
                                    <label class="form-label h5" for="wronganswer1">Wrong Answer 01</label>
                                    <br />
                                    <input type="text" class="form-control" name="wronganswer1" required />
                                    <br />
                                    <label class="form-label h5" for="wronganswer2">Wrong Answer 02</label>
                                    <br />
                                    <input type="text" class="form-control" name="wronganswer2" required />
                                    <br />
                                    <label class="form-label h5" for="wronganswer3">Wrong Answer 03</label>
                                    <br />
                                    <input type="text" class="form-control" name="wronganswer3" required />
                                    <br />
                                    <label class="form-label h5" for="correctanswer">Correct Answer</label>
                                    <br />
                                    <input type="text" class="form-control" name="correctanswer" required />
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="addQuestion" name="addQuestion">Add
                                Question</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Quiz ID</th>
                                <th>Quiz Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';

                            //read all row from database table
                            $sql = "SELECT * FROM quiz";
                            $result = mysqli_query($con, $sql);

                            if (!$result) {
                                die("Invalid query:" . $connection->error);
                            }
                            //read data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                    <tr>
                    <td>$row[Quiz_ID]</td>
                    <td>$row[Quiz_Name]</td>
                    <td>$row[Start_Time]</td>
                    <td>$row[End_Time]</td>
                    <td>
                    <a href='show_progress.php?Quiz_ID=$row[Quiz_ID]'><button class='btn btn-warning' type='submit'>Student Progress</button></a>
                    <button class='btn btn-success' type='submit' name='edit' data-bs-toggle='modal' data-bs-target='#addNewQuestions'>Add Questions</button>
                    <a class='btn btn-danger btn-sm'href='/Quizzard/dltquiz.php?Quiz_ID=$row[Quiz_ID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                </form>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 05
                            of 20</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" aria-label="Previous" href="#">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" aria-label="Next" href="#">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        anchor2.setAttribute("class", "nav-link active");
    </script>
    <a class="border rounded d-inline scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

<?php
include_once 'footer.php';
?>