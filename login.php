<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);

    $is_valid = false;
    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(",", $user);
        if ($stored_username === $username && $stored_password === $password) {
            $is_valid = true;
            break;
        }
    }

    if ($is_valid) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
    } else {
        echo "<div class='error-message'>Invalid username or password</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <h1>Log In</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>



