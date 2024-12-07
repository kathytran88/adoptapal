<?php
session_start();

$filename = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        if (file_exists($filename)) {
            $users = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $found = false;

            foreach ($users as $user) {
                list($storedUsername, $storedPasswordHash) = explode(":", $user);
                if ($storedUsername === $username && password_verify($password, $storedPasswordHash)) {
                    $found = true;
                    break;
                }
            }

            if ($found) {
                header('Location: index.html');
                exit();
            } else {
                $_SESSION['login_error'] = "Invalid username or password.";
                header('Location: login.html');
                exit();
            }
        } else {
            $_SESSION['login_error'] = "No accounts found. Please sign up.";
            header('Location: login.html');
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Both fields are required.";
        header('Location: login.html');
        exit();
    }
}
?>

