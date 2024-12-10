<?php
session_start();
use classes\Login;

require_once '../classes/Login.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["submit_login"])) {
        if (!empty($_POST['username']) && !empty($_POST['pass'])) {
            $username = strip_tags($_POST['username']);
            $password = strip_tags($_POST['pass']);

            Login::signin($username, $password);
        } else {
            header("Location: ../index.php?error=1");
        }
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}