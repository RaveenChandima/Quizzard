<?php
session_start();
use classes\SignUp;

require_once '../classes/SignUp.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["submit_signup"])) {
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pass']) && !empty($_POST['passRepeat'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $fname = strip_tags($_POST['fname']);
                $lname = strip_tags($_POST['lname']);
                $email = strip_tags($_POST['email']);
                $username = strip_tags($_POST['username']);
                $pass = strip_tags($_POST['pass']);
                $passRepeat = strip_tags($_POST['passRepeat']);

                SignUp::register($fname, $lname, $email, $username, $pass, $passRepeat);
            }
            else {
                header("Location: ../signup.php?error=2");
            }
        } else {
            header("Location: ../signup.php?error=1");
        }
    } else {
        header("Location: ../signup.php");
    }
} else {
    header("Location: ../signup.php");
}