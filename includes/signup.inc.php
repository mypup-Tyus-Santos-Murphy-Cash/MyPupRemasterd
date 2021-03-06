<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $phoneNumber = $_POST['phone-number'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $userRole = $_POST['user-role'];
    $image = $_POST['image'];


    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phoneNumber) || empty($city) || empty($state) || empty($zipcode) || empty($userRole) || empty($image)) {
        header("Location: ../signup.php?error=emptyFields&uid=".$username."&mail=".$email);
        exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !filter_var(!preg_filter("/^[a-zA-Z0-9]*$/", $username))) {
        header("Location: ../signup.php?error=invalidmailuid");
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if(!filter_var(!preg_filter("/^[a-zA-Z0-9]*$/", $username))) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }

    else if($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }

    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }

            else {
                $sql = "INSERT INTO users (username, email, pwd, phone_number, city, state, zipcode, user_role, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }

                else {

                    $hashpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $email, $hashpwd, $phoneNumber, $city, $state, $zipcode, $userRole, $image);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else {
    header("Location: ../signup.php");
    exit();
}
