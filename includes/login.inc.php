<?php
if(isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }

    else {
<<<<<<< HEAD
<<<<<<< HEAD
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    }

    else {
    mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
    $pwdCheck = password_verify($password, $row['pwdUsers']);
    if($pwdCheck == false) {
        header("Location: ../index.php?error=wrongpwd");
        exit();
    }

    else if($pwdCheck == true) {
    session_start();
    $_SESSION['userId'] = $row['idUsers'];
    $_SESSION['userUid'] = $row['uidUsers'];
        header("Location: ../index.php?login=success");
        exit();
    }

    else{
        header("Location: ../index.php?error=wrongpwd");
        exit();

    }

    }

    else {
        header("Location: ../index.php?error=nouser");
        exit();

    }

    }
=======
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
=======
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
>>>>>>> 58eb766aaaed4bdb016f82e5912c927f5002d45e
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }

                else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUid'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }

                else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();

                }

            }

            else {
                header("Location: ../index.php?error=nouser");
                exit();

            }

        }
>>>>>>> 1281354bdb56e58e264b716878dc6835f9109e5b

    }

}

else {
    header("Location: ../index.php");
    exit();
}