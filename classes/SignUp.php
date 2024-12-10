<?php

namespace classes;

use classes\DBConnector;
use PDO;
use PDOException;

require_once 'DBConnector.php';

class SignUp
{

    public static function register($fname, $lname, $email, $username, $pass, $passRepeat)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query1 = "SELECT User_ID FROM User WHERE User_Name	= ?;";
            $pstmt1 = $con->prepare($query1);
            $pstmt1->bindValue(1, $username);
            $pstmt1->execute();
            $rs1 = $pstmt1->fetchAll(PDO::FETCH_BOTH);

            if (count($rs1) > 0) {
                header("Location: ../signup.php?error=3");
            } else if ($pass != $passRepeat) {
                header("Location: ../signup.php?error=4");
            } else {
                $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
                $query2 = "INSERT INTO User(User_Name, Password, User_Role) VALUES(?, ?, ?);";
                $pstmt2 = $con->prepare($query2);
                $pstmt2->bindValue(1, $username);
                $pstmt2->bindValue(2, $hashedPass);
                $pstmt2->bindValue(3, "Student");
                $a1 = $pstmt2->execute();

                $query3 = "SELECT User_Id FROM User WHERE User_Name = ?;";

                if ($a1 > 0) {
                    $pstmt3 = $con->prepare($query1);
                    $pstmt3->bindValue(1, $username);
                    $pstmt3->execute();
                    $rs2 = $pstmt3->fetch(PDO::FETCH_BOTH);
                    $userId = $rs2['User_ID'];

                    $query3 = "INSERT INTO User_Detail(User_ID, First_Name, Last_Name, Email) VALUES(?, ?, ?, ?);";
                    $pstmt4 = $con->prepare($query3);
                    $pstmt4->bindValue(1, $userId);
                    $pstmt4->bindValue(2, $fname);
                    $pstmt4->bindValue(3, $lname);
                    $pstmt4->bindValue(4, $email);
                    $a2 = $pstmt4->execute();

                    if ($a2 > 0) {
                        header("Location: ../index.php");
                    } else {
                        header("Location: ../signup.php?error=5");
                    }
                } else {
                    header("Location: ../signup.php?error=6");
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}