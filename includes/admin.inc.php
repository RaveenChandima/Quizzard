<?php
session_start();
use classes\Admin;

require_once '../classes/Admin.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['addStudent'])) {
        if (!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['username']) || !empty($_POST['pass']) || !empty($_POST['passRepeat']) || !empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                if ($_POST['pass'] == $_POST['passRepeat']) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $username = $_POST['username'];
                    $pass = $_POST['pass'];
                    $passRepeat = $_POST['passRepeat'];
                    $email = $_POST['email'];
                    $hashedPass = password_hash($pass, PASSWORD_BCRYPT);

                    Admin::addNewStudent($fname, $lname, $username, $hashedPass, $email);
                } else {
                    header("Location: ../admin_students.php?error=3");
                }
            } else {
                header("Location: ../admin_students.php?error=2");
            }
        } else {
            header("Location: ../admin_students.php?error=1");
        }
    } elseif (isset($_POST['addLecturer'])) {
        if (!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['username']) || !empty($_POST['pass']) || !empty($_POST['passRepeat']) || !empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                if ($_POST['pass'] == $_POST['passRepeat']) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $username = $_POST['username'];
                    $pass = $_POST['pass'];
                    $passRepeat = $_POST['passRepeat'];
                    $email = $_POST['email'];
                    $hashedPass = password_hash($pass, PASSWORD_BCRYPT);

                    Admin::addNewLecturer($fname, $lname, $username, $hashedPass, $email);
                } else {
                    header("Location: ../admin_lecturers.php?error=3");
                }
            } else {
                header("Location: ../admin_lecturers.php?error=2");
            }
        } else {
            header("Location: ../admin_lecturers.php?error=1");
        }
    } else {
        header("Location: ../dash.php");
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['target']) && isset($_GET['userId'])) {
        if ($_GET['target'] == "student") {
            $userId = $_GET['userId'];
            Admin::deleteStudent($userId);
        } elseif ($_GET['target'] == "lecturer") {
            $userId = $_GET['userId'];
            Admin::deleteLecturer($userId);
        }
    }
} else {
    header("Location: ../dash.php");
}