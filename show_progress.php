<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quiz Management Panel</title>
    <link rel="icon" href="https://icons.veryicon.com/png/o/miscellaneous/advanceico/user-255.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <style>
        #main-nav,
        #modal-body {
            background-color: #03362A;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand-md bg-white shadow mb-4 py-3 static-top">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4>Quiz Management Panel</h4>
                    <h4 class="align-self-right">
                        <i class="fas fa-user"></i>
                        <span>&nbsp;Hello Teacher</span>
                    </h4>
                </div>
            </nav>
            <div class="container">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['Quiz_ID'])) {
                            $Quiz_ID = $_GET['Quiz_ID'];
                        }
                        //read all row from database table
                        $sql = "SELECT * FROM mark, user WHERE mark.User_ID = user.User_ID AND Quiz_ID = $Quiz_ID ORDER BY Marks_Total DESC";
                        $result = mysqli_query($con, $sql);

                        if (!$result) {
                            die("Invalid query:" . $connection->error);
                        }
                        //read data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "
                    <tr>
                    <td>$row[User_Name]</td>
                    <td>$row[Marks_Total]</td>
                    </tr>
                    ";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
include_once 'footer.php';
?>

</html>