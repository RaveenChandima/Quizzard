<?php

namespace classes;

use classes\DBConnector;
use PDO;
use PDOException;

require_once 'DBConnector.php';

class Login
{
    public static function signin($username, $password)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "SELECT * FROM User WHERE User_Name = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $username);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_BOTH);

            if ($pstmt->rowCount() > 0) {
                $dbPass = $rs['Password'];
                if (password_verify($password, $dbPass)) {
                    $_SESSION['login'] = true;
                    $_SESSION['User_ID'] = $rs['User_ID'];
                    $_SESSION['User_Name'] = $rs['User_Name'];
                    $_SESSION['User_Role'] = $rs['User_Role'];
                    
                    if($_SESSION['User_Role'] == "Student"){
                        header("Location: ../home.php");
                    } elseif($_SESSION['User_Role'] == "Admin"){
                        header("Location: ../dash.php");
                    } elseif($_SESSION['User_Role'] == "Lecturer"){
                        header("Location: ../lecturer_quizzes.php");
                    }
                } else {
                    header("Location: ../index.php?error=2");
                }
            } else {
                header("Location: ../index.php?error=2");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}