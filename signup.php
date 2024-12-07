<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Adopt a Pal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <header class="signup-header">
            <h1>Adopt a Pal</h1>
            <p>Create your account to start your journey!</p>
        </header>

        <main>
            <?php
            session_start();
            if (isset($_SESSION['signup_error'])) {
                echo "<p class='error-message'>" . htmlspecialchars($_SESSION['signup_error']) . "</p>";
                unset($_SESSION['signup_error']);
            }
            ?>
            <form action="signup_handler.php" method="post" class="signup-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Sign Up</button>
                    <button type="reset" class="reset-btn">Reset</button>
                </div>
            </form>
        </main>

        <footer class="signup-footer">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </footer>
    </div>
</body>
</html>


