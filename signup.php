<?php
session_start();

$filename = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        if (!preg_match('/^(?=.*[0-9]).{5,}$/', $password)) {
            $_SESSION['signup_error'] = "Password must be at least 5 characters long and include at least one number.";
            header('Location: signup.html');
            exit();
        }

        if (file_exists($filename)) {
            $users = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($users as $user) {
                list($storedUsername, ) = explode(":", $user);
                if ($storedUsername === $username) {
                    $_SESSION['signup_error'] = "User already exists. Please log in instead.";
                    header('Location: signup.html');
                    exit();
                }
            }
        }

        $userData = $username . ":" . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL;
        file_put_contents($filename, $userData, FILE_APPEND | LOCK_EX);
        header('Location: index.html');
        exit();
    } else {
        $_SESSION['signup_error'] = "Both fields are required.";
        header('Location: signup.html');
        exit();
    }
}
?>

