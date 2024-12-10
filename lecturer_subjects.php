<?php
include_once 'headerteacher.php';
include 'connect.php';
if (isset($_POST['addSubject'])) {
    $subjectname = $_POST['subjectname'];


    $sql = "INSERT INTO subject (Subject_Name) VALUES ('$subjectname')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Subject Added successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>


<body>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Subjects Details</h3>
        <button class="btn btn-dark" type="submit" data-bs-toggle="modal" data-bs-target="#addNewSubject"
            style="float: right;">Add New Subjects</button>
        </br>
        </br>
        <form action="#" method="POST">
            <div class="modal fade" id="addNewSubject" tabindex="-1" aria-labelledby="addNewSubjectLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h3" id="addNewSubjectLabel">Add Subjects</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-body" class="modal-body">
                            <form action="#" method="POST">
                                <div class="form-outline form-white h5">
                                    <label class="form-label h5" for="subjectname">Subject Name</label>
                                    <br />
                                    <input type="text" class="form-control" name="subjectname" required />
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addSubject">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Subject Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connect.php';

                                //read all row from database table
                                $sql = "SELECT * FROM subject";
                                $result = mysqli_query($con, $sql);

                                if (!$result) {
                                    die("Invalid query:" . $connection->error);
                                }
                                //read data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                    <tr>
                    <td>$row[Subject_ID]</td>
                    <td>$row[Subject_Name]</td>
                    <td>
                     <a class='btn btn-danger btn-sm'href='/Quizzard/dltsub.php?Subject_ID=$row[Subject_ID]'>Delete</a>
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
        anchor1.setAttribute("class", "nav-link active");
    </script>
    <a class="border rounded d-inline scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

<?php
include_once 'footer.php';
?>