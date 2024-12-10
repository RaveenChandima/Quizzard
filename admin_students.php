<?php
session_start();
use classes\Admin;

include_once 'header.php';
require_once 'classes/Admin.php';

if (!isset($_SESSION['login']) && !isset($_SESSION['User_Role'])) {
    header("Location: index.php");
} else if (isset($_SESSION['login']) && $_SESSION['User_Role'] != "Admin") {
    header("Location: index.php");
}

$rs = Admin::getStudents();
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $results_per_page = 5;
    if (count($rs) < $results_per_page) {
        $results_per_page = count($rs);
    }
    if (count($rs) == 0) {
        $results_per_page = 1;
    }
    $page_first_result = ($page - 1) * $results_per_page;
    $number_of_result = count($rs);
    $number_of_page = ceil($number_of_result / $results_per_page);
    if($page == $number_of_page){
        $results_per_page = count($rs) - $page_first_result;
    }
    if (isset($_GET['page'])) {
        if ($_GET['page'] < 1) {
            header('Location: admin_students.php?page=1');
        } else if ($_GET['page'] > $number_of_page) {
            header('Location: admin_students.php?page=' . $number_of_page);
        }
    }
?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">Student Details</h3>
    <button class="btn btn-dark" type="submit" data-bs-toggle="modal" data-bs-target="#addNewStudent" style="float: right;">Add New Student</button>
    </br>
    </br>

    <form action="includes/admin.inc.php" method="POST">
    <div class="modal fade" id="addNewStudent" tabindex="-1" aria-labelledby="addNewStudentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h3" id="addNewStudentLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal-body" class="modal-body">
                        <form action="">
                            <div class="form-outline form-white h5">
                                <label class="form-label h5" for="fname">First Name</label><br />
                                <input type="text" class="form-control" name="fname" required />
                                <br />
                                <label class="form-label h5" for="lname">Last Name</label><br />
                                <input type="text" class="form-control" name="lname" required />
                                <br />
                                <label class="form-label h5" for="username">Username</label><br />
                                <input type="text" class="form-control" name="username" required />
                                <br />
                                <label class="form-label h5" for="pass">Password</label><br />
                                <input type="password" class="form-control" name="pass" required />
                                <br />
                                <label class="form-label h5" for="passRepeat">Repeat Password</label><br />
                                <input type="password" class="form-control" name="passRepeat" required />
                                <br />
                                <label class="form-label h5" for="email">Email</label><br />
                                <input type="email" class="form-control" name="email" required />
                                <br />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addStudent">Add</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th><b>#</b></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                            if (count($rs) > 0) {
                                                for ($i = $page_first_result; $i < $page_first_result + $results_per_page; $i++) {
                                                    $row = $rs[$i];
                                            ?>
                                                    <tr>
                                                        <td><b><?php echo $i + 1; ?></b></td>
                                                        <td><?php echo $row['First_Name']; ?></td>
                                                        <td><?php echo $row['Last_Name']; ?></td>
                                                        <td><?php echo $row['User_Name']; ?></td>
                                                        <td><?php echo $row['Email']; ?></td>
                                                        <td><a type="button" class="btn btn-danger" href="includes/admin.inc.php?target=student&userId=<?php echo $row['User_ID']; ?>" name="delete">Delete</a></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6">No data found</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing <?php echo $page_first_result + 1; ?> to <?php echo $page_first_result + $results_per_page; ?> of <?php echo count($rs); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" aria-label="Previous" href="admin_students.php?page=<?php echo $page - 1; ?>">
                                                    <span aria-hidden="true">«</span>
                                                </a>
                                            </li>
                                            <?php
                                            for ($i = 1; $i <= $number_of_page; $i++) {
                                                if ($i == $page) {
                                            ?>
                                                    <li class="page-item">
                                                        <a class="page-link active" href="admin_students.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="admin_students.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                    </li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" aria-label="Next" href="admin_students.php?page=<?php echo $page + 1; ?>">
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
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</body>

<?php
include_once 'footer.php';
?>