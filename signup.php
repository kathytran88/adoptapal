<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);

    $user_exists = false;
    foreach ($users as $user) {
        list($stored_username, ) = explode(",", $user);
        if ($stored_username === $username) {
            $user_exists = true;
            break;
        }
    }

    if ($user_exists) {
        echo "<div class='error-message'>User already exists. Please log in instead.</div>";
    } elseif (!preg_match('/^(?=.*\d)[A-Za-z\d]{5,}$/', $password)) {
        echo "<div class='error-message'>Password must be at least 5 characters long and contain at least 1 number.</div>";
    } else {
        $file = fopen("users.txt", "a");
        fwrite($file, "$username,$password\n");
        fclose($file);
        echo "<div class='success-message'>Account created successfully! You can now log in.</div>";
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
        <h1>Sign Up</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>



