<?php

namespace classes;

use classes\DBConnector;
use PDO;
use PDOException;

require_once 'DBConnector.php';

class Admin
{
    public static function getStudentCount()
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "SELECT * FROM User WHERE User_Role = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "Student");
            $pstmt->execute();
            $pstmt->fetchAll(PDO::FETCH_BOTH);
            return $pstmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getLecturerCount()
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "SELECT * FROM User WHERE User_Role = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "Lecturer");
            $pstmt->execute();
            $pstmt->fetchAll(PDO::FETCH_BOTH);
            return $pstmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getStudents()
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "SELECT * FROM User, User_Detail WHERE User.User_ID = User_Detail.User_ID AND User_Role = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "Student");
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_BOTH);
            return $rs;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getLecturers()
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "SELECT * FROM User, User_Detail WHERE User.User_ID = User_Detail.User_ID AND User_Role = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "Lecturer");
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_BOTH);
            return $rs;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function addNewStudent($fname, $lname, $username, $hashedPass, $email)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query1 = "INSERT INTO User(User_Name, Password, User_Role) VALUES(?, ?, ?);";
            $pstmt1 = $con->prepare($query1);
            $pstmt1->bindValue(1, $username);
            $pstmt1->bindValue(2, $hashedPass);
            $pstmt1->bindValue(3, "Student");
            $a1 = $pstmt1->execute();

            $query2 = "SELECT User_ID FROM User WHERE User_Name = ?;";
            $pstmt2 = $con->prepare($query2);
            $pstmt2->bindValue(1, $username);
            $pstmt2->execute();
            $rs = $pstmt2->fetch(PDO::FETCH_BOTH);
            $userId = $rs['User_ID'];

            $query3 = "INSERT INTO User_Detail(User_ID, First_Name, Last_Name, Email) VALUES(?, ?, ?, ?);";
            $pstmt3 = $con->prepare($query3);
            $pstmt3->bindValue(1, $userId);
            $pstmt3->bindValue(2, $fname);
            $pstmt3->bindValue(3, $lname);
            $pstmt3->bindValue(4, $email);
            $a2 = $pstmt3->execute();

            if ($a1 > 0 && $a2 > 0) {
                header("Location: ../admin_students.php?error=5");
            } else {
                header("Location: ../admin_students.php?error=4");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function addNewLecturer($fname, $lname, $username, $hashedPass, $email)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query1 = "INSERT INTO User(User_Name, Password, User_Role) VALUES(?, ?, ?);";
            $pstmt1 = $con->prepare($query1);
            $pstmt1->bindValue(1, $username);
            $pstmt1->bindValue(2, $hashedPass);
            $pstmt1->bindValue(3, "Lecturer");
            $a1 = $pstmt1->execute();

            $query2 = "SELECT User_ID FROM User WHERE User_Name = ?;";
            $pstmt2 = $con->prepare($query2);
            $pstmt2->bindValue(1, $username);
            $pstmt2->execute();
            $rs = $pstmt2->fetch(PDO::FETCH_BOTH);
            $userId = $rs['User_ID'];

            $query3 = "INSERT INTO User_Detail(User_ID, First_Name, Last_Name, Email) VALUES(?, ?, ?, ?);";
            $pstmt3 = $con->prepare($query3);
            $pstmt3->bindValue(1, $userId);
            $pstmt3->bindValue(2, $fname);
            $pstmt3->bindValue(3, $lname);
            $pstmt3->bindValue(4, $email);
            $a2 = $pstmt3->execute();

            if ($a1 > 0 && $a2 > 0) {
                header("Location: ../admin_lecturers.php?error=5");
            } else {
                header("Location: ../admin_lecturers.php?error=4");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function deleteStudent($userId)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "DELETE FROM User_Detail WHERE User_ID = ?;DELETE FROM User WHERE User_ID = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $userId);
            $pstmt->bindValue(2, $userId);
            $a = $pstmt->execute();

            if ($a > 0) {
                header("Location: ../admin_students.php?error=6");
            } else {
                header("Location: ../admin_students.php?error=7");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function deleteLecturer($userId)
    {
        $dbcon = new DBConnector;
        $con = $dbcon->getConnection();

        try {
            $query = "DELETE FROM User_Detail WHERE User_ID = ?;DELETE FROM User WHERE User_ID = ?;";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $userId);
            $pstmt->bindValue(2, $userId);
            $a = $pstmt->execute();

            if ($a > 0) {
                header("Location: ../admin_lecturers.php?error=6");
            } else {
                header("Location: ../admin_lecturers.php?error=7");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}