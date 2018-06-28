<?php

//Require the functions
require 'functions.inc.php';
//Require var $conn
require 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $emailPost = $conn->real_escape_string($_POST['loginEmail']);
    $passwordPost = $conn->real_escape_string($_POST['loginPassword']);

    //Make the value lower case
    $emailPost = strtolower($emailPost);

    if (CheckIfLoggedIn() == false) {

        if (CheckIfEmailUsed($emailPost) == true) {

            if (CheckIfEmptyLogin($emailPost, $passwordPost) == false) {

                if (CheckIfActivated($emailPost) == true) {

                    $sql = $conn->query("SELECT * FROM user WHERE email = '$emailPost';");
                    $row = $sql->fetch_array();

                    $hashedPWD = $row['password'];

                    // Verify if the password matches the one the user typed.
                    if (UnHashPassword($passwordPost, $hashedPWD) == true) {

                        //ID from DB.user - example: 09221D38-D97D12BF-12BF2AFD
                        $_SESSION['user']['id'] = $row['id'];

                        // Update the user last_login time.
                        $UserID = $_SESSION['user']['id'];
                        $query = $conn->query("UPDATE user SET last_login = '" . GetCurrentDate() . "' WHERE `user`.`id` = '" . $UserID . "';");

                        // Update the user last_ip time.
                        $query = $conn->query("UPDATE user SET last_ip = '" . GetUserIP() . "' WHERE `user`.`id` = '" . $UserID . "';");

                        //admin from DB.user - 0 = user, 1 = admin
                        $_SESSION['user']['rank'] = $row['admin'];

                        //Date from signup - DB.user
                        $_SESSION['user']['date'] = $row['date'];

                        //IP from DB.user - Like 10.2.2.2
                        $_SESSION['user']['ip'] = $row['ip'];

                        // Firstname from DB.user
                        $_SESSION['user']['firstname'] = $row['firstname'];

                        // Firstname from DB.user
                        $_SESSION['user']['lastname'] = $row['lastname'];

                        // Email from DB.user - Like test@test.com
                        $_SESSION['user']['email'] = $row['email'];

                        // Lastlogin from DB.user - Like 2018-06-24 12:11:23
                        $_SESSION['user']['lastlogin'] = $row['last_login'];

                        //Last Logged in IP - Like 10.2.2.3
                        $_SESSION['user']['lastip'] = $row['last_ip'];

                        // Redirect the user to the feed page.
                        header("Location: ../feed.php?login=successfull");

                    } else {
                        // If the password the user typed in DO NOT match with the DB then go back.
                        $_SESSION['loginfailed'] = "";
                        header("Location: ../login.php?login=failed");
                    }

                } else {
                    //If the account is not activated redirect the user
                    $_SESSION['loginfailed'] = "";
                    header("Location: ../login.php?login=failed");
                    exit();
                }

            } else {
                //If the fields were empty then go back
                $_SESSION['loginfailed'] = "";
                header("Location: ../login.php?login=failed");
                exit();
            }

        } else {
            //If the email does not exist
            $_SESSION['loginfailed'] = "";
            header("Location: ../login.php?login=failed");
            exit();

        }

    } else {
        //If the user is already logged in then go back
        $_SESSION['loginfailed'] = "";
        header("Location: ../login.php?login=failed");
        exit();
    }

} else {
    //If the login button was not pressed go back
    header("Location ../index.php");
    exit();
}