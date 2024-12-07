<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Adopt a Pal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <header class="signup-header">
            <h1>Adopt a Pal</h1>
            <p>Please fill out your information to log in</p>
        </header>

        <main>
            <?php
            session_start();
            if (isset($_SESSION['login_error'])) {
                echo "<p class='error-message'>" . htmlspecialchars($_SESSION['login_error']) . "</p>";
                unset($_SESSION['login_error']);
            }
            ?>
            <form action="login_handler.php" method="post" class="signup-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Log In</button>
                    <button type="reset" class="reset-btn">Reset</button>
                </div>
            </form>
        </main>

        <footer class="signup-footer">
            <p>Don't have an account? <a href="signup.php">Sign up</a> now!</p>
        </footer>
    </div>
</body>
</html>


