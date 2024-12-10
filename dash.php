<?php
use classes\Admin;

include_once 'header.php';
require_once 'classes/Admin.php';
?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Students</span>
                            </div>
                            <div class="text-dark fw-bold h5 mb-0">
                                <span>
                                    <?php
                                    $studentCount = Admin::getStudentCount();
                                    echo $studentCount;
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total Lecturers</span>
                            </div>
                            <div class="text-dark fw-bold h5 mb-0">
                                <span>
                                    <?php
                                    $lecturerCount = Admin::getLecturerCount();
                                    echo $lecturerCount;
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-graduation-cap fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    anchor1.setAttribute("class", "nav-link active");
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</body>

<?php
include_once 'footer.php';
?>