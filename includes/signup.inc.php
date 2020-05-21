<?php

if (isset($_POST['signup-submit'])) {

<<<<<<< HEAD
require 'dbh.inc.php';

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
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
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
=======
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $phoneNumber = $_POST['phoneNumber'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $userRole = $_POST['userRole'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phoneNumber) || empty($city) || empty($state) || empty($zipCode)) {
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
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b
        exit();
    }

    else {
<<<<<<< HEAD
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0) {
            header("Location: ../signup.php?error=usertaken&mail=".$email);
=======
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b
            exit();
        }

        else {
<<<<<<< HEAD
            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
            mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
=======
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b
                exit();
            }

            else {
<<<<<<< HEAD

                $hashpwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
            }
        }
    }
}
=======
                $sql = "INSERT INTO users (city, email, password, phone_number, profile_image, state, user_role, username, zipcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }

                else {

                    $hashpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $email, $hashpwd, $phoneNumber, $city, $state, $zipCode, $userRole);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else {
    header("Location: ../signup.php");
    exit();
<<<<<<< HEAD

=======
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b
}
